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
                                <p class="grey-color">We accept a variety of payment methods, including credit cards (Visa, MasterCard), Momo, and cash on delivery. Please note that payment options may vary depending on your location and the specific pizza restaurant you are ordering from. Thank you for choosing our pizza!
                                </p>

                            </div>


                            <!-- QUESTION #2 -->
                            <div class="question">

                                <!-- Question -->
                                <h5 class="h5-xs">Is my payment information secure?</h5>

                                <!-- Answer -->
                                <p class="grey-color">Yes, we take the security of your payment information very seriously. We use industry-standard encryption technology to protect your sensitive data and ensure that your payment details are kept safe and secure. In addition, we do not store your payment information on our servers, so you can be confident that your personal and financial information is always protected. Thank you for choosing our pizza!
                                </p>

                            </div>


                            <!-- QUESTION #3 -->
                            <div class="question">

                                <!-- Question -->
                                <h5 class="h5-xs">Is there a discount code?</h5>

                                <!-- Answer -->
                                <p class="grey-color">Yes, we often offer discount codes and promotions to our customers. Please check our website or social media pages for the latest deals and discount codes. You can also sign up for our newsletter to receive exclusive offers and updates on our promotions. Thank you for choosing our pizza!
                                </p>

                            </div>


                            <!-- QUESTION #4 -->
                            <div class="question">

                                <!-- Question -->
                                <h5 class="h5-xs">What if I have lost my gift certificate?</h5>

                                <!-- Answer -->
                                <p class="grey-color">If you have lost your gift certificate, please contact our customer service team as soon as possible. We will do our best to assist you in retrieving the gift certificate or issuing a new one. However, please note that we may not be able to replace lost or stolen gift certificates, and any replacement or retrieval is subject to our terms and conditions. Thank you for choosing our pizza!
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
                                <p class="grey-color">If you need to make a change to your order, please contact our customer service team as soon as possible. You can reach us by phone or email, and we will do our best to accommodate your request. Please note that some changes may not be possible depending on the stage of the order and the specific pizza restaurant you are ordering from. Thank you for choosing our pizza!
                                </p>

                            </div>


                            <!-- QUESTION #6 -->
                            <div class="question">

                                <!-- Question -->
                                <h5 class="h5-xs">How much is shipping?</h5>

                                <!-- Answer -->
                                <p class="grey-color">We are pleased to offer free shipping on all orders, so there is no need to worry about any additional shipping costs. Thank you for choosing our pizza!
                                </p>

                            </div>


                            <!-- QUESTION #7 -->
                            <div class="question">

                                <!-- Question -->
                                <h5 class="h5-xs">How long will my order take to be delivered?</h5>

                                <!-- Answer -->
                                <p class="grey-color">We aim to deliver your order as quickly as possible. Depending on your location and the specific pizza restaurant you are ordering from, delivery times may vary. However, we strive to deliver all orders within 30 minutes of placing the order. Thank you for choosing our pizza!
                                </p>

                            </div>


                            <!-- QUESTION #8 -->
                            <div class="question">
                                <!-- Question -->
                                <h5 class="h5-xs">How do I track my order?</h5>
                                <!-- Answer -->
                                <p class="grey-color">You can track your order by logging into your account and going to the 'My Purchases' section. From there, you will be able to see the status of your order and track its progress in real-time. Thank you for choosing our pizza!
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
