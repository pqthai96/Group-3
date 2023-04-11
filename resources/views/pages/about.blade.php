@extends('layout')
@section('content')
    <div id="page" class="page">
        <!-- PAGE HERO
                                        ============================================= -->
        <div id="about-page" class="page-hero-section division">
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
                                                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                                                    <li class="breadcrumb-item active" aria-current="page">About Us</li>
                                                </ol>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Title -->
                            <h2 class="h2-xl">About Us</h2>
                        </div>
                    </div>
                </div> <!-- End row -->
            </div> <!-- End container -->
        </div> <!-- END PAGE HERO -->




        <!-- ABOUT-3
                                        ============================================= -->
        <section id="about-3" class="wide-60 about-section division">
            <div class="container">
                <div class="row d-flex align-items-center">


                    <!-- ABOUT IMAGE -->
                    <div class="col-md-5 col-lg-6">
                        <div class="about-3-img text-center mb-40">
                            <img class="img-fluid" src="{{ 'frontend/images/about-img-01.png' }}" alt="about-image">
                        </div>
                    </div>


                    <!-- ABOUT TEXT -->
                    <div class="col-md-7 col-lg-6">
                        <div class="about-3-txt mb-40">

                            <!-- Title -->
                            <h2 class="h2-sm">WE ARE VINCENT</h2>

                            <!-- Text -->
                            <p class="p-md" style="text-align: justify">We don’t just make pizza. we make people’s days.
                                Vincent pizza was built on
                                the belief that pizza should be special, and we carry belief into everything we do.
                            </p>

                            <!-- List -->
                            <p class="p-md" style="text-align: justify">
                                With more than 50 years of experience under our belts, we understand how to best serve our
                                customers through tried and true service principles. Instead of following trends, we set
                                them. We create food we’re proud to serve and deliver it fast, with a smile. No matter where
                                you find us, we’re making sure each meal our customers enjoy is delicious and one-of-a-kind.
                            </p>

                        </div>
                    </div> <!-- END ABOUT TEXT -->


                </div> <!-- End row -->
            </div> <!-- End container -->
        </section> <!-- END ABOUT-3 -->

        <!-- ABOUT-4
                                        ============================================= -->
        <section id="about-4" class="wide-60 about-section division">
            <div class="container">
                <div class="row">


                    <!-- ABOUT TEXT -->
                    <div class="col-md-7 col-lg-6">
                        <div class="about-4-txt mb-40">
                            <!-- Title -->
                            <h2 class="h2-sm">Discover the new taste of the Pizza</h2>
                            <!-- Text -->
                            <p class="p-md grey-color" style="text-align: justify">The innovation that led to flatbread
                                pizza was the use of tomato as a
                                topping. For some time after the tomato was brought to Europe from the Americas in the 16th
                                century, it was believed by many Europeans to be poisonous, as are some other fruits of the
                                Solanaceae (nightshade) family. By the late 18th century, it was common for the poor of the
                                area around Naples to add tomato to their yeast-based flatbread, thus the pizza began
                            </p>

                            <!-- Image -->
                            <img class="img-fluid" src="{{ 'frontend/images/about-img-02.png' }}" alt="about-image">

                        </div>
                    </div> <!-- END ABOUT TEXT -->


                    <!-- ABOUT IMAGE -->
                    <div class="col-md-5 col-lg-6">
                        <div class="about-4-img mb-40">

                            <!-- Image -->
                            <img class="img-fluid" src="{{ 'frontend/images/about-img-03.png' }}" alt="about-image">

                            <!-- Text -->
                            <h2 class="h2-sm"> Pizza with Salad</h2>
                            <img class="img-fluid" src="{{ 'frontend/images/about-img-04.png' }}" alt="about-image">
                        </div>
                    </div>


                </div> <!-- End row -->
            </div> <!-- End container -->
        </section> <!-- END ABOUT-4 -->
    </div> <!-- End container -->
    </section> <!-- END BLOG-1 -->


    </div> <!-- END PAGE CONTENT -->
@endsection
