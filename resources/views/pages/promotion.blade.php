@extends('layout')
@section('content')
    <div id="page" class="page">


        <!-- PAGE HERO
                                            ============================================= -->
        <div id="gift-page" class="page-hero-section division">
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
                        <div class="col-md-6"
                            style="background-image: url({{ $pt->DiscountIMG }}); background-size: cover; background-position: center center; opacity: 1; min-height:300px;">
                        </div>
                        <div class="col-md-6 align-self-center p-4 ">
                            <h3 class="font-weight-bolder " style="color:#c92d45;">{{ $pt->DiscountName }}</h3>
                            <p class="cutoff-text">time application: {{ $pt->StartDate }} to the end {{ $pt->EndDate }}
                            </p>
                            <span>Code:<strong onclick="copyText()"
                                    style="padding: 5px;border: 1px solid greenyellow;margin-left: 10px;cursor: pointer;">{{ $pt->DiscountID }}</strong></span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div> <!-- END GIFT CARDS -->
    @endsection
    @section('scripts')
        <script>
            function copyText() {
                var textToCopy = document.getElementsByTagName("strong")[0].innerText; // lấy đoạn văn bản trong thẻ p
                navigator.clipboard.writeText(textToCopy); // sao chép đoạn văn bản vào clipboard
            }
        </script>
    @endsection
