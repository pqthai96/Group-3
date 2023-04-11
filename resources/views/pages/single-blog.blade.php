@extends('layout')
@section('title', 'Testo - Post')
@section('content')
    <!-- PAGE HERO
                                                           ============================================= -->
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
                                                    <li class="breadcrumb-item"><a href="demo-1.html">Home</a></li>
                                                    <li class="breadcrumb-item active" aria-current="page">Our Blog</li>
                                                    <li class="breadcrumb-item active" aria-current="page">Single Blog</li>
                                                </ol>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Title -->
                            <h2 class="h2-xl">Blog</h2>

                        </div>
                    </div>
                </div> <!-- End row -->
            </div> <!-- End container -->
        </div> <!-- END PAGE HERO -->
        <!-- SINGLE POST
                                                                ============================================= -->
        <section id="single-post" class="wide-100 single-post-section division">
            <div class="container">
                <!-- SINGLE POST CONTENT -->
                @foreach ($blog as $bg)
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">

                        <div class="single-post-wrapper">
                            <div class="single-post-title">
                                <h2 class="h2-xs">{{ $bg -> BlogTitle }}</h2>
                            </div>
                            {{-- IMG --}}
                            <div class="post-inner-img">
                                {{-- <div style="background-image: url({{ $pt -> BlogIMG }}); background-size: cover; background-position: center center; opacity: 1;">
                                </div> --}}
                                <img class="img-fluid" src="{{ asset($bg -> BlogIMG) }}" alt="blog-post-image"/>
                            </div>
                            <!-- BLOG POST TEXT -->
                            <div class="single-post-txt">
                                <!-- Text -->
                                <p style="text-align: justify">
                                    {{ $bg -> BlogContent }}
                                </p>
                                <!-- BLOG POST INNER IMAGES -->
                            </div> <!-- END BLOG POST TEXT -->
                            <!-- SINGLE POST SHARE LINKS -->
                        </div>

                        <div class="row post-share-links d-flex align-items-center">
                            <!-- POST TAGS -->
                            <div class="col-md-9 col-xl-8 post-tags-list">
                                <a href="#" style="color:blue">#Life</a>
                                <a href="#" style="color:blue">#Ideas</a>
                                <a href="#" style="color:blue">#Story</a>
                                <a href="#" style="color:blue">#Pizza</a>
                            </div>

                            <!-- POST SHARE ICONS -->
                            <div class="col-md-3 col-xl-4 post-share-list text-right">
                                <ul class="share-social-icons text-center clearfix">
                                    <li><a href="#" class="share-ico ico-facebook"><i
                                                class="fab fa-facebook-square"></i></a></li>
                                    <li><a href="#" class="share-ico ico-twitter"><i
                                                class="fab fa-twitter"></i></a>
                                    </li>
                                    <li><a href="#" class="share-ico ico-like"><i class="far fa-bookmark"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div> <!-- END SINGLE POST SHARE -->

                    </div>
                </div> <!-- END SINGLE POST CONTENT -->
                @endforeach
            </div> <!-- End container -->
        </section> <!-- END SINGLE POST -->
    </div> <!-- END PAGE CONTENT -->
@endsection
