@extends('home.layouts.master')

@section('content')
<div class="container" style="margin-top: 10%">
    <h1 class="heading my-5 text-center">How to Order</h1>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 margin-bottom-50">
            <div class="default-tabs tabs-box">
                <!--Tabs Box-->
                <ul class="tab-buttons clearfix">
                    <li class="tab-btn active-btn" data-tab="#tab1">How to Order</li>                    
                </ul>

                <div class="tabs-content">
                    <!--Tab-->
                    <div class="tab active-tab" id="tab1">
                        <p>Cara melakukan Order pada website chillet :</p>
                        <ul class="list-style-one">
                            <li>1. Pilih produk yang diinginkan.</li>
                            <li>2. Tambahkan produk kedalam keranjang belanja</li>
                            <li>3. Register akun anda pada menu My Profile</li>
                            <li>4. Checkout pesanan anda</li>
                        </ul>
                    </div>                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection