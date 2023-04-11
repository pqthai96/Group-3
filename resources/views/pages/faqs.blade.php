@extends('layout')
@section('title', 'Testo - F.A.Q.S')
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
                                                <li class="breadcrumb-item active" aria-current="page">{{ __('F.A.Q.S') }}
                                                </li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Title -->
                        <h2 class="h2-xl">{{ __('F.A.Q.S') }}</h2>
                    </div>
                </div>
            </div> <!-- End row -->
        </div> <!-- End container -->
    </div> <!-- END PAGE HERO -->
    <section id="faqs-1" class="wide-100 faqs-section division">
        <div class="container">
            <!-- FAQs-1 QUESTIONS -->
            <div class="faqs-1-questions">
                <div class="row">
                    <!-- QUESTIONS WRAPPER -->
                    <div class="col-lg-6">
                        <div class="questions-wrapper">
                            <!-- QUESTION #1 -->
                            <div class="question">

                                <!-- Question -->
                                <h5 class="h5-xs">What payment methods do you accept?</h5>

                                <!-- Answer -->
                                <p class="grey-color">He also has a lot of fun getting into hate. Complete homework without fear. The soft bow of life flatters the ultrice ligula esgetat a magna suscit lectus magna suscit moltus litt molestie purus.
                                </p>

                            </div>


                            <!-- QUESTION #2 -->
                            <div class="question">

                                <!-- Question -->
                                <h5 class="h5-xs">Is my payment information secure?</h5>

                                <!-- Answer -->
                                <p class="grey-color">He caressed the little girl and timed it until she got pregnant. Well, the author of the life should ask for homework and wise members.
                                </p>

                            </div>


                            <!-- QUESTION #3 -->
                            <div class="question">

                                <!-- Question -->
                                <h5 class="h5-xs">Is there a discount code?</h5>

                                <!-- Answer -->
                                <p class="grey-color">It's always a lake, but the gate runs, Feugiat first mourns in ligula eros and ligula massa and faucibus orci a luctus aliquet and molestie purus venenatis aliquam eget lacinia.
                                </p>

                            </div>


                            <!-- QUESTION #4 -->
                            <div class="question">

                                <!-- Question -->
                                <h5 class="h5-xs">What if I have lost my gift certificate?</h5>

                                <!-- Answer -->
                                <p class="grey-color">Some flatter the mulla and set the time until he is pregnant. Velna is the author of the sad homework.
                                </p>

                            </div>


                        </div>
                    </div> <!-- END QUESTIONS WRAPPER -->


                    <!-- QUESTIONS WRAPPER -->
                    <div class="col-lg-6">
                        <div class="questions-wrapper pc-30">


                            <!-- QUESTION #5 -->
                            <div class="question">

                                <!-- Question -->
                                <h5 class="h5-xs">How can I change something in my order?</h5>

                                <!-- Answer -->
                                <p class="grey-color">It's always a lake, but the gate runs, Feugiat first mourns in ligula eros and ligula massa and faucibus orci a luctus aliquet and molestie purus venenatis aliquam eget lacinia.
                                </p>

                            </div>


                            <!-- QUESTION #6 -->
                            <div class="question">

                                <!-- Question -->
                                <h5 class="h5-xs">How much is shipping?</h5>

                                <!-- Answer -->
                                <p class="grey-color">It's always a lake, but the gate runs, Feugiat first mourns in ligula eros and ligula massa and faucibus orci a luctus aliquet and molestie purus venenatis aliquam eget lacinia
                                </p>

                            </div>


                            <!-- QUESTION #7 -->
                            <div class="question">

                                <!-- Question -->
                                <h5 class="h5-xs">How long will my order take to be delivered?</h5>

                                <!-- Answer -->
                                <p class="grey-color">It's always a lake, but the gate runs, Feugiat's first grief in ligula ligula massa in the throat of the orci a luctus ultrices ipsum first in the throat hate feugiat's first grief in ligula eros ligula.
                                </p>

                            </div>


                            <!-- QUESTION #8 -->
                            <div class="question">
                                <!-- Question -->
                                <h5 class="h5-xs">How do I track my order?</h5>
                                <!-- Answer -->
                                <p class="grey-color">It's always a lake, but the gate runs, Feugiat first mourns in ligula eros and ligula massa and faucibus orci a luctus aliquet and molestie purus venenatis aliquam eget lacinia.
                                </p>
                            </div>


                        </div>
                    </div> <!-- END QUESTIONS WRAPPER -->


                </div> <!-- End row -->
            </div> <!-- END FAQs-1 QUESTIONS -->


            <!-- MORE QUESTIONS BUTTON -->
            <div class="row">
                <div class="col-md-12">
                    <div class="more-questions-btn text-center">
                        <button class="btn" type="button"><span>{{ __('Still Have A Question?') }}</span></button>
                    </div>
                </div>
            </div>


        </div> <!-- End container -->
    </section> <!-- END FAQs-1 -->
@endsection
