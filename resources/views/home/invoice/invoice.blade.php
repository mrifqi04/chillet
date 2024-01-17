<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Invoice - chillet.id</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ URL::asset('invoice/style.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
</head>

<body>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <div class="page-content container" id="content-invoice">
        <div class="page-header text-blue-d2">
            <h1 class="page-title text-secondary-d1">
                Invoice
                <small class="page-info">
                    <i class="fa fa-angle-double-right text-80"></i>
                    ID: #{{ $order->id }}-{{ strtotime($order->date) }}-{{ $order->user_id }}
                </small>
            </h1>
        </div>

        <div class="container px-0">
            <div class="row mt-4">
                <div class="col-12 col-lg-10 offset-lg-1">
                    <!-- .row -->

                    <hr class="row brc-default-l1 mx-n1 mb-4" />

                    <div class="row">
                        <div class="col-sm-6">
                            <div>
                                <span class="text-sm text-grey-m2 align-middle">To:</span>
                                <span class="text-600 text-110 text-blue align-middle">
                                    {{ $order->user->name }}

                                </span>
                            </div>
                            <div class="text-grey-m2">
                                <div class="my-1">
                                    {{ $order->user->email }} <br>
                                    {{ $order->address }}, {{ $order->city }} <br>
                                    {{ $order->postal }}
                                </div>
                                <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b
                                        class="text-600">
                                        {{ $order->telephone }}
                                    </b></div>
                            </div>
                        </div>
                        <!-- /.col -->

                        <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                            <hr class="d-sm-none" />
                            <div class="text-grey-m2">
                                <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                    Invoice
                                </div>

                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                        class="text-600 text-90">ID:</span>
                                    #INV-{{ strtotime($order->date) }}-{{ $order->id }}</div>

                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                        class="text-600 text-90">Created:</span>
                                    {{ date("F jS, Y", strtotime($order->date)) }}</div>

                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                        class="text-600 text-90">Status:</span>
                                    {{-- <span class="badge badge-warning badge-pill px-25">Unpaid</span> --}}

                                    @if($order->status == 'Processed')
                                    <span class="badge badge-primary badge-pill px-25">Processed</span>
                                    @elseif($order->status == 'Done')
                                    <span class="badge badge-success badge-pill px-25">Finished</span>
                                    @elseif($order->status == 'Finished')
                                    <span class="badge badge-success badge-pill px-25">Finished</span>
                                    @elseif($order->status == 'Sending')
                                    <span class="badge badge-success badge-pill px-25">Terkirim</span>
                                    @elseif($order->status == 'Success')
                                    <span class="badge badge-success badge-pill px-25">Completed Transaction</span>
                                    @elseif($order->status == 'Rejected')
                                    <span class="badge badge-danger badge-pill px-25">Rejected</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="table-responsive mt-3">
                        <table class="table table-striped table-borderless border-0 border-b-2 brc-default-l1">
                            <thead class="bg-none bgc-default-tp1">
                                <tr class="text-white">
                                    <th>Transaction</th>
                                    <th width="140">Amount</th>
                                </tr>
                            </thead>
                        </table>
                    </div>

                    <div class="table-responsive mt-3">
                        <table class="table table-striped table-borderless border-0 border-b-2 brc-default-l1">
                            <thead class="bg-none bgc-default-tp1">
                                <tr class="text-dark">
                                    <th>Nama Produk</th>
                                    <th>Qty</th>
                                    <th>Harga Produk</th>
                                    <th width="140">Amount</th>
                                </tr>
                            </thead>

                            <tbody class="text-95 text-secondary-d3">
                                <tr></tr>
                                <tr>
                                    <td>
                                        @foreach ($order->products as $product)
                                        {{ $product->name }} <br>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($order->orderItems as $item)
                                        {{ $item->quantity }} item <br>
                                        
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($order->products as $product)                                        
                                        Rp{{ number_format($product->price, 0, ',', '.') }} <br>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($order->OrderItems as $item)
                                        Rp{{ number_format($item->price*$item->quantity, 0, ',', '.') }} <br>
                                            
                                            
                                        @endforeach

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                    <div class="row mt-3">
                        <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                            Thank you for your business...
                        </div>

                        <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                            <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                <div class="col-4 text-right">
                                    Total Amount
                                </div>
                                <div class="col-8">
                                    @php
                                    $total = 0;
                                    foreach ($order->OrderItems as $item) {
                                    $total += $item->price * $item->quantity;
                                    }
                                    @endphp
                                    <span class="text-150 text-success-d3 opacity-2">Rp
                                        {{ number_format($total, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr />
                </div>
            </div>
        </div>
    </div>
    </div>


</body>

</html>