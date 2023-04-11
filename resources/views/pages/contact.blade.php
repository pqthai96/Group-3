@extends('layout')
@section('title', 'Testo - Contact')
@section('content')
    <div id="page" class="page">
        <!-- PAGE HERO
            ============================================= -->
        <div id="contacts-page" class="page-hero-section division">
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
                                                    <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a>
                                                    </li>
                                                    <li class="breadcrumb-item active" aria-current="page">
                                                        {{ __('Contact Us') }}</li>
                                                </ol>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Title -->
                            <h2 class="h2-xl">{{ __('Contact Us') }}</h2>

                        </div>
                    </div>
                </div> <!-- End row -->
            </div> <!-- End container -->
        </div> <!-- END PAGE HERO -->




        <!-- CONTACTS-5
            ============================================= -->
        <section id="contacts-5" class="wide-80 contacts-section division">
            <div class="container">
                <!-- CONTACT INFO
                    ============================================= -->
                <div class="row">
                    <div class="col-xl-10 offset-xl-1">
                        <div class="row">


                            <!-- LOCATION -->
                            <div class="col-md-4">
                                <div class="cbox-5">

                                    <!-- Title -->
                                    <h5 class="h5-lg">{{ __('Location') }}</h5>

                                    <!-- Address -->
                                    <p class="p-md">8721 M Central Avenue,</p>
                                    <p class="p-md">Los Angeles, CA 90036,</p>
                                    <p class="p-md">United States</p>

                                </div>
                            </div>


                            <!-- QUICK CONTACTS -->
                            <div class="col-md-4">
                                <div class="cbox-5">

                                    <!-- Title -->
                                    <h5 class="h5-lg">{{ __('Working Hours') }}</h5>

                                    <!-- Text -->
                                    <p class="p-md">Mon-Fri: 9:00AM - 10:00PM</p>
                                    <p class="p-md">Saturday: 10:00AM - 8:30PM</p>
                                    <p class="p-md">Sunday: 12:00PM - 5:00PM</p>

                                </div>
                            </div>


                            <!-- WORKING HOURS -->
                            <div class="col-md-4">
                                <div class="cbox-5">

                                    <!-- Title -->
                                    <h5 class="h5-lg">{{ __('Working Hours') }}</h5>

                                    <!-- Title -->
                                    <p class="p-md">P: +12 3 3456 7890</p>
                                    <p class="p-md">F: +12 9 8765 4321</p>
                                    <p class="p-md">E: <a href="mailto:yourdomain@mail.com"
                                            class="yellow-color">hello@yourdomain.com</a></p>

                                </div>
                            </div>


                        </div>
                    </div>
                </div> <!-- END CONTACT INFO -->



                <!-- GOOGLE MAP
                    ============================================= -->
                <div class="row">
                    <div class="col-md-12">
                        <div id="gmap">
                            <div class="google-map">
                                <div class="mapouter"><div class="gmap_canvas"><iframe width="1080" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=8721%20M%20Central%20Avenue,%20%20Los%20Angeles,%20CA%2090036,&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org"></a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:1080px;}</style><a href="https://www.embedgooglemap.net">embedgooglemap.net</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:1080px;}</style></div></div>
                            </div>
                        </div>
                    </div>
                </div> <!-- END GOOGLE MAP -->
                <!-- SECTION TITLE -->
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="section-title mb-40 text-center">

                            <!-- Title 	-->
                            <h2 class="h2-xl">{{ __('Get in Touch') }}</h2>

                            <!-- Text -->
                            <p class="p-xl">Simply fill out the form below and have your seat ready</p>

                        </div>
                    </div>
                </div>

                <!-- CONTACT FORM -->
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="form-holder">
                            <form class="row contact-form">
                                <!-- Form Input -->
                                <div class="col-md-12 col-lg-6">
                                    <input type="text" name="name" class="form-control name" placeholder="Your Name*">
                                </div>

                                <!-- Form Input -->
                                <div class="col-md-12 col-lg-6">
                                    <input type="email" name="email" class="form-control email"
                                        placeholder="Email Address*">
                                </div>

                                <!-- Form Input -->
                                <div class="col-md-12">
                                    <input type="text" name="subject" class="form-control subject"
                                        placeholder="What's this about?">
                                </div>

                                <!-- Form Textarea -->
                                <div class="col-md-12">
                                    <textarea name="message" class="form-control message" rows="6" placeholder="Your Message ..."></textarea>
                                </div>

                                <!-- Form Button -->
                                <div class="col-md-12 mt-5 text-right">
                                    <button type="submit" class="btn"><span>{{ __('Send Message') }}</span></button>
                                </div>

                                <!-- Form Message -->
                                <div class="col-md-12 contact-form-msg text-center">
                                    <div class="sending-msg"><span class="loading"></span></div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div> <!-- END CONTACT FORM -->


            </div> <!-- End container -->
        </section> <!-- END CONTACTS-5 -->

    </div> <!-- END PAGE CONTENT -->
@endsection