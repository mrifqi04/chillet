@extends('home.layouts.master')

@section('content')
<div class="container" style="margin-top: 10%;">
    <h1 class="heading my-5 text-center">FAQ</h1>
    <div class="col-lg-12 col-md-12 col-sm-12 margin-bottom-50">
        <!--Accordian Box-->
        <ul class="accordion-box">
            <!--Block-->
            <li class="accordion block active-block">
                <div class="acc-btn active"><div class="icon-outer"><span class="icon fa fa-plus"></span> </div> Etiam hendrerit auctor feugiat</div>
                <div class="acc-content current">
                    <div class="content">
                        <div class="text">Nunc pharetra nisl non tellus venenatis, sit amet maximus libero bibendum. Nulla ac mattis eros, id malesuada dolor. Nulla sodales massa ipsum.</div>
                    </div>
                </div>
            </li>
    
            <!--Block-->
            <li class="accordion block">
                <div class="acc-btn"><div class="icon-outer"><span class="icon fa fa-plus"></span> </div>Maecenas ullamcorper lectus finibus</div>
                <div class="acc-content">
                    <div class="content">
                        <div class="text">Lorem ipsum dolor amet consectur adipicing elit eiusmod tempor incididunt ut labore dolore magna aliqua.enim minim veniam quis nostrud exercitation ullamco laboris.</div>
                    </div>
                </div>
            </li>
            
            <!--Block-->
            <li class="accordion block">
                <div class="acc-btn"><div class="icon-outer"><span class="icon fa fa-plus"></span> </div> Nam cursus lacus malesuada ullamcorper</div>
                <div class="acc-content">
                    <div class="content">
                        <div class="text">Lorem ipsum dolor amet consectur adipicing elit eiusmod tempor incididunt ut labore dolore magna aliqua.enim minim veniam quis nostrud exercitation ullamco laboris.</div>
                    </div>
                </div>
            </li>
    
            <!--Block-->
            <li class="accordion block">
                <div class="acc-btn"><div class="icon-outer"><span class="icon fa fa-plus"></span> </div> Nulla erat nibh, tempus in commodo rutrum</div>
                <div class="acc-content">
                    <div class="content">
                        <div class="text">Lorem ipsum dolor amet consectur adipicing elit eiusmod tempor incididunt ut labore dolore magna aliqua.enim minim veniam quis nostrud exercitation ullamco laboris.</div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
@endsection