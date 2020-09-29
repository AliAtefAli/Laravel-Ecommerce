@extends('website.layouts.master')

@section('content')

    <!-- section start -->
    <section>
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product-slick">

                            @foreach($images as $image)
                                <div><img src="{{ asset('assets/images/products/' . $image->path )}}" alt=""
                                          class="img-fluid blur-up lazyload image_zoom_cls-0"></div>
                            @endforeach

                        </div>
                        <div class="row">
                            <div class="col-12 p-0">
                                <div class="slider-nav">

                                    @foreach($images as $image)
                                        <div>
                                            <img src="{{ asset('assets/images/products/' . $image->path )}}" alt=""
                                                 class="img-fluid blur-up lazyload">
                                        </div>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 rtl-text">
                        <div class="product-right">
                            <h2 class="mb-0">{{ $product->name }}</h2>

                            <h3>${{ $product->price }}</h3>

                            <div class="product-description border-product">

                                <h6 class="product-title">quantity</h6>
                                <div class="qty-box">
                                    <div class="input-group"><span class="input-group-prepend"><button type="button"
                                                                                                       class="btn quantity-left-minus"
                                                                                                       data-type="minus"
                                                                                                       data-field=""><i
                                                    class="ti-angle-left"></i></button> </span>
                                        <input type="text" name="quantity" class="form-control input-number" value="1">
                                        <span class="input-group-prepend"><button type="button"
                                                                                  class="btn quantity-right-plus"
                                                                                  data-type="plus" data-field=""><i
                                                    class="ti-angle-right"></i></button></span></div>
                                </div>
                            </div>
                            <div class="product-buttons"><a href="#" data-toggle="modal" data-target="#addtocart"
                                                            class="btn btn-solid">add to cart</a> <a href="#"
                                                                                                     class="btn btn-solid">buy
                                    now</a>
                            </div>
                            <div class="border-product">
                                <h6 class="product-title">product details</h6>
                                <p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium
                                    doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore
                                    veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam
                                    voluptatem,</p>
                            </div>
                            <div class="border-product">
                                <h6 class="product-title">share it</h6>
                                <div class="product-icon">
                                    <ul class="product-social">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                    </ul>
                                    <form class="d-inline-block">
                                        <button class="wishlist-btn"><i class="fa fa-heart"></i><span
                                                class="title-font">Add To WishList</span></button>
                                    </form>
                                </div>
                            </div>
                            <div class="border-product">
                                <h6 class="product-title">Time Reminder</h6>
                                <div class="timer">
                                    <p id="demo"><span>25 <span class="padding-l">:</span> <span
                                                class="timer-cal">Days</span> </span><span>22 <span
                                                class="padding-l">:</span> <span class="timer-cal">Hrs</span>
                                        </span><span>13 <span class="padding-l">:</span> <span
                                                class="timer-cal">Min</span> </span><span>57 <span
                                                class="timer-cal">Sec</span></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->

@endsection


