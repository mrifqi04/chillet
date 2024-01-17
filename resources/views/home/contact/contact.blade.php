@extends('home.layouts.master')

@section('content')
<div class="container" style="margin-top: 10%">
    <h1 class="heading my-5 text-center">Contact</h1>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 margin-bottom-50">
            <div class="default-tabs tabs-box">
                <!--Tabs Box-->
                <ul class="tab-buttons clearfix">
                    <li class="tab-btn active-btn" data-tab="#tab1">contact</li>                    
                </ul>

                <div class="tabs-content">
                    <!--Tab-->
                    <div class="tab active-tab" id="tab1">
                        <p>Jika ada kendala mengenai pesanan, Silahkan Hubungi di nomor berikut : 085691038590</p>                        
                    </div>                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection