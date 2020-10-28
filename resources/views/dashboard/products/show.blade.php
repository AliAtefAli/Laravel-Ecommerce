@extends('dashboard.layouts.master')

@section('page-css')
    <!-- owlcarousel css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owlcarousel.css') }}">

    <!-- Rating css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/rating.css') }}">
@endsection
@section('content')

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Product Detail
                            <small>Multikart Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Physical</li>
                        <li class="breadcrumb-item active">Product Detail</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="card">
            <div class="row product-page-main card-body">
                <div class="col-xl-4">
                    <div class="product-slider owl-carousel owl-theme" id="sync1">
                        @foreach($product->images as $image)
                            <div>
                                <div class="item"><img
                                        src="{{ asset('assets/images/products/' . $image->path )}}" width="100"
                                        alt="" class="blur-up lazyloaded">
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="owl-carousel owl-theme" id="sync2">
                        @foreach($product->images as $image)
                            <div>
                                <div class="item"><img
                                        src="{{ asset('assets/images/products/' . $image->path )}}" width="100"
                                        alt=""
                                        class="blur-up lazyloaded">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="product-page-details product-right mb-0">
                        <h2>WOMEN PINK SHIRT</h2>
                        <select id="u-rating-fontawesome-o" name="rating" data-current-rating="5"
                                autocomplete="off">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <hr>
                        <h6 class="product-title">product details</h6>
                        {!! $product->description !!}
                        <div class="product-price digits mt-2">
                            <h3>${{ $product->price }}
                                {{--                                <del>$350.00</del>--}}
                            </h3>
                        </div>

                        <div class="add-product-form">
                            <h6 class="product-title">quantity</h6>
                            <fieldset class="qty-box mt-2 ml-0">
                                <div class="input-group">
                                    <input class="touchspin" type="text" value="1">
                                </div>
                            </fieldset>
                        </div>
                        <div class="m-t-15">

                            <a class="btn btn-success m-r-10" href="{{ route('products.edit', $product) }}">Edit</a>
                            <a data-toggle="modal" class="btn btn-primary m-r-10"
                               data-original-title="Delete" data-target="#deleteSubCategory-{{$product->id}}"
                               type="button">Delete</a>

                            <div class="modal fade" id="deleteSubCategory-{{$product->id}}"
                                 tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title f-w-600 text-center"
                                                id="exampleModalLabel">Delete Category</h5>
                                            <button class="close" type="button"
                                                    data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="needs-validation"
                                                  action="{{route('products.destroy',
                                                                                   $product) }}"
                                                  method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="form">
                                                    Delete <span class="text-primary">'{{ $product->name }}'</span>
                                                    Product ?
                                                </div>
                                                <div class="modal-footer">
                                                    <input class="btn btn-primary"
                                                           type="submit" value="Delete">
                                                    <button class="btn btn-secondary"
                                                            type="button" data-dismiss="modal">
                                                        Close
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

@endsection

@section('script')

    <!-- Touchspin Js-->
    <script src="{{ asset('assets/js/touchspin/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/js/touchspin/touchspin.js') }}"></script>
    <script src="{{ asset('assets/js/touchspin/input-groups.min.js') }}"></script>

    <!-- Rating Js-->
    <script src="{{ asset('assets/js/rating/jquery.barrating.js') }}"></script>
    <script src="{{ asset('assets/js/rating/rating-script.js') }}"></script>

    <!-- Owlcarousel js-->
    <script src="{{ asset('assets/js/owlcarousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/product-carousel.js') }}"></script>

    <!-- lazyload js-->
    <script src="{{ asset('assets/js/lazysizes.min.js') }}"></script>
@endsection
