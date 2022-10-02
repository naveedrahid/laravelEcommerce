<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
       <!-- CSRF Token -->
       <meta name="csrf-token" content="{{ csrf_token() }}">

       <title></title>

      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Place favicon.ico in the root directory -->
      <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">
      <!-- CSS here -->
      <link rel="stylesheet" href="{{asset('assets/css/preloader.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/meanmenu.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/owl-carousel.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/swiper-bundle.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/backtotop.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/font-awesome-pro.css')}}">
      <link rel="stylesheet" href="{{asset('assets/flaticon/flaticon.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/default.css')}}">
       <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
   </head>
   <body>
      <!--[if lte IE 9]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
      <![endif]-->

        <!-- prealoder area start -->
        {{-- <div id="loading">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="first_object"></div>
                    <div class="object" id="second_object"></div>
                    <div class="object" id="third_object"></div>
                </div>
            </div>
        </div> --}}
        <!-- prealoder area end -->

        <!-- back to top start -->
        <div class="progress-wrap">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>
        <!-- back to top end -->
        <!-- header area start -->
        <header>
            <div class="header__area">
                <div class="header__top black-bg d-none d-md-block">
                    <div class="container">
                        <div class="row">
                            <div class="col-xxl-12">
                                <div class="header__top-info text-center">
                                    <ul>
                                        <li>
                                            <p>5% for all order in this week <a href="{{route('shop')}}">Shop Now</a></p>
                                        </li>
                                        <li>
                                            <p><a>Free delivery for all orders over <span>$200</span></a></p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header__bottom">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xxl-2 col-xl-2 col-lg-3 col-6">
                                <div class="logo">
                                    <a href="{{ url('/') }}">
                                        <img src="assets/img/logo/logo.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-8 d-none d-lg-block">
                                <div class="category__menu d-flex align-items-center">
                                    <div class="category__btn mr-20">
                                        <button class="cat-btn" type="button"><i class="far fa-bars"></i>All Categories</button>
                                        <div class="side-submenu transition-3">
                                            <nav>
                                                <ul>
                                                    @if (!$categories == 0)
                                                        @foreach ($categories as $category)
                                                            <li>
                                                                <a href="">{{$category->cat_title}}</a>
                                                            </li>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                    <nav>
                                        <ul>
                                            <li>
                                                <a href="/">Home</a>
                                            </li>
                                            <li>
                                                <a href="{{route('shop')}}">Shop</a>
                                            </li>
                                            <li>
                                                <a href="#">Contact Us</a>
                                            </li>
                                            @if(! Auth::user() == null)
                                            <li class="nav-item">




                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>

                                            </li>
                                            @else
                                                <a href="{{route('login')}}">
                                                    {{ __('login') }}
                                                </a>
                                            @endif
                                            @if(! Auth::user() == null)
                                                <li><a href="{{ route('myaccount') }}">My Account</a></li>
                                            @endif
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-xl-4 col-lg-1 col-6">
                                <div class="header__bottom-right-wrapper d-flex justify-content-end align-items-center">
                                    <div class="header__bottom-right d-none d-xl-flex align-items-center justify-content-end">
                                        <div class="header__search">
                                            <form action="#">
                                                <div class="header__search-input">
                                                    <input type="text" placeholder="Search anything..">
                                                    <button type="submit"><i class="far fa-search"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="header__action ml-30">
                                            <ul>
                                                <li>
                                                    <a href="javascript:void(0)"><i class="fal fa-user-circle"></i>
                                                        @if(Auth::user())
                                                            {{ Auth::user()->name }}
                                                        @endif
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#cartMiniModal">
                                                        <i class="fal fa-shopping-basket"></i>
                                                        <span class="cart-count">3</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="header-bar ml-20 d-xl-none">
                                        <button type="button" class="header-bar-btn" data-bs-toggle="modal" data-bs-target="#offCanvasModal">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header area end -->

        <!-- cart mini area start -->
        <div class="cartmini__area">
            <div class="modal fade" id="cartMiniModal" tabindex="-1" aria-labelledby="cartMiniModal" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="cartmini__wrapper">
                        <div class="cartmini__top d-flex align-items-center justify-content-between">
                            <h4>Your Cart</h4>
                            <div class="cartminit__close">
                                <button type="button" data-bs-dismiss="modal" data-bs-target="#cartMiniModal" class="cartmini__close-btn"> <i class="fal fa-times"></i></button>
                            </div>
                        </div>
                        <div class="cartmini__list">
                            <ul>
                                <li class="cartmini__item p-relative d-flex align-items-start">
                                    <div class="cartmini__thumb mr-15">
                                        <a href="product-details.html">
                                            <img src="assets/img/products/product-1.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="cartmini__content">
                                        <h3 class="cartmini__title">
                                            <a href="product-details.html">Form Armchair Walnut Base</a>
                                        </h3>
                                        <span class="cartmini__price">
                                            <span class="price">1 × $70.00</span>
                                        </span>
                                    </div>
                                    <a href="#" class="cartmini__remove">
                                        <i class="fal fa-times"></i>
                                    </a>
                                </li>
                                <li class="cartmini__item p-relative d-flex align-items-start">
                                    <div class="cartmini__thumb mr-15">
                                        <a href="product-details.html">
                                            <img src="assets/img/products/product-2.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="cartmini__content">
                                        <h3 class="cartmini__title">
                                            <a href="product-details.html">Form Armchair Simon Legald</a>
                                        </h3>
                                        <span class="cartmini__price">
                                            <span class="price">1 × $95.99</span>
                                        </span>
                                    </div>
                                    <a href="#" class="cartmini__remove">
                                        <i class="fal fa-times"></i>
                                    </a>
                                </li>
                                <li class="cartmini__item p-relative d-flex align-items-start">
                                    <div class="cartmini__thumb mr-15">
                                        <a href="product-details.html">
                                            <img src="assets/img/products/product-3.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="cartmini__content">
                                        <h3 class="cartmini__title">
                                            <a href="product-details.html">Antique Chinese Armchairs</a>
                                        </h3>
                                        <span class="cartmini__price">
                                            <span class="price">1 × $120.00</span>
                                        </span>
                                    </div>
                                    <a href="#" class="cartmini__remove">
                                        <i class="fal fa-times"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="cartmini__total d-flex align-items-center justify-content-between">
                            <h5>Total</h5>
                            <span>$180.00</span>
                        </div>
                        <div class="cartmini__bottom">
                            <a href="cart.html" class="b-btn w-100 mb-20">view cart</a>
                            <a href="checkout.html" class="b-btn-2 w-100">checkout</a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!-- cart mini area end -->
        <div class="body-overlay"></div>
        <!-- cart mini area end -->

        <!-- sidebar area start -->
        <section class="offcanvas__area">
            <div class="modal fade" id="offCanvasModal" tabindex="-1" aria-labelledby="offCanvasModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="offcanvas__wrapper">
                            <div class="offcanvas__top d-flex align-items-center mb-60 justify-content-between">
                                <div class="logo">
                                    <a href="index.html">
                                    <img src="assets/img/logo/logo.png" alt="logo">
                                    </a>
                                </div>
                                <div class="offcanvas__close">
                                    <button class="offcanvas__close-btn" data-bs-dismiss="modal" data-bs-target="#offCanvasModal">
                                        <svg viewBox="0 0 22 22">
                                            <path d="M12.41,11l5.29-5.29c0.39-0.39,0.39-1.02,0-1.41s-1.02-0.39-1.41,0L11,9.59L5.71,4.29c-0.39-0.39-1.02-0.39-1.41,0
                                            s-0.39,1.02,0,1.41L9.59,11l-5.29,5.29c-0.39,0.39-0.39,1.02,0,1.41C4.49,17.9,4.74,18,5,18s0.51-0.1,0.71-0.29L11,12.41l5.29,5.29
                                            C16.49,17.9,16.74,18,17,18s0.51-0.1,0.71-0.29c0.39-0.39,0.39-1.02,0-1.41L12.41,11z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="sidebar__search mb-25">
                                <form action="#">
                                   <input type="text" placeholder="What are you searching for?">
                                   <button type="submit"><i class="far fa-search"></i></button>
                                </form>
                             </div>
                            <div class="offcanvas__content p-relative z-index-1">
                                <div class="canvas__menu">
                                    <div class="mobile-menu fix"></div>
                                </div>
                                <div class="offcanvas__action mt-40 mb-15">
                                    <a href="contact.html">Login</a>
                                    <a href="wishlist.html" class="has-tag">
                                        <svg viewBox="0 0 22 22">
                                            <path d="M20.26,11.3c2.31-2.36,2.31-6.18-0.02-8.53C19.11,1.63,17.6,1,16,1c0,0,0,0,0,0c-1.57,0-3.05,0.61-4.18,1.71c0,0,0,0,0,0
                                            L11,3.41l-0.81-0.69c0,0,0,0,0,0C9.06,1.61,7.58,1,6,1C4.4,1,2.89,1.63,1.75,2.77c-2.33,2.35-2.33,6.17-0.02,8.53
                                            c0,0,0,0.01,0.01,0.01l0.01,0.01c0,0,0,0,0,0c0,0,0,0,0,0L11,20.94l9.25-9.62c0,0,0,0,0,0c0,0,0,0,0,0L20.26,11.3
                                            C20.26,11.31,20.26,11.3,20.26,11.3z M3.19,9.92C3.18,9.92,3.18,9.92,3.19,9.92C3.18,9.92,3.18,9.91,3.18,9.91
                                            c-1.57-1.58-1.57-4.15,0-5.73C3.93,3.42,4.93,3,6,3c1.07,0,2.07,0.42,2.83,1.18C8.84,4.19,8.85,4.2,8.86,4.21
                                            c0.01,0.01,0.01,0.02,0.03,0.03l1.46,1.25c0.07,0.06,0.14,0.09,0.22,0.13c0.01,0,0.01,0.01,0.02,0.01c0.13,0.06,0.27,0.1,0.41,0.1
                                            c0.08,0,0.16-0.03,0.25-0.05c0.03-0.01,0.07-0.01,0.1-0.02c0.07-0.03,0.13-0.07,0.2-0.11c0.03-0.02,0.07-0.03,0.1-0.06l1.46-1.24
                                            c0.01-0.01,0.02-0.02,0.03-0.03c0.01-0.01,0.03-0.01,0.04-0.02C13.93,3.42,14.93,3,16,3c0,0,0,0,0,0c1.07,0,2.07,0.42,2.83,1.18
                                            c1.56,1.58,1.56,4.15,0,5.73c0,0,0,0.01-0.01,0.01c0,0,0,0,0,0L11,18.06L3.19,9.92z"/>
                                        </svg>
                                        <span class="tag">2</span>
                                    </a>
                                    <a href="cart.html" class="has-tag">
                                        <i class="far fa-shopping-bag"></i>
                                        <span class="tag">3</span>
                                    </a>
                                    <div class="header__select header__select-d d-flex align-items-center mt-10">
                                        <div class="header__lang header__select-item mr-15">
                                            <select>
                                                <option>EN</option>
                                                <option>BN</option>
                                                <option>IN</option>
                                                <option>CH</option>
                                                <option>AM</option>
                                            </select><div class="nice-select" tabindex="0"><span class="current">EN</span><ul class="list list-2"><li data-value="EN" class="option selected focus">EN</li><li data-value="BN" class="option">BN</li><li data-value="IN" class="option">IN</li><li data-value="CH" class="option">CH</li><li data-value="AM" class="option">AM</li></ul></div>
                                        </div>
                                        <div class="header__currency header__select-item">
                                            <select>
                                                <option>USD</option>
                                                <option>Euro</option>
                                                <option>Yen</option>
                                                <option>Rupee</option>
                                                <option>Sterlin</option>
                                            </select><div class="nice-select" tabindex="0"><span class="current">USD</span><ul class="list list-2"><li data-value="USD" class="option selected focus">USD</li><li data-value="Euro" class="option">Euro</li><li data-value="Yen" class="option">Yen</li><li data-value="Rupee" class="option">Rupee</li><li data-value="Sterlin" class="option">Sterlin</li></ul></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="offcanvas__social mt-15">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-instagram"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- sidebar area end -->
        <main class="main_wrapper">
            @if ($errors->any())
            <div class="alert alert-danger">
                <p><strong>Opps Something went wrong</strong></p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
            @php
                 $url = URL::to('');
                 $current  = url()->current();
            @endphp
            @if($url == $current || url('login'))
            @else
            <section class="page__title p-relative d-flex align-items-center" data-background="assets/img/bg/page-title-1.jpg" style="background-image: url(&quot;assets/img/page-title/page-title-1.jpg&quot;);">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="page__title-inner text-center">
                                    <h1>@yield('page-title')</h1>
                                    <div class="page__title-breadcrumb">
                                        <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb justify-content-center">
                                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Shop</li>
                                        </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                @endif
        @yield('content')
        </main>
        <!-- footer area start -->
        <footer>
            <div class="footer__area footer-bg">
                <div class="footer__top footer__top-space pb-50">
                    <div class="container">
                        <div class="row">
                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                <div class="footer__widget footer__widget-border footer-col-1 pb-30">
                                    <div class="footer__info">
                                        <div class="logo footer__logo mb-55">
                                            <a href="index.html">
                                                <img src="assets/img/logo/logo-2.png" alt="">
                                            </a>
                                        </div>
                                        <div class="footer__subscribe">
                                            <p>Complete equipment for your home workshop or company!</p>
                                            <form action="#">
                                                <div class="footer__subscribe-input">
                                                    <input type="email" placeholder="Enter Email ID ...">
                                                    <button type="submit"><i class="fab fa-telegram-plane"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                <div class="footer__widget footer-col-2 pb-30">
                                    <h3 class="footer__widget-title">Need help</h3>
                                    <div class="footer__widget-content">
                                        <div class="footer__contact">
                                            <h3 class="footer__contact-phone"><a href="tel:1234-5678-90">(+80) 1234 5678 90</a></h3>
                                            <div class="footer__opening">
                                                <p>Monday - Friday: 9:00-20:00</p>
                                                <p>Saturady: 11:00 - 15:00</p>
                                            </div>
                                            <div class="footer__contact-email">
                                                <p><a href="mailto:balckwood@support.com">balckwood@support.com</a></p>
                                            </div>
                                            <div class="footer__social">
                                                <ul>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fab fa-facebook-f"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fab fa-twitter"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fab fa-instagram"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fab fa-youtube"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fab fa-pinterest"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-2 col-xl-2 col-lg-4 col-md-4 col-sm-6 col-6">
                                <div class="footer__widget footer-col-3 pb-30">
                                    <h3 class="footer__widget-title">Useful Links</h3>
                                    <div class="footer__widget-content">
                                        <div class="footer__links">
                                            <ul>
                                                <li>
                                                    <a href="contact.html">Privacy Policy</a>
                                                </li>
                                                <li>
                                                    <a href="contact.html">Returns</a>
                                                </li>
                                                <li>
                                                    <a href="contact.html">Terms & Conditions</a>
                                                </li>
                                                <li>
                                                    <a href="contact.html">Contact Us</a>
                                                </li>
                                                <li>
                                                    <a href="blog-detailabout.html.html">Latest News</a>
                                                </li>
                                                <li>
                                                    <a href="contact.html">Our Sitemap</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-2 col-xl-2 col-lg-4 col-md-4 col-sm-6 col-6">
                                <div class="footer__widget footer-col-4 pb-30">
                                    <h3 class="footer__widget-title">Our Stores</h3>
                                    <div class="footer__widget-content">
                                        <div class="footer__links">
                                            <ul>
                                                <li>
                                                    <a href="about.html">New York</a>
                                                </li>
                                                <li>
                                                    <a href="about.html">London SF</a>
                                                </li>
                                                <li>
                                                    <a href="about.html">Cockfosters BP</a>
                                                </li>
                                                <li>
                                                    <a href="about.html">Los Angeles</a>
                                                </li>
                                                <li>
                                                    <a href="about.html">Chicago</a>
                                                </li>
                                                <li>
                                                    <a href="about.html">Las Vegas</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-2 col-xl-2 col-lg-4 col-md-4 col-sm-6 col-6">
                                <div class="footer__widget footer-col-5 pb-30">
                                    <h3 class="footer__widget-title">My Account</h3>
                                    <div class="footer__widget-content">
                                        <div class="footer__links">
                                            <ul>
                                                <li>
                                                    <a href="contact.html">My Account</a>
                                                </li>
                                                <li>
                                                    <a href="contact.html">Order History</a>
                                                </li>
                                                <li>
                                                    <a href="wishlist.html">Wish List</a>
                                                </li>
                                                <li>
                                                    <a href="contact.html">Newsletter</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer__offer">
                    <div class="container">
                        <div class="footer__offer-inner">
                            <div class="row">
                                <div class="col-xxl-12">
                                    <div class="footer__offer-content d-sm-flex align-items-center justify-content-center">
                                        <p>5% for all order in this week <a href="#">Shop now</a></p>
                                        <p>Free delivery for all orders over $200</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer__bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-xxl-12">
                                <div class="footer__bottom-wrapper">
                                    <div class="footer__bottom-links">
                                        <ul>
                                            <li>
                                                <a href="about.html">About Us</a>
                                            </li>
                                            <li>
                                                <a href="contact.html">Delivery Information</a>
                                            </li>
                                            <li>
                                                <a href="contact.html">Privacy Policy</a>
                                            </li>
                                            <li>
                                                <a href="contact.html">Terms & Conditions</a>
                                            </li>
                                            <li>
                                                <a href="contact.html">Contact Us</a>
                                            </li>
                                            <li>
                                                <a href="contact.html">Site Map</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="footer__copyright">
                                        <p>Copyright ©2022 <a href="index.html">Blackwood.com</a> All Rights Reserved</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer area end -->


      <!-- JS here -->
      <script src="{{asset('assets/js/vendor/jquery.js')}}"></script>
      <script src="{{ asset('js/app.js') }}" defer></script>
      <script src="{{asset('assets/js/vendor/waypoints.js')}}"></script>
      <script src="{{asset('assets/js/bootstrap-bundle.js')}}"></script>
      <script src="{{asset('assets/js/meanmenu.js')}}"></script>
      <script src="{{asset('assets/js/swiper-bundle.js')}}"></script>
      <script src="{{asset('assets/js/owl-carousel.js')}}"></script>
      <script src="{{asset('assets/js/magnific-popup.js')}}"></script>
      <script src="{{asset('assets/js/parallax.js')}}"></script>
      <script src="{{asset('assets/js/backtotop.js')}}"></script>
      <script src="{{asset('assets/js/nice-select.js')}}"></script>
      <script src="{{asset('assets/js/counterup.js')}}"></script>
      <script src="{{asset('assets/js/countdown.js')}}"></script>
      <script src="{{asset('assets/js/wow.js')}}"></script>
      <script src="{{asset('assets/js/isotope-pkgd.js')}}"></script>
      <script src="{{asset('assets/js/imagesloaded-pkgd.js')}}"></script>
      <script src="{{asset('assets/js/ajax-form.js')}}"></script>
      <script src="https://js.stripe.com/v2/"></script>
      <script src="{{asset('assets/js/main.js')}}"></script>
<script>
setTimeout(function() {
    $('.alert-danger').fadeOut();
}, 3000);
setTimeout(function() {
    $('.alert-success').fadeOut();
}, 3000);
</script>

      @stack('script')
      @stack('newscript')

   </body>
</html>
