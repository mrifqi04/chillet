@extends('layouts.master')

@section('content')
    <!--Page Title-->
    <section class="page-title" style="background-image:url('images/background/34.jpg')">
        <div class="auto-container">
            <h1>Checkout</h1>
            <ul class="page-breadcrumb">
                <li><a href="index.html">home</a></li>
                <li>Checkout</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!--CheckOut Page-->
    <section class="checkout-page">
        <div class="auto-container">
            <div class="checkout-form">
                <div class="row clearfix">
                    <!--Column-->
                    <div class="column col-lg-6 col-md-12 col-sm-12">
                        @if (session()->has('msg'))
                            <div class="alert alert-success">
                                {{ session()->get('msg') }}
                            </div>
                        @endif
                        <div class="inner-column">
                            <div class="sec-title">
                                <h3>Detail Pengiriman</h3>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Email">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="1234 Main St">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="city">Kota</label>
                                    <input type="text" class="form-control" id="city" name="city"
                                        placeholder="City">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="province">Provinsi</label>
                                    <input type="text" class="form-control" id="province" name="province"
                                        placeholder="Province">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="postal">Kode pos</label>
                                    <input type="text" class="form-control" id="postal" name="postal"
                                        placeholder="Postal">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone">Telepon</label>
                                <input type="text" class="form-control" id="phone" placeholder="Phone"
                                    name="phone">
                            </div>
                        </div>
                    </div>

                    <!--Column-->
                    <div class="column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="sec-title">
                                <h3>Informasi Tambahan</h3>
                            </div>

                            <!--Form Group-->
                            <div class="form-group ">
                                <div class="field-label">Order notes (optional)</div>
                                <textarea name="information" class="" placeholder="Notes about your order,e.g. special notes for delivery."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Checkout Details-->

            <!--Order Box-->
            <div class="order-box">
                <table>
                    <thead>
                        <tr>
                            <th class="product-name">Product</th>
                            <th class="product-total">Total</th>
                        </tr>
                    </thead>
                    <tbody id="cartItems">

                    </tbody>
                    <tfoot>
                        <tr class="order-total">
                            <th>Total</th>
                            <td>
                                <span id="totalCart"></span>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!--End Order Box-->

            <!--Payment Box-->
            <div class="payment-box">
                <div class="upper-box">
                    <!--Payment Options-->
                    <div class="payment-options">
                        <ul>
                            <li>
                                <div class="radio-option">
                                    <input type="radio" name="payment_method" value="transfer" id="payment-2" checked>
                                    <label for="payment-2"><strong>Direct Bank Transfer</strong><span
                                            class="small-text">Lakukan Pembayaran dalam 1x24 jam ke Rekening Mandiri :
                                            1330015378144 atas nama Harits Salsabilla</span></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="lower-box">
                    <button type="button" onclick="createTransaction()" class="theme-btn"><span class="btn-title">Place Order</span></button>
                </div>
            </div>
        </div>
    </section>
    <!--End CheckOut Page-->
@endsection

@section('script')
    <script>
        var orders = [];
        $('document').ready(function() {
            token = "{{ Request::session()->get('token') }}"

            getCartItems();
        });

        function getCartItems() {
            $('#cartItems').html('');
            var totalCart = 0;

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
                    console.log(cart, cartItems);

                    orders = cartItems;

                    $('#totalCart').html(`Rp ${formatRupiah(cart.total.toString())}`)
                    cartItems.map((item, i) => {
                        var total = 0;
                        total = item.quantity * item.product.price;
                        totalCart += total;
                        $('#cartItems').append(`
                            <tr class="cart-item">
                                <td class="product-name">${item.product.name}&nbsp;
                                    <strong class="product-quantity">× ${item.quantity}</strong>
                                </td>
                                <td class="product-total">
                                    <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">Rp. ${formatRupiah(total.toString())}</span></span>
                                </td>
                            </tr>
                        `);
                    })
                    console.log(totalCart);
                    $('#cartTotal').html(totalCart)
                }
            })
        }

        function createTransaction() {
            name = $('#name').val();
            email = $('#email').val();
            address = $('#address').val();
            city = $('#city').val();
            province = $('#province').val();
            postal = $('#postal').val();
            phone = $('#phone').val();
            payment_method = $('#payment-2').val();

            $.ajax({
                url: `/api/checkout`,
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                type: 'POST',
                data: {
                    name,
                    email,
                    address,
                    city,
                    province,
                    postal,
                    phone,
                    payment_method,
                    orders
                },
                success: function(resp) {
                    if (resp.meta.code == 200) {
                        window.location.replace(`/user/order/${resp.data.order.id}`);
                    }
                }
            })
        }
    </script>
@endsection
