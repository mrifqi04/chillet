@extends('home.layouts.master')

@section('content')
    <!--Main Slider-->
    <section class="main-slider">
        <div class="slider_wave"></div>
        <div class="rev_slider_wrapper fullwidthbanner-container" id="rev_slider_one_wrapper" data-source="gallery">
            <div class="rev_slider fullwidthabanner" id="rev_slider_one" data-version="5.4.1">
                <ul>
                    <li data-index="rs-4" data-transition="zoomout" data-slotamount="default" data-hideafterloop="0"
                        data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="850"
                        data-thumb="#" data-delay="5999" data-rotate="0" data-saveperformance="off" data-title="Slide"
                        data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6=""
                        data-param7="" data-param8="" data-param9="" data-param10="" data-description="">

                        <!-- MAIN IMAGE -->
                        <img src="{{ asset('fotonya/banner1.png') }}" alt="" title="Home Cakes"
                            data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg"
                            data-no-retina>
                        <!-- LAYERS -->

                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme" id="slide-4-layer-44" data-x="center"
                            data-hoffset="1" data-y="center" data-voffset="-3" data-width="['full','full','full','full']"
                            data-height="['full','full','full','full']" data-type="shape" data-basealign="slide"
                            data-responsive_offset="on"
                            data-frames='[{"delay":10,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 5;background-color:rgba(80,81,92,0.15);"></div>

                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption   tp-resizeme" id="slide-4-layer-40" data-x="center" data-hoffset=""
                            data-y="center" data-voffset="" data-width="['none','none','none','none']"
                            data-height="['none','none','none','none']" data-type="image" data-responsive_offset="on"
                            data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 6;"><img src="{{ asset('vendor/bellaria') }}/images/main-slider/slider_bg_1.png"
                                alt="" data-ww="654px" data-hh="654px" width="654" height="654" data-no-retina>
                        </div>

                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption   tp-resizeme" id="slide-4-layer-33" data-x="center" data-hoffset=""
                            data-y="center" data-voffset="100" data-width="['auto']" data-height="['auto']"
                            data-visibility="['on','on','off','off']" data-type="text" data-responsive_offset="on"
                            data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"nothing"}]'
                            data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 7; white-space: nowrap; font-size: 16px; line-height: 24px; font-weight: 400; color: #4b4342;font-family:ABeeZee;">
                            We offer now a great range of different<br>flavoured bite-size Chicken Fillet </div>

                        <!-- LAYER NR. 4 -->
                        <div class="tp-caption   tp-resizeme" id="slide-4-layer-31" data-x="center" data-hoffset=""
                            data-y="center" data-voffset="-18" data-width="['399']" data-height="['auto']"
                            data-type="text" data-responsive_offset="on"
                            data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"nothing"}]'
                            data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 8; min-width: 399px; max-width: 399px; white-space: normal; font-size: 72px; line-height: 72px; font-weight: 400; color: #4b4342;font-family:Leckerli One;">
                            Welcome <br>to Chillet </div>

                        <!-- LAYER NR. 5 -->
                        <div class="tp-caption   tp-resizeme" id="slide-4-layer-41" data-x="center" data-hoffset=""
                            data-y="center" data-voffset="-150" data-width="['none','none','none','none']"
                            data-height="['none','none','none','none']" data-type="image" data-responsive_offset="on"
                            data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 9;"><img
                                src="{{ asset('vendor/bellaria') }}/images/main-slider/slider_bg_4.png" alt=""
                                data-ww="125px" data-hh="60px" width="125" height="60" data-no-retina> </div>

                        <!-- LAYER NR. 6 -->
                        <div class="tp-caption tp-resizeme hide-sm" id="slide-4-layer-42" data-x="398" data-y="center"
                            data-voffset="" data-width="['none','none','none','none']"
                            data-height="['none','none','none','none']" data-type="image" data-responsive_offset="on"
                            data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 10;"><img
                                src="{{ asset('vendor/bellaria') }}/images/main-slider/slider_bg_3.png" alt=""
                                data-ww="196px" data-hh="107px" width="196" height="107" data-no-retina> </div>

                        <!-- LAYER NR. 7 -->
                        <div class="tp-caption tp-resizeme hide-sm" id="slide-4-layer-43" data-x="1325" data-y="center"
                            data-voffset="" data-width="['none','none','none','none']"
                            data-height="['none','none','none','none']" data-type="image" data-responsive_offset="on"
                            data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 11;"><img
                                src="{{ asset('vendor/bellaria') }}/images/main-slider/slider_bg_2.png" alt=""
                                data-ww="196px" data-hh="107px" width="196" height="107" data-no-retina></div>
                    </li>

                    <!-- SLIDE  -->
                    <li data-index="rs-5" data-transition="zoomout" data-slotamount="default" data-hideafterloop="0"
                        data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="850"
                        data-thumb="" data-delay="5999" data-rotate="0" data-saveperformance="off" data-title="Slide"
                        data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6=""
                        data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="{{ asset('fotonya/banner3.png') }}" alt="" title="Home Cakes"
                            data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"
                            class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->

                        <!-- LAYER NR. 8 -->
                        <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme" id="slide-5-layer-44"
                            data-x="center" data-hoffset="" data-y="center" data-voffset=""
                            data-width="['full','full','full','full']" data-height="['full','full','full','full']"
                            data-type="shape" data-basealign="slide" data-responsive_offset="on"
                            data-frames='[{"delay":10,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 5;background-color:rgba(80,81,92,0.15);"> </div>

                        <!-- LAYER NR. 9 -->
                        <div class="tp-caption   tp-resizeme" id="slide-5-layer-40" data-x="center" data-hoffset=""
                            data-y="center" data-voffset="-1" data-width="['none','none','none','none']"
                            data-height="['none','none','none','none']" data-type="image" data-responsive_offset="on"
                            data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 6;"><img
                                src="{{ asset('vendor/bellaria') }}/images/main-slider/slider_bg_1.png" alt=""
                                data-ww="654px" data-hh="654px" width="654" height="654" data-no-retina> </div>

                        <!-- LAYER NR. 10 -->
                        <div class="tp-caption tp-resizeme" id="slide-5-layer-33" data-x="center" data-hoffset=""
                            data-y="center" data-voffset="99" data-width="['auto']" data-height="['auto']"
                            data-visibility="['on','on','off','off']" data-type="text" data-responsive_offset="on"
                            data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"nothing"}]'
                            data-textAlign="['center','center','center','center']" data-paddingtop="[,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 7; white-space: nowrap; font-size: 16px; line-height: px; font-weight: 400; color: #4b4342;font-family:ABeeZee;;">
                            We offer now a great range of different<br> flavoured bite-size Chicken Fillet </div>

                        <!-- LAYER NR. 11 -->
                        <div class="tp-caption   tp-resizeme" id="slide-5-layer-31" data-x="center" data-hoffset=""
                            data-y="center" data-voffset="-18" data-width="['441']" data-height="['auto']"
                            data-type="text" data-responsive_offset="on"
                            data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"nothing"}]'
                            data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 8; min-width: 441px; max-width: 441px; white-space: normal; font-size: 72px; line-height: 72px; font-weight: 400; color: #4b4342; font-family:Leckerli One;">
                            Welcome <br>to Chillet </div>

                        <!-- LAYER NR. 12 -->
                        <div class="tp-caption   tp-resizeme" id="slide-5-layer-41" data-x="center" data-hoffset=""
                            data-y="center" data-voffset="-150" data-width="['none','none','none','none']"
                            data-height="['none','none','none','none']" data-type="image" data-responsive_offset="on"
                            data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 9;"><img
                                src="{{ asset('vendor/bellaria') }}/images/main-slider/slider_bg_4.png" alt=""
                                data-ww="125px" data-hh="60px" width="125" height="60" data-no-retina> </div>

                        <!-- LAYER NR. 13 -->
                        <div class="tp-caption tp-resizeme hide-sm" id="slide-5-layer-42" data-x="398" data-y="center"
                            data-voffset="" data-width="['none','none','none','none']"
                            data-height="['none','none','none','none']" data-type="image" data-responsive_offset="on"
                            data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 10;"><img
                                src="{{ asset('vendor/bellaria') }}/images/main-slider/slider_bg_3.png" alt=""
                                data-ww="196px" data-hh="107px" width="196" height="107" data-no-retina> </div>

                        <!-- LAYER NR. 14 -->
                        <div class="tp-caption tp-resizeme hide-sm" id="slide-5-layer-43" data-x="1325" data-y="center"
                            data-voffset="" data-width="['none','none','none','none']"
                            data-height="['none','none','none','none']" data-type="image" data-responsive_offset="on"
                            data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 11;"><img
                                src="{{ asset('vendor/bellaria') }}/images/main-slider/slider_bg_2.png" alt=""
                                data-ww="196px" data-hh="107px" width="196" height="107" data-no-retina> </div>
                    </li>
                    <!-- SLIDE  -->
                    <li data-index="rs-6" data-transition="zoomout" data-slotamount="default" data-hideafterloop="0"
                        data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="850"
                        data-thumb="" data-delay="5999" data-rotate="0" data-saveperformance="off" data-title="Slide"
                        data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6=""
                        data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="{{ asset('fotonya/banner2.png') }}" alt="" title="Home Cakes"
                            data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"
                            class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->

                        <!-- LAYER NR. 15 -->
                        <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme" id="slide-6-layer-44"
                            data-x="center" data-hoffset="" data-y="center" data-voffset=""
                            data-width="['full','full','full','full']" data-height="['full','full','full','full']"
                            data-type="shape" data-basealign="slide" data-responsive_offset="on"
                            data-frames='[{"delay":10,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 5;background-color:rgba(80,81,92,0.15);"> </div>

                        <!-- LAYER NR. 16 -->
                        <div class="tp-caption   tp-resizeme" id="slide-6-layer-40" data-x="center" data-hoffset=""
                            data-y="center" data-voffset="-1" data-width="['none','none','none','none']"
                            data-height="['none','none','none','none']" data-type="image" data-responsive_offset="on"
                            data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 6;"><img
                                src="{{ asset('vendor/bellaria') }}/images/main-slider/slider_bg_1.png" alt=""
                                data-ww="654px" data-hh="654px" width="654" height="654" data-no-retina> </div>

                        <!-- LAYER NR. 17 -->
                        <div class="tp-caption   tp-resizeme" id="slide-6-layer-33" data-x="center" data-hoffset=""
                            data-y="center" data-voffset="100" data-width="['auto']" data-height="['auto']"
                            data-visibility="['on','on','off','off']" data-type="text" data-responsive_offset="on"
                            data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"nothing"}]'
                            data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 7; white-space: nowrap; font-size: 16px; line-height: 24px; font-weight: 400; color: #4b4342; font-family:ABeeZee;">
                            We offer now a great range of different<br> flavoured bite-size Chicken Fillet </div>

                        <!-- LAYER NR. 18 -->
                        <div class="tp-caption   tp-resizeme" id="slide-6-layer-31" data-x="center" data-hoffset=""
                            data-y="center" data-voffset="-18" data-width="['394']" data-height="['auto']"
                            data-type="text" data-responsive_offset="on"
                            data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"nothing"}]'
                            data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 8; min-width: 394px; max-width: 394px; white-space: normal; font-size: 72px; line-height: 72px; font-weight: 400; color: #4b4342;font-family:Leckerli One;">
                            Welcome <br>to Chillet </div>

                        <!-- LAYER NR. 19 -->
                        <div class="tp-caption   tp-resizeme" id="slide-6-layer-41" data-x="center" data-hoffset=""
                            data-y="center" data-voffset="-150" data-width="['none','none','none','none']"
                            data-height="['none','none','none','none']" data-type="image" data-responsive_offset="on"
                            data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 9;"><img
                                src="{{ asset('vendor/bellaria') }}/images/main-slider/slider_bg_4.png" alt=""
                                data-ww="125px" data-hh="60px" width="125" height="60" data-no-retina> </div>

                        <!-- LAYER NR. 20 -->
                        <div class="tp-caption tp-resizeme hide-sm" id="slide-6-layer-42" data-x="398" data-y="center"
                            data-voffset="" data-width="['none','none','none','none']"
                            data-height="['none','none','none','none']" data-type="image" data-responsive_offset="on"
                            data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 10;"><img
                                src="{{ asset('vendor/bellaria') }}/images/main-slider/slider_bg_3.png" alt=""
                                data-ww="196px" data-hh="107px" width="196" height="107" data-no-retina> </div>

                        <!-- LAYER NR. 21 -->
                        <div class="tp-caption tp-resizeme hide-sm" id="slide-6-layer-43" data-x="1325" data-y="center"
                            data-voffset="" data-width="['none','none','none','none']"
                            data-height="['none','none','none','none']" data-type="image" data-responsive_offset="on"
                            data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 11;"><img
                                src="{{ asset('vendor/bellaria') }}/images/main-slider/slider_bg_2.png" alt=""
                                data-ww="196px" data-hh="107px" width="196" height="107" data-no-retina> </div>
                    </li>
                </ul>
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
                                            <figure class="image"><a href="{{ url('/product/' . $product->id) }}"><img
                                                        src="{{ url('/uploads') . '/' . $product->image }}"
                                                        alt=""></a></figure>
                                            <div class="btn-box">
                                                <form action="{{ route('cart') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                                    <input type="hidden" name="name" value="{{ $product->name }}">
                                                    <input type="hidden" name="price" value="{{ $product->price }}">
                                                    <button type="submit" class="btn btn-warning btn-outline-dark"><i
                                                            class="fa fa-cart-plus "></i> Tambahkan ke Keranjang </button>
                                                </form>
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
                                        <ul class="shopping-cart-items">
                                            @foreach (Cart::instance('default')->content() as $item)
                                                <li class="cart-item">
                                                    <img src="{{ url('/uploads') . '/' . $item->model->image }}"
                                                        alt="#" class="thumb" />
                                                    <span class="item-name">{{ $item->model->name }}</span>
                                                    @php
                                                        $total = 'Rp ' . $item->total();
                                                    @endphp
                                                    <span class="item-quantity">{{ $item->qty }} x <span
                                                            class="item-amount">{{ $total }}</span></span>
                                                    <a href="shop-single.html" class="product-detail"></a>
                                                    <form action="{{ route('cart.destroy', $item->rowId) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="remove-item"><span
                                                                class="fa fa-times"></span></button>
                                                    </form>
                                                </li>
                                            @endforeach
                                        </ul>

                                        <div class="cart-footer">
                                            @php
                                                $subtotal = Cart::subtotal();
                                                $tax = Cart::tax();
                                                $total = Cart::total();
                                            @endphp
                                            <div class="shopping-cart-total"><strong>Subtotal:</strong>Rp.
                                                {{ $subtotal }}</div>
                                            <a href="{{ url('/cart') }}" class="theme-btn">View Cart</a>
                                            <a href="{{ url('/checkout') }}" class="theme-btn">Checkout</a>
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
