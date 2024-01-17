@extends('home.layouts.master')

@section('content')

    <!--Page Title-->
    <div class="auto-container mt-5">
        <h1>Order Detail</h1>
    </div>
    <!--End Page Title-->


    <!--Cart Section-->
    <section class="cart-section">
        <div class="auto-container">
            @if ($order->due_date != null && $order->status == 'Pending')
                <h3 style="color: red">Harap lakukan pembayaran sebelum {{ date('F jS, Y', strtotime($order->due_date)) }}
                </h3>
            @endif

            <!--Cart Outer-->
            <div class="cart-outer">
                <div class="table-outer">
                    <table class="cart-table">
                        <thead class="cart-header">
                            @if (session()->has('msg'))
                                <div class="alert alert-success">{{ session()->get('msg') }}</div>
                            @endif
                            @if (session()->has('errors'))
                                <div class="alert alert-warning">{{ session()->get('errors') }}</div>
                            @endif
                            <tr>
                                <th colspan="4">
                                    <h3>Status Order</h3>
                                </th>
                            </tr>
                            <tr>
                                <th class="product-price">ID</th>
                                <th class="product-price">Tanngal</th>
                                <th class="product-subtotal">Status</th>
                                <th class="product-remove">Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="cart-item">
                                <td class="product-thumbnail">
                                    #{{ $order->id }}-{{ date(strtotime($order->date)) }}-{{ $order->user_id }}</td>
                                <td class="product-name"><a href="shop-single.html">{{ $order->date }}</a></td>
                                <td class="product-price">
                                    @if ($order->status == 'CONFIRMED')
                                        <span class="badge badge-info">Confirmed</span>
                                    @elseif ($order->status == 'PENDING')
                                        <span class="badge badge-warning">Pending</span>
                                    @elseif ($order->status == 'VERIFYING')
                                        <span class="badge badge-primary">Verifying</span>
                                    @elseif ($order->status == 'Finished')
                                        <span class="badge badge-primary">Finished</span>
                                    @elseif ($order->status == 'SENDING')
                                        <span class="badge badge-primary">Sending</span>
                                    @elseif ($order->status == 'Success')
                                        <span class="badge badge-success">Success</span>
                                    @else
                                        <span class="badge badge-success">Processed</span>
                                    @endif <br>
                                    @if ($order->status == 'SENDING')
                                        <span style="color: green">Pesananmu sedang diantar oleh kurir </span> <br>
                                    @endif
                                </td>
                                @if ($order->status == 'PENDING')
                                    <td>
                                        Sedang menunggu konfirmasi dari Admin
                                    </td>
                                @elseif($order->status == 'CONFIRMED')
                                    <td>
                                        <form action="{{ route('verifyOrder', $order->id) }}" method="post"
                                            enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <input type="file" name="payment" class="form-control">
                                            </div>

                                            <button type="submit" class="theme-btn">Upload</button>
                                        </form>
                                    </td>
                                @elseif($order->status == 'Verifying')
                                    <td>
                                        Sedang menunggu konfirmasi pembayaran dari Admin
                                    </td>
                                @elseif ($order->payment_method == 'transfer')
                                    <td><a href="{{ asset('uploads') }}/{{ $order->payment }}" target="_blank">Lihat
                                            @if ($order->status != 'Pending' || $order->status != 'Verifying' || $order->status != 'Finished')
                                                <a class="theme-btn" href="{{ url('/invoice' . '/' . $order->id) }}"> |
                                                    Invoice</a>
                                            @endif
                                    </td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
                @if ($order->status == 'SENDING')
                    <form action="{{ route('successOrder', $order->id) }}" method="post">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-success my-4 float-right">Pesanan Sampai</button>
                    </form>
                @endif
            </div>
        </div>
        <div class="row col-md-12">
            <div class="auto-container col-md-6">
                <!--Cart Outer-->
                <div class="cart-outer">
                    <div class="table-outer">
                        <table class="cart-table">
                            <thead class="cart-header">
                                @if (session()->has('msg'))
                                    <div class="alert alert-success">{{ session()->get('msg') }}</div>
                                @endif
                                @if (session()->has('errors'))
                                    <div class="alert alert-warning">{{ session()->get('errors') }}</div>
                                @endif
                                <tr>
                                    <th colspan="2">
                                        <h3>Detail Order</h3>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="cart-item">
                                    <td class="product-thumbnail">Dikirim kepada</td>
                                    <td class="product-name">
                                        {{ $order->user->name }} <br>
                                        {{ $order->address }} <br>
                                        {{ $order->city }}, {{ $order->postal }} <br>
                                    </td>
                                </tr>
                                <tr class="cart-item">
                                    <td class="product-thumbnail">Detail barang</td>
                                    <td class="product-name">
                                        @foreach ($order->OrderItem as $item)
                                            {{ $item->Product->name }} | Rp
                                            {{ number_format($item->Product->price, '0', ',', '.') }}
                                            <br>
                                            {{ $item->quantity }} item x
                                            Rp{{ number_format($item->Product->price * $item->quantity, 0, ',', '.') }}
                                            <hr>
                                        @endforeach
                                        Total : Rp{{ number_format($order->total, 0, ',', '.') }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Cart Section-->
    <!-- Modal -->
    <div id="uploadModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- Form -->
                    <form method="POST" action="{{ url('/user/order/verify') }}/{{ $order->id }}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        Select file : <input type='file' name='payment' id='file' class='form-control'><br><br>
                        <button type="submit" class="btn btn-rounded btn-success"
                            style="position:fixed; bottom:20px; right:20px; z-index:1;">Upload
                        </button>
                    </form>

                    <!-- Preview-->
                    <div id='preview'></div>
                </div>

            </div>

        </div>
    </div>
@endsection
