@extends('layout')
@section('title', 'Testo - Promotions')
@section('content')
    <div id="page" class="page">


        <!-- PAGE HERO
                                            ============================================= -->
        <div id="gift-page" class="page-hero-section division">

            <div id="alert-message" class="alert alert-success"><h6 class="h6-sm"></h6></div>

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
                                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                                    <li class="breadcrumb-item active" aria-current="page">Promotions</li>
                                                </ol>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Title -->
                            <h2 class="h2-xl">Promotions</h2>

                        </div>
                    </div>
                </div> <!-- End row -->
            </div> <!-- End container -->
        </div> <!-- END PAGE HERO -->


        <!-- GIFT CARDS
                                            ============================================= -->
        <div id="cards-01" class="wide-60 cards-section division">
            <div class="container">
                @foreach ($promotion as $pt)
                    <div class="row my-5 border bg-light shadow">
                        <div class="col-md-6 font-weight-bold" 
                            style="background-image: url({{ $pt->DiscountIMG }}); background-size: cover; background-position: center center; opacity: 1; min-height:300px;">
                        </div>
                        <div class="col-md-6 align-self-center p-4 ">
                            <h3 class="font-weight-bolder " style="color:#c92d45;">{{ $pt->DiscountName }}</h3>
                            <p class="cutoff-text"><strong class="font-weight-bold">Time application:</strong> {{ $pt->StartDate }} - {{ $pt->EndDate }}
                            </p>
                            <span class="font-weight-bold" style="font-size: 1.2rem">Code:<strong onclick="copyText('code-{{ $pt->DiscountID }}')"
                                    style="padding: 5px; margin-left: 10px; cursor: pointer; color:aliceblue;background-color:#f5b200" id="code-{{ $pt->DiscountID }}">{{ $pt->DiscountID }}</strong></span>
                            <p style="font-style: italic; font-size: 0.9rem">(Click to copy Voucher Code)</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div> <!-- END GIFT CARDS -->
    @endsection

    @section('scripts')
        <script>
            function copyText(elementId) {
                var code = document.getElementById(elementId).innerText;
                var temp = document.createElement("input");
                temp.setAttribute("value", code);
                document.body.appendChild(temp);
                temp.select();

                document.execCommand("copy");
                document.body.removeChild(temp);

                $("#alert-message").html("Copy voucher " + code + " succesfully!");
                $('#alert-message').fadeIn();
                setTimeout(function() {
                $('#alert-message').fadeOut();
                }, 2000);
            }
        </script>
    @stop
