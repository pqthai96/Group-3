@extends('layout')
@section('title', 'Testo - Location')
@section('content')
    <div id="gallery-page" class="page-hero-section division">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="hero-txt text-center white-color">
                        <!-- Breadcrumb -->
                        <div id="breadcrumb">
                            <div class="row">
                                <div class="col">
                                    <div class="breadcrumb-nav">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">{{ __('Location') }}
                                                </li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Title -->
                        <h2 class="h2-xl">{{ __('Location') }}</h2>
                    </div>
                </div>
            </div> <!-- End row -->
        </div> <!-- End container -->
    </div> <!-- END PAGE HERO -->
    <section id="contacts-3" class="bg-fixed wide-60 contacts-section division">
        <div class="container">
            <div class="row">


                <!-- LOCATION-1 -->
                <div class="col-md-6 col-lg-4">
                    <div class="cbox-3 text-center">

                        <!-- Image -->
                        <div class="hover-overlay">
                            <img class="img-fluid" src="{{ asset('frontend/images/location-1.jpg') }}" alt="location-image" />
                        </div>

                        <!-- Text -->
                        <div class="cbox-3-txt">

                            <!-- Location -->
                            <h5 class="h5-xl red-color"><button id="button" style="color:red;border: none;background-color:#fff;font-size:28px;font-weight: bolder">{{ __('Downtown') }}</button></h5>
                            <!-- Phone -->
                            <h6 class="h6-xl">{{ __('Phone: ') }}<span>+84 90 288 0822</span></h6>

                            <!-- Address -->
                            <h6 class="h6-lg mt-20">Address</h6>
                            <p class="grey-color">44 Le Loi Street Ben Nghe Ward, District 1,</p>
                            <p class="grey-color">LHo Chi Minh City 7000 Vietnam</p>

                            <!-- Working Hours -->
                            <p class="grey-color">Daily 7AM - 10PM</p>

                        </div>

                    </div>
                </div>


                <!-- LOCATION-2 -->
                <div class="col-md-6 col-lg-4">
                    <div class="cbox-3 text-center">

                        <!-- Image -->
                        <div class="hover-overlay">
                            <img class="img-fluid" src="{{ asset('frontend/images/location-2.jpg') }}" alt="location-image" />
                        </div>

                        <!-- Text -->
                        <div class="cbox-3-txt">

                            <!-- Location -->
                            <h5 class="h5-xl red-color"><button id="button1" style="color:red;border: none;background-color:#fff;font-size:28px;font-weight: bolder">{{ __('Central City') }}</button></h5>
                            <!-- Phone -->
                            <h6 class="h6-xl">{{ __('Phone: ') }}<span>+84 90145 3194</span></h6>

                            <!-- Address -->
                            <h6 class="h6-lg mt-20">Address</h6>
                            <p class="grey-color">F5 Diamond Plaza 34 Le Duan, Ben Nghe,</p>
                            <p class="grey-color"> District 1, Ho Chi Minh City 70000 Vietnam</p>

                            <!-- Working Hours -->
                            <p class="grey-color">Daily 11AM - 10PM</p>

                        </div>

                    </div>
                </div>


                <!-- LOCATION-3 -->
                <div class="col-md-6 col-lg-4">
                    <div class="cbox-3 text-center">

                        <!-- Image -->
                        <div class="hover-overlay">
                            <img class="img-fluid" src="{{ asset('frontend/images/location-3.jpg') }}" alt="location-image" />
                        </div>

                        <!-- Text -->
                        <div class="cbox-3-txt">

                            <!-- Location -->
                            <h5 class="h5-xl red-color"><button id="button2" style="color:red;border: none;background-color:#fff;font-size:28px;font-weight: bolder">{{ __('Hollywood') }}</button></h5>
                            <!-- Phone -->
                            <h6 class="h6-xl">{{ __('Phone: ') }}<span>789-645-0123</span></h6>

                            <!-- Address -->
                            <h6 class="h6-lg mt-20">Address</h6>
                            <p class="grey-color">193 Dien Bien Phu Ward 6, District 3,</p>
                            <p class="grey-color">Ho Chi Minh City 700000 Vietnam</p>

                            <!-- Working Hours -->
                            <p class="grey-color">Daily 8AM - 10PM</p>

                        </div>

                    </div>
                </div>

            </div> <!-- End row -->
            <div class="col-md-12">
                <div id="iframeHolder"></div>
            </div>

        </div> <!-- End container -->
    </section> <!-- END CONTACTS-3 -->
@endsection
@section('scripts')
<script type="text/javascript">
    $(function(){
        $('#button').click(function(){
            if(!$('#iframe').length) {
                $('#iframeHolder').html('<div class="mapouter"><div class="gmap_canvas"><iframe width="1080" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=85%20Pham%20Viet%20Chanh%20Ward%2019,%20Binh%20Thanh%20District,%20Ho%20Chi%20Minh%20City%20700000%20Vietnam&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-i.net"></a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:1080px;}</style><a href="https://www.embedgooglemap.net">google maps embed wordpress</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:1080px;}</style></div></div>');
            }
        });
        $('#button1').click(function(){
            if(!$('#iframe').length) {
                $('#iframeHolder').html('<div class="mapouter"><div class="gmap_canvas"><iframe width="1080" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=8%20Thu%20Khoa%20Huan%20Street,%20Ben%20Thanh%20Ward%20District%201,%20Ho%20Chi%20Minh%20City%20700000%20Vietnam&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-i.net"></a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:1080px;}</style><a href="https://www.embedgooglemap.net">google maps embed wordpress</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:1080px;}</style></div></div>');
            }
        });
        $('#button2').click(function(){
            if(!$('#iframe').length) {
                $('#iframeHolder').html('<div class="mapouter"><div class="gmap_canvas"><iframe width="1080" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=193%20Dien%20Bien%20Phu%20Ward%206,%20District%203,%20Ho%20Chi%20Minh%20City%20700000%20Vietnam&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-i.net"></a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:1080px;}</style><a href="https://www.embedgooglemap.net">google maps embed wordpress</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:1080px;}</style></div></div>');
            }
        });
    });
    </script>
@endsection
