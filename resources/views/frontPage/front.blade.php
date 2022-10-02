@extends('frontPage.masterFile.layout')
@section('content')
    <!-- slider area start -->
    <section class="slider__area">
        <div class="slider__active swiper-container">

            @if (count($sliders) > 0)
                <div class="swiper-wrapper">
                    @foreach ($sliders as $slider)
                        @if ($slider->slide_status == 'published')
                            <div class="slider__item slider__height swiper-slide d-flex align-items-center include-bg"
                                data-background="<?php echo asset($slider->slide_img); ?>">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xxl-5">
                                            <div class="slider__content p-relative z-index-11">
                                                <span data-animation="fadeInUp"
                                                    data-delay=".3s">{{ $slider->label_name }}</span>
                                                <h3 class="slider__title" data-animation="fadeInUp" data-delay=".5s">
                                                    {{ $slider->slide_text }}</h3>
                                                <div class="slider__btn" data-animation="fadeInUp" data-delay=".4s">
                                                    <a href="shop.html" class="slider-btn">Discover Now <i
                                                            class="fal fa-angle-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
            <div class="main-slider-pagination">
                <button class="main-slider-button-prev"><i class="fal fa-angle-left"></i></button>
                <button class="main-slider-button-next"><i class="fal fa-angle-right"></i></button>
            </div>
        </div>
    </section>
    <!-- slider area end -->

    <!-- category area start -->
    <section class="category__area pt-40 grey-bg-3">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="section__title-wrapper section__title-line mb-40">
                        <h3 class="section__title">Top Categories</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-2 col-xl-2 col-lg-4 col-md-4 col-sm-6">
                    <div class="category__item mb-30 grey-bg-3">
                        <div class="category__thumb w-img fix">
                            <a href="shop.html">
                                <img src="assets/img/products/category/category-1.jpg" alt="">
                            </a>
                        </div>
                        <div class="category__content text-center">
                            <h3 class="category__title">
                                <a href="shop.html">Clocks</a>
                            </h3>
                            <span class="category__quantity">(70)</span>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-2 col-xl-2 col-lg-4 col-md-4 col-sm-6">
                    <div class="category__item mb-30 grey-bg-3">
                        <div class="category__thumb w-img fix">
                            <a href="shop.html">
                                <img src="assets/img/products/category/category-2.jpg" alt="">
                            </a>
                        </div>
                        <div class="category__content text-center">
                            <h3 class="category__title">
                                <a href="shop.html">Furniture</a>
                            </h3>
                            <span class="category__quantity">(95)</span>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-2 col-xl-2 col-lg-4 col-md-4 col-sm-6">
                    <div class="category__item mb-30 grey-bg-3">
                        <div class="category__thumb w-img fix">
                            <a href="shop.html">
                                <img src="assets/img/products/category/category-3.jpg" alt="">
                            </a>
                        </div>
                        <div class="category__content text-center">
                            <h3 class="category__title">
                                <a href="shop.html">Lighting</a>
                            </h3>
                            <span class="category__quantity">(85)</span>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-2 col-xl-2 col-lg-4 col-md-4 col-sm-6">
                    <div class="category__item mb-30 grey-bg-3">
                        <div class="category__thumb w-img fix">
                            <a href="shop.html">
                                <img src="assets/img/products/category/category-4.jpg" alt="">
                            </a>
                        </div>
                        <div class="category__content text-center">
                            <h3 class="category__title">
                                <a href="shop.html">Wall Lamp</a>
                            </h3>
                            <span class="category__quantity">(60)</span>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-2 col-xl-2 col-lg-4 col-md-4 col-sm-6">
                    <div class="category__item mb-30 grey-bg-3">
                        <div class="category__thumb w-img fix">
                            <a href="shop.html">
                                <img src="assets/img/products/category/category-5.jpg" alt="">
                            </a>
                        </div>
                        <div class="category__content text-center">
                            <h3 class="category__title">
                                <a href="shop.html">Outdoor</a>
                            </h3>
                            <span class="category__quantity">(88)</span>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-2 col-xl-2 col-lg-4 col-md-4 col-sm-6">
                    <div class="category__item mb-30 grey-bg-3">
                        <div class="category__thumb w-img fix">
                            <a href="shop.html">
                                <img src="assets/img/products/category/category-6.jpg" alt="">
                            </a>
                        </div>
                        <div class="category__content text-center">
                            <h3 class="category__title">
                                <a href="shop.html">Kitchen</a>
                            </h3>
                            <span class="category__quantity">(73)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- category area end -->

    <!-- product area start -->
    <section class="product__area pt-95 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-xxl-5 col-xl-6 col-lg-6">
                    <div class="product__sale-wrapper">
                        <div class="section__title-wrapper mb-20">
                            <h3 class="section__title-2">Sale Products</h3>
                        </div>
                        <div class="product__sale-slider common-nav owl-carousel">
                            @if (count($products) > 0)
                                @foreach ($products as $product)
                                    <div class="product__sale-item p-relative">
                                        <div class="product__sale-thumb w-img fix">
                                            <a href="{{ route('product_detail', $product->id) }}">
                                                <img src="{{ asset($product->product_image) }}" alt="">
                                            </a>
                                            <div class="product__sale-flash">
                                                <span>20%</span>
                                            </div>

                                        </div>
                                        <div class="product__sale-content text-center">
                                            <h3 class="product__sale-title">
                                                <a
                                                    href="{{ route('product_detail', $product->id) }}">{{ $product->product_title }}</a>
                                            </h3>
                                            <span class="product__sale-tag">
                                                {{ $product->product_short_desc }}
                                            </span>
                                            <div class="product__sale-price">
                                                <span class="price">${{ $product->amount }}</span>
                                            </div>
                                            <div class="product__countdown-wrapper product__border mt-20 pt-20">
                                                <div class="product__countdown" data-countdown="2025/01/01"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-xxl-7 col-xl-6 col-lg-6">
                    <div class="product__item-wrapper pt-15">
                        <div class="product__top section__title-line d-sm-flex align-items-start mb-35">
                            <div class="section__title-wrapper mr-30">
                                <h3 class="section__title">Special Offer</h3>
                            </div>
                        </div>
                        <div class="product__tab-content">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="new" role="tabpanel"
                                    aria-labelledby="new-tab">
                                    <div class="product__item-slider common-nav owl-carousel">
                                        @if (count($products) > 0)
                                            @foreach ($products as $product)
                                                <div class="product__item-single">
                                                    <div class="product__item mb-20 product__item-3">
                                                        <div class="product__thumb w-img fix">

                                                            <a href="{{ route('product_detail', $product->id) }}">
                                                                <img src="{{ asset($product->product_image) }}"
                                                                    alt="">
                                                            </a>

                                                        </div>
                                                        <div class="product__content text-center">
                                                            <h3 class="product__title">
                                                                <a
                                                                    href="{{ route('product_detail', $product->id) }}">{{ $product->product_title }}</a>
                                                            </h3>
                                                            <span class="product__sale-tag">
                                                                {{ $product->product_short_desc }}
                                                            </span>
                                                            <div class="product__price-3 fix">
                                                                <span class="price">${{ $product->amount }}.00</span>
                                                                <form action="{{ route('cart_post', $product->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <div class="product__add-cart-3 transition-3">
                                                                        <a href="{{ route('product_detail', $product->id) }}"
                                                                            class="add-to-cart-btn-2">+ Add To Cart</a>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product__area pt-95 pb-80">
        <div class="container">
            <div class="row">
                <div class="product__top section__title-line d-sm-flex align-items-start mb-35 jjustify-content-centerus">
                    <div class="section__title-wrapper mr-30">
                        <h3 class="section__title">All Products</h3>
                    </div>
                </div>
                @if (count($products) > 0)
                    @foreach ($products as $product)
                        <div class="col-xxl-3 col-xl-3 col-lg-3">
                            <div class="product__item-single">
                                <div class="product__item mb-20 product__item-3">
                                    <div class="product__thumb w-img fix">
                                        <a href="{{ route('product_detail', $product->id) }}">
                                            <img src="{{ asset($product->product_image) }}" alt="">
                                        </a>

                                    </div>
                                    <div class="product__content text-center">
                                        <h3 class="product__title">
                                            <a
                                                href="{{ route('product_detail', $product->id) }}">{{ $product->product_title }}</a>
                                        </h3>
                                        <span class="product__sale-tag">
                                            {{ $product->product_short_desc }}
                                        </span>
                                        <div class="product__price-3 fix">
                                            <span class="price">${{ $product->amount }}.00</span>
                                            <form action="{{ route('cart_post', $product->id) }}" method="post">
                                                @csrf
                                                <div class="product__add-cart-3 transition-3">
                                                    <a href="{{ route('product_detail', $product->id) }}"
                                                        class="add-to-cart-btn-2">+ Add To Cart</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- product area end -->

    <!-- banner area start -->
    <section class="banner__area pb-100">
        <div class="container">
            @php
                $random = $products->random(1);
            @endphp
            @if ($random)
                @foreach ($random as $item)
                    <div class="row gx-0">
                        <div class="col-xxl-8 col-xl-8 col-lg-8">
                            <div class="banner__thumb-big w-img">
                                <img src="{{ asset($item->product_image) }}" width="100%" height="543"
                                    alt="">
                            </div>
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-lg-4">
                            <div class="banner__content text-center grey-bg-4">
                                <div class="banner__top">
                                    <h3 class="banner__title">Best Seller</h3>
                                    <p> {{ $product->product_short_desc }}</p>
                                </div>
                                <div class="banner__thumb w-img">
                                    <img src="{{ asset($item->product_image) }}" alt="">
                                </div>
                                <h3 class="product__title-2">
                                    <a href="{{ route('product_detail', $product->id) }}">{{ $product->product_title }}</a>
                                </h3>
                                <div class="product__price-2">
                                    <span class="price">${{ $product->amount }}.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>
    <!-- banner area end -->

    <!-- features area start -->
    <section class="features__area pb-70">
        <div class="container">
            <div class="row">
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="features__item text-center mb-30 features__item-border">
                        <div class="features__icon">
                            <i class="flaticon-truck"></i>
                        </div>
                        <div class="features__content">
                            <h3 class="features__title">Free Shipping</h3>
                            <p>Capped $39 per order</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="features__item text-center mb-30 features__item-border">
                        <div class="features__icon">
                            <i class="flaticon-credit-card"></i>
                        </div>
                        <div class="features__content">
                            <h3 class="features__title">Securety Payments</h3>
                            <p>Up to 12 months installments</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="features__item text-center mb-30 features__item-border">
                        <div class="features__icon">
                            <i class="flaticon-exchange"></i>
                        </div>
                        <div class="features__content">
                            <h3 class="features__title">14-Day Returns</h3>
                            <p>Shop with confidence</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="features__item text-center mb-30">
                        <div class="features__icon">
                            <i class="flaticon-call-center-agent"></i>
                        </div>
                        <div class="features__content">
                            <h3 class="features__title">24/7 Support</h3>
                            <p>Capped $39 per order</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- features area end -->
@endsection
