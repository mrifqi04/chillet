@extends('home.layouts.master')
@section('content')
    <!--Page Title-->
    <section class="page-title" style="background-image:url('{{ asset('fotonya/banner1.png') }}')">
        <div class="auto-container">
            <h1>Cart</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Cart</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!--Cart Section-->
    <section class="cart-section">
        <div class="auto-container">
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
                                <th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                                <th class="product-remove">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach (Cart::instance('default')->content() as $item)
                                @php
                                    $total = 'Rp ' . $item->total();
                                    $price = 'Rp ' . number_format($item->model->price, 2, ',', '.');
                                @endphp
                                <tr class="cart-item">
                                    <td class="product-thumbnail"><a href="shop-single.html"><img
                                                src="{{ url('/uploads') . '/' . $item->model->image }}" alt=""></a>
                                    </td>
                                    <td class="product-name"><a href="shop-single.html">{{ $item->model->name }}</a></td>
                                    <td class="product-price">{{ $price }}</td>
                                    <td class="product">
                                        <select class="form-control quantity" style="width: 4.7em"
                                            data-id="{{ $item->rowId }}">
                                            @for ($i = 1; $i < 5 + 1; $i++)
                                                <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}
                                                </option>
                                            @endfor
                                        </select>
                                    </td>
                                    <td class="product-subtotal"><span class="amount">{{ $total }}</span></td>
                                    <form action="{{ route('cart.destroy', $item->rowId) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <td class="product-remove"> <button type="submit" class="remove"><span
                                                    class="fa fa-times"></span></button></td>
                                    </form>
                                </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row justify-content-between">
                <div class="column col-lg-4 offset-lg-8 col-md-6 col-sm-12">
                    <!--Totals Table-->
                    <ul class="totals-table">
                        @php
                            $subtotal = Cart::subtotal();
                            $tax = Cart::tax();
                            $total = Cart::total();
                        @endphp
                        <li>
                            <h3>Cart Totals</h3>
                        </li>
                        <li class="clearfix"><span class="col">Subtotal</span><span class="col price">Rp.
                                {{ $subtotal }}</span></li>
                        <li class="clearfix"><span class="col">Total</span><span class="col total-price">Rp.
                                {{ $total }}</span></li><br>
                        <li class="text-right"><a href="{{ '/checkout' }}" class="theme-btn proceed-btn">Proceed to
                                Checkout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--End Cart Section-->
@endsection

{{-- @section('content')

    <h2 class="mt-5"><i class="fa fa-shopping-cart"></i> Keranjang Belanja</h2>
    <hr>

    @if (Cart::instance('default')->count() > 0)

        <h4 class="mt-5">{{ Cart::instance('default')->count() }} items(s) di dalam Keranjang</h4>

        <div class="cart-items">

            <div class="row">

                <div class="col-md-10">

                    @if (session()->has('msg'))

                        <div class="alert alert-success">{{ session()->get('msg') }}</div>

                    @endif

                    @if (session()->has('errors'))

                        <div class="alert alert-warning">{{ session()->get('errors') }}</div>

                    @endif

                    <table class="table" style="overflow-x:auto">

                        <tbody>

                        @foreach (Cart::instance('default')->content() as $item)

                            <tr>
                                <td><img src="{{ url('/uploads') . '/'. $item->model->image }}" style="width: 5em"></td>
                                <td>
                                    <strong>{{ $item->model->name }}</strong><br> {{ $item->model->description }}
                                </td>

                                <td>

                                    <form action="{{ route('cart.destroy', $item->rowId) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-link btn-link-dark">Hapus</button>
                                    </form>

                                    <form action="{{ route('cart.saveLater', $item->rowId) }}" method="post">

                                        @csrf

                                        <button type="submit" class="btn btn-link btn-link-dark">Simpan nanti</button>

                                    </form>

                                </td>

                                <td>
                                    <select class="form-control quantity" style="width: 4.7em" data-id="{{ $item->rowId }}">
                                       @for ($i = 1; $i < 5 + 1; $i++)
                                        <option {{ $item->qty == $i ? 'selected' : '' }}>{{$i}}</option>
                                      @endfor

                                    </select>
                                </td>
                                @php
                                    $total = "Rp " . $item->total();
                                @endphp
                                <td>{{ $total }}</td>
                            </tr>
                        @endforeach


                        </tbody>

                    </table>

                </div>
                <!-- Price Details -->
                <div class="col-md-6">
                    <div class="sub-total">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th colspan="2">Detail harga</th>
                            </tr>
                            </thead>
                            <tr>
                                @php

                                    $subtotal = Cart::subtotal();
                                    $tax = Cart::tax();
                                    $total = Cart::total();
                                @endphp
                                <td>Subtotal</td>
                                <td>{{ $subtotal }}</td>
                            </tr>
                            <tr>
                                <td>Pajak</td>
                                <td>{{$tax }}</td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <th>{{$total }}</th>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- Save for later  -->
                <div class="col-md-12">
                    <a href="/" class="btn btn-outline-dark">Lanjutkan Belanja</a>
                    <a href="/checkout" class="btn btn-outline-info">Proses checkout</a>
                    <hr>
                </div>
                @else
                    <h3>Tidak ada item dalam keranjang</h3>
                    <a href="/" class="btn btn-outline-dark">Lanjutkan belanja</a>
                    <hr>
                @endif


                @if (Cart::instance('saveForLater')->count() > 0)

                    <div class="col-md-12">

                        <h4>{{ Cart::instance('saveForLater')->count() }} items simpan untuk nanti</h4>
                        <table class="table">

                            <tbody>

                            @foreach (Cart::instance('saveForLater')->content() as $item)

                                <tr>
                                    <td><img src="{{ url('/uploads') . '/'. $item->model->image }}" style="width: 5em">
                                    </td>
                                    <td>
                                        <strong>{{ $item->model->name }}</strong><br> {{ $item->model->description }}
                                    </td>

                                    <td>

                                        <form action="{{ route('saveLater.destroy', $item->rowId) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-link btn-link-dark">Hapus</button>
                                        </form>

                                        <form action="{{ route('moveToCart', $item->rowId) }}" method="post">

                                            @csrf

                                            <button type="submit" class="btn btn-link btn-link-dark">Pindahkan ke Keranjang
                                            </button>

                                        </form>

                                    </td>

                                    <td>
                                        <select name="" id="" class="form-control" style="width: 4.7em">
                                            <option value="">1</option>
                                            <option value="">2</option>
                                        </select>
                                    </td>
                                    @php
                                        $total = number_format( $item->total(),2,',','.');
                                    @endphp

                                    <td>Rp. {{ $total }}</td>
                                </tr>

                            @endforeach

                            </tbody>

                        </table>

                    </div>

                @endif
            </div>

        </div>

@endsection --}}

@section('script')
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        const className = document.querySelectorAll('.quantity');

        Array.from(className).forEach(function(el) {
            el.addEventListener('change', function() {
                const id = el.getAttribute('data-id');
                axios.patch(`/cart/update/${id}`, {
                        quantity: this.value
                    })
                    .then(function(response) {
                        location.reload();
                    })

                    .catch(function(error) {
                        console.log(error);
                        location.reload();
                    });
            });
        });
    </script>
@endsection
