@extends('layouts.master')

@section('content')
    <!--Main Slider-->
    <section class="main-slider">
        <div class="slider_wave"></div>
        <div class="rev_slider_wrapper fullwidthbanner-container" id="rev_slider_one_wrapper" data-source="gallery">
            <div class="rev_slider fullwidthabanner" id="rev_slider_one" data-version="5.4.1">
                <img src="{{ url('fotonya/banner1.png') }}" width="100%" alt="">
            </div>
        </div>
    </section>
    <!--End Main Slider-->

    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                <!--Content Side-->
                <div class="content-side col-lg-9 col-md-12 col-sm-12">
                    <div class="our-shop">
                        <div class="row clearfix">
                            @foreach ($products as $product)
                                <!-- Shop Item -->
                                <div class="shop-item col-lg-4 col-md-6 col-sm-12">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image">
                                                <a href="{{ url('/product/' . $product->id) }}">
                                                    <img src="{{ url($product->image) }}" alt="">
                                                </a>
                                            </figure>
                                            <div class="btn-box">
                                                <button type="submit" onclick="addCartItem({{ $product->id }})"
                                                    class="btn btn-warning btn-outline-dark">
                                                    <i class="fa fa-cart-plus "></i>
                                                    Tambahkan ke Keranjang
                                                </button>
                                            </div>
                                        </div>
                                        <div class="lower-content clearfix">
                                            @php
                                                $hasil_rupiah = 'Rp ' . number_format($product->price, 2, ',', '.');
                                            @endphp
                                            <h4 class="name"><a
                                                    href="{{ url('/product/' . $product->id) }}">{{ $product->name }}</a>
                                            </h4>
                                            <div class="price">{{ $hasil_rupiah }}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!--Sidebar Side-->
                <div class="sidebar-side sticky-container col-lg-3 col-md-12 col-sm-12">
                    <aside class="sidebar theiaStickySidebar">
                        <div class="sticky-sidebar">
                            <!-- Search Widget -->
                            {{-- <div class="sidebar-widget search-widget">
                                <form method="post" action="contact.html">
                                    <div class="form-group">
                                        <input type="search" name="search-field" value="" placeholder="Search products…" required>
                                        <button type="submit"><span class="icon fa fa-search"></span></button>
                                    </div>
                                </form>
                            </div> --}}

                            <!-- Cart Widget -->
                            <div class="sidebar-widget cart-widget">
                                <div class="widget-content">
                                    <h3 class="widget-title">Cart</h3>
                                    <div class="shopping-cart">
                                        <ul class="shopping-cart-items" id="cartItems">

                                        </ul>
                                        <div class="cart-footer">
                                            <div class="shopping-cart-total">
                                                <strong>Subtotal:</strong> <br>
                                                <p id="totalCart">Rp 0</p>
                                            </div>
                                            <a href="{{ url('/cart') }}" class="theme-btn">View Cart</a>
                                            <a href="{{ url('/user/checkout') }}" type="button" class="theme-btn">Checkout</a>
                                        </div>
                                    </div> <!--end shopping-cart -->
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!--End Sidebar Page Container-->
@endsection

@section('script')
    <script>
        $('document').ready(function() {
            token = "{{ Request::session()->get('token') }}"

            getCartItems();
        });

        function getCartItems() {
            $('#cartItems').html('');
            $.ajax({
                url: `/api/cart/`,
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + token
                },
                type: 'GET',
                success: function(resp) {
                    cart = resp.data.cart;
                    cartItems = resp.data.cart_items;

                    $('#totalCart').html(`Rp ${formatRupiah(cart.total.toString())}`)
                    cartItems.map((item, i) => {
                        $('#cartItems').append(`
                            <li class="cart-item">
                                <img src="${item.product.image}" alt="#" class="thumb" />
                                <span class="item-name">${item.product.name}</span>
                                <span class="item-quantity">${item.quantity} x Rp ${formatRupiah(item.product.price.toString())}</span>
                                <span class="item-amount">Rp ${formatRupiah((item.quantity * item.product.price).toString())}</span>

                                <a href="shop-single.html" class="product-detail"></a>
                                    <button type="button" onclick="removeCartItem(${item.product.id},${item.quantity})" class="remove-item">
                                        <span class="fa fa-times"></span>
                                    </button>
                            </li>
                        `);
                    })
                }
            })
        }

        function addCartItem(id) {
            $.ajax({
                url: `/api/add/cart/${id}`,
                type: 'post',
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                data: {
                    'quantity': 1
                },
                success: function(resp) {
                    getCartItems();
                }
            })
        }

        function removeCartItem(id, qty) {
            $.ajax({
                url: `/api/remove/cart/${id}`,
                type: 'post',
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                data: {
                    'quantity': qty
                },
                success: function(resp) {
                    getCartItems();
                }
            })
        }
    </script>
@endsection
