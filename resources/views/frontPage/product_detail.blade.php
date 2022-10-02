@extends('frontPage.masterFile.layout')
@section('content')
    <!-- page__title-start -->
    <section class="page__title p-relative d-flex align-items-center" data-background="/assets/img/bg/page-title-1.jpg"
             style="background-image: url(/assets/img/page-title/page-title-1.jpg&quot;);">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__title-inner text-center">
                        <h1>Product Details</h1>
                        <div class="page__title-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Product Details</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page__title-end -->

    <!-- product-details-start -->
    <section class="product-details pt-90 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="product__modal-box d-flex">
                        <div class="tab-content mb-20" id="product-detailsContent">
                            <div class="tab-pane fade active show" id="pro-one" role="tabpanel"
                                 aria-labelledby="pro-one-tab">
                                <div class="product__modal-img product__thumb w-img">
                                    <img src="{{asset($products->product_image)}}" alt="">
                                    <div class="product__sale ">
                                        <span class="new">new</span>
                                        <span class="percent">-20%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="product__modal-content-2">
                        <h4>{{$products->product_title}}</h4>
                        <div class="product__modal-des mb-30">
                            <p>{{$products->product_desc}}</p>
                        </div>

                        @if (!$products->product_qnty == 0)
                            <div class="product-quantity-title mb-20">
                                <label>In Stock</label>
                                <p>{{$products->product_qnty}}</p>
                            </div>
                        @elseif($products->product_qnty == 0)
                            <div class="product-quantity-title mb-20">
                                <p>Product Out Of Stock</p>
                            </div>
                        @endif
                        <div class="pro-quan-area d-sm-flex align-items-center">

                            <form action="{{route('cart_post', $products->id)}}" method="POST">
                                @csrf
                                <div class="product-quantity-title mb-20">
                                    <label>Quantity</label>
                                </div>
                                <div class="product-quantity mr-20 mb-20">
                                    <div class="cart-plus-minus"><input name="qty" type="text" value="1">
                                        <div class="dec qtybutton">-</div>
                                        <div class="inc qtybutton">+</div>
                                    </div>
                                </div>
                                <div class="pro-cart-btn">
                                    {{--<a href="" class="add-cart-btn mb-20">+ Add to Cart</a>--}}
                                    <input type="submit" class="add-cart-btn mb-20" value="+ Add to Cart" >

                                </div>
                            </form>

                        </div>
                        <div class="product__price mb-25">
                            <span>${{$products->amount}}.00</span>
                        </div>
                        <div class="product__tag mb-25">
                            <span class="ct mr-20">Category:</span>
                            <span><a href="#">Accessories,</a></span>
                            <span><a href="#">Gaming,</a></span>
                            <span><a href="#">PC Computers,</a></span>
                            <span><a href="#">Ultrabooks</a></span>
                        </div>
                        <div class="product__share">
                            <span>Share :</span>
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-behance"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row mt-50">
                <div class="col-xl-12">
                    <div class="trending__info text-center">
                        <h5>Trending Products</h5>
                        <p>Mirum est notare quam littera gothica quam nunc putamus parum claram!</p>
                    </div>
                </div>
            </div>
            <div class="row mt-40">
                @if (count($relateds)>0)
                    @foreach ($relateds as $related)
                        <div class="col-xl-3 col-lg-3 col-sm-6">
                            <div class="product__item mb-20">
                                <div class="product__thumb w-img fix">
                                    <a href="{{ route('product_detail', $related->id) }}">
                                        <img src="{{asset($related->product_image)}}" alt="">
                                    </a>
                                    <div class="product__action transition-3">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <svg viewBox="0 0 22 22">
                                                        <g>
                                                            <path d="M18,19H6c-0.5,0-0.92-0.37-0.99-0.86L3.13,5H1C0.45,5,0,4.55,0,4s0.45-1,1-1h3c0.5,0,0.92,0.37,0.99,0.86L6.87,17h10.39
                                        l2.4-8H11c-0.55,0-1-0.45-1-1s0.45-1,1-1h10c0.32,0,0.61,0.15,0.8,0.4c0.19,0.25,0.25,0.58,0.16,0.88l-3,10
                                        C18.83,18.71,18.44,19,18,19z"></path>
                                                        </g>
                                                    </svg>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <svg viewBox="0 0 22 22">
                                                        <path d="M20.26,11.3c2.31-2.36,2.31-6.18-0.02-8.53C19.11,1.63,17.6,1,16,1c0,0,0,0,0,0c-1.57,0-3.05,0.61-4.18,1.71c0,0,0,0,0,0
                                    L11,3.41l-0.81-0.69c0,0,0,0,0,0C9.06,1.61,7.58,1,6,1C4.4,1,2.89,1.63,1.75,2.77c-2.33,2.35-2.33,6.17-0.02,8.53
                                    c0,0,0,0.01,0.01,0.01l0.01,0.01c0,0,0,0,0,0c0,0,0,0,0,0L11,20.94l9.25-9.62c0,0,0,0,0,0c0,0,0,0,0,0L20.26,11.3
                                    C20.26,11.31,20.26,11.3,20.26,11.3z M3.19,9.92C3.18,9.92,3.18,9.92,3.19,9.92C3.18,9.92,3.18,9.91,3.18,9.91
                                    c-1.57-1.58-1.57-4.15,0-5.73C3.93,3.42,4.93,3,6,3c1.07,0,2.07,0.42,2.83,1.18C8.84,4.19,8.85,4.2,8.86,4.21
                                    c0.01,0.01,0.01,0.02,0.03,0.03l1.46,1.25c0.07,0.06,0.14,0.09,0.22,0.13c0.01,0,0.01,0.01,0.02,0.01c0.13,0.06,0.27,0.1,0.41,0.1
                                    c0.08,0,0.16-0.03,0.25-0.05c0.03-0.01,0.07-0.01,0.1-0.02c0.07-0.03,0.13-0.07,0.2-0.11c0.03-0.02,0.07-0.03,0.1-0.06l1.46-1.24
                                    c0.01-0.01,0.02-0.02,0.03-0.03c0.01-0.01,0.03-0.01,0.04-0.02C13.93,3.42,14.93,3,16,3c0,0,0,0,0,0c1.07,0,2.07,0.42,2.83,1.18
                                    c1.56,1.58,1.56,4.15,0,5.73c0,0,0,0.01-0.01,0.01c0,0,0,0,0,0L11,18.06L3.19,9.92z"></path>
                                                    </svg>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                   data-bs-target="#productModalId">
                                                    <svg viewBox="0 0 22 22">
                                                        <path d="M11,19c-6.53,0-10.42-7.23-10.58-7.53L0.17,11l0.25-0.47C0.58,10.23,4.47,3,11,3s10.42,7.23,10.58,7.53L21.83,11l-0.25,0.47
                                    C21.42,11.77,17.53,19,11,19z M2.46,11c0.92,1.49,4.08,6,8.54,6c4.48,0,7.63-4.51,8.54-6C18.62,9.52,15.46,5,11,5
                                    C6.52,5,3.37,9.51,2.46,11z M11,15c-2.21,0-4-1.79-4-4s1.79-4,4-4s4,1.79,4,4S13.21,15,11,15z M11,9c-1.1,0-2,0.9-2,2s0.9,2,2,2
                                    s2-0.9,2-2S12.1,9,11,9z"></path>
                                                    </svg>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product__content">
                                    <h3 class="product__title">
                                        <a href="{{ route('product_detail', $related->id) }}">{{$related->product_title}}</a>
                                    </h3>
                                    <div class="product__price product__price-4 mb-10">
                                        <span class="price">${{$related->amount}}.00</span>
                                    </div>
                                    <div class="product__select-button">
                                        <a href="{{ route('product_detail', $related->id) }}" class="select-btn w-100">Select
                                            Options</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- product-details-end -->
@endsection
