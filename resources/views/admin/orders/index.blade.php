<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Orders
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" class="text-center">User</th>
                                <th scope="col">Product</th>
                                <th scope="col">Status</th>
                                <th scope="col">Payment</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $i => $order)
                                <tr>
                                    <th scope="row">{{ $i + 1 }}</th>
                                    <td class="text-center">
                                        {{ $order->User->name }}
                                    </td>
                                    <td>
                                        <button class="btn btn-info text-light" type="button" data-bs-toggle="modal"
                                            data-bs-target="#orderDetail{{ $order->id }}">
                                            See Product
                                        </button>
                                    </td>
                                    <td>
                                        @if ($order->status == 'CONFIRMED')
                                            <span class="btn btn-success btn-sm">Confirmed</span>
                                        @elseif ($order->status == 'PENDING')
                                            <span class="btn btn-warning btn-sm">Pending</span>
                                        @elseif ($order->status == 'VERIFYING')
                                            <span class="btn btn-info text-light btn-sm">Verifying</span>
                                        @elseif ($order->status == 'Finished')
                                            <span class="label label-success">Finished, wait for taken</span>
                                        @elseif ($order->status == 'SENDING')
                                            <span class="btn btn-info text-light btn-sm">Sending</span>
                                        @elseif ($order->status == 'SUCCESS')
                                            <span class="btn btn-success btn-sm">Complete Transaction</span>
                                        @else
                                            <span class="btn btn-info text-light btn-sm">PROCESSED</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($order->payment == null)
                                            Belum Ada Pembayaran
                                        @else
                                            <a href="{{ asset('uploads') }}/{{ $order->payment }}" target="_blank">Lihat
                                        @endif
                                    </td>
                                    <td>
                                        @if ($order->status == 'PENDING')
                                            <form action="{{ route('confirmOrder', $order->id) }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm">Confirm</button>
                                            </form>
                                        @endif
                                        @if ($order->status == 'VERIFYING')
                                            <form action="{{ route('processOrder', $order->id) }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm">PROCESS</button>
                                            </form>
                                        @endif
                                        @if ($order->status == 'PROCESSED')
                                            <form action="{{ route('sendOrder', $order->id) }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm">SEND</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>

                                <div class="modal modal-slide-in new-user-modal fade" tabindex="-1"
                                    id="orderDetail{{ $order->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Detail Item</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                @foreach ($order->OrderItem as $orderItem)
                                                    <div class="mb-3 row">
                                                        <div class="col-6">
                                                            <label for="" class="form-label">Product</label>
                                                            <input type="text"
                                                                value="{{ $orderItem->Product->name }}"
                                                                class="form-control" readonly>
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="" class="form-label">Product
                                                                price</label>
                                                            <input type="text"
                                                                value="{{ $orderItem->Product->price }}"
                                                                class="form-control" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <div class="col-6">
                                                            <label for="" class="form-label">Quantity</label>
                                                            <input type="text" value="{{ $orderItem->quantity }}"
                                                                class="form-control" readonly>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                @endforeach
                                                <div class="col-6">
                                                    <label for="" class="form-label">Total</label>
                                                    <input type="text" value="Rp {{ $order->total }}"
                                                        class="form-control" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    {{-- <script>
        $('#input-file').change(function() {
            const file = this.files[0];

            if (file) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    console.log(event.target.result);
                    $('#newavatar').css('display', 'block');
                    $('#newavatar').attr('src', event.target.result);
                }
                reader.readAsDataURL(file);
            }
        });

        function deleteProduct(id) {
            Swal.fire({
                title: 'Are you sure?',
                icon: 'info',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/admin/products/${id}`,
                        type: 'delete',
                        // method: 'delete',
                        success: function(data) {
                            if (data.status === 'ok') {
                                Swal.fire(
                                    'Success!',
                                    'Success remove product!',
                                    'success'
                                ).then(() => window.location.reload())
                            } else {
                                Swal.fire(
                                    'Sorry!',
                                    'Data somethink when wrong',
                                    'info'
                                ).then(() => window.location.reload())
                            }
                        }
                    })
                }
            })
        }
    </script> --}}
</x-app-layout>
