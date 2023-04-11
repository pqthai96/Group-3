@extends('layout')
@section('title', 'Testo - Blog')
@section('content')

<div id="page" class="page">
    <!-- PAGE HERO
    ============================================= -->
    <div id="blog-page" class="page-hero-section division">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 ">
                    <div class="hero-txt text-center white-color">

                        <!-- Breadcrumb -->
                        <div id="breadcrumb">
                            <div class="row">
                                <div class="col">
                                    <div class="breadcrumb-nav">
                                        <nav aria-label="breadcrumb">
                                              <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="demo-1.html">{{ __('Home') }}</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">{{ __('Our Blog') }}</li>
                                              </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Title -->
                        <h2 class="h2-xl">{{ __('Blog Listing') }}</h2>

                    </div>
                </div>
            </div>	  <!-- End row -->
        </div>	   <!-- End container -->
    </div>	<!-- END PAGE HERO -->


    <!-- BLOG POSTS LISTING
    ============================================= -->

    <section id="blog-listing" class="wide-60 blog-page-section division">
            <div class="container">
                @foreach ( $blog as $bg )
                <div class="row my-5 border bg-light shadow">
                    <div class="col-md-6" style="background-image: url({{ $bg -> BlogIMG }}); background-size: cover; background-position: center center; opacity: 1; min-height:300px;">
                    </div>
                    <div class="col-md-6 align-self-center p-4 ">
                        <h3 class="font-weight-light" style="color:#c92d45">{{ $bg -> BlogTitle }}</h3>
                        <p class="cutoff-text">{{ $bg -> BlogContent }}</p>
                        <a href="{{ url('single-blog/'.$bg->BlogID) }}" class="btn-outline-warning btn-lg">See More</a>
                    </div>
                </div>
                @endforeach
            </div>
    </section>	<!-- END BLOG POSTS LISTING -->

@endsection
