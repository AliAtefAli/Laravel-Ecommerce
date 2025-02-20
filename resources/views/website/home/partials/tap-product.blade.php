<!-- Tab product -->
<div class="title1 section-t-space">
    <h4>exclusive products</h4>
    <h2 class="title-inner1">products</h2>
</div>
<section class="section-b-space p-t-0 ratio_asos">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="theme-tab">
                    <ul class="tabs tab-title">
                        <li class="current"><a href="all">All</a></li>
                        @foreach($categories as $category)
                            <li class=""><a href="{{ $category->id }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>

                    <div class="tab-content-cls">
                        <div id="all" class="tab-content active default">
                            <div class="no-slider row">

                                @foreach($products as $product)
                                        <div class="product-box product-wrap">
                                            <div class="img-block">
                                                @if(isset($product->coupon->amount))
                                                    <div class="lable-wrapper">{{--<span class="lable1">new</span>--}}
                                                        <span
                                                            class="lable2">{{ $product->coupon->amount }}%off</span></div>
                                                @endif
                                                <div class="front">
                                                    <a title="Show Details" href="{{ route('product.show', $product) }}">
                                                        <img
                                                            src="{{ asset("assets/images/products/" . optional($product->images->first())->path) }}"
                                                            class="img-fluid  bg-img" alt=""></a>
                                                </div>
                                                <div class="back">
                                                    <a href="{{ route('product.show', $product) }}"><img
                                                            src="{{ asset("assets/images/products/" . optional($product->images->first())->path) }}"
                                                            class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                </div>
                                                <div class="cart-detail"><a href="#" title="Add to Wishlist"><i
                                                            class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                                                                                            data-toggle="modal"
                                                                                                            data-target="#quick-view"
                                                                                                            title="Quick View"><i
                                                            class="ti-search"
                                                            aria-hidden="true"></i></a> <a href="compare.html"
                                                                                           title="Compare"><i
                                                            class="ti-reload" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <div class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i> <i
                                                        class="fa fa-star"></i> <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <a href="product-page(no-sidebar).html">
                                                    <h6>{{ $product->name }}</h6>
                                                </a>
                                                @if(isset($product->coupon->amount))
                                                    <h4>
                                                        ${{ $product->price * ( (100 - $product->coupon->amount ) / 100 ) }}
                                                        <del>${{ $product->price }}</del>
                                                    </h4>
                                                @else
                                                    <h4>${{ $product->price}}</h4>
                                                @endif
                                                <ul class="color-variant">
                                                    <li class="bg-light0"></li>
                                                    <li class="bg-light1"></li>
                                                    <li class="bg-light2"></li>
                                                </ul>
                                                <div class="add-btn addCart">
                                                    <button data-id="{{$product->id}}"
                                                            class="btn btn-solid add-to-cart">
                                                        <i class="ti-shopping-cart"></i> add to cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="my-3">
                            {{ $products->links() }}
                        </div>
                        @foreach($categories as $category)
                            <div id="{{ $category->id}}" class="tab-content">
                                <div class="no-slider row">
                                    @foreach($products as $product)
                                        @if($product->category_id == $category->id)
                                            <div class="product-box product-wrap">
                                                <div class="img-block">
                                                    @if(isset($product->coupon->amount))
                                                        <div class="lable-wrapper">{{--<span class="lable1">new</span>--}}
                                                            <span
                                                                class="lable2">{{ $product->coupon->amount }}%off</span></div>
                                                    @endif
                                                    <div class="front">
                                                        <a title="Show Details" href="{{ route('product.show', $product) }}">
                                                            <img
                                                                src="{{ asset("assets/images/products/" . optional($product->images->first())->path) }}"
                                                                class="img-fluid  bg-img" alt=""></a>
                                                    </div>
                                                    <div class="back">
                                                        <a href="{{ route('product.show', $product) }}"><img
                                                                src="{{ asset("assets/images/products/" . optional($product->images->first())->path) }}"
                                                                class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                    </div>
                                                    <div class="cart-detail"><a href="#" title="Add to Wishlist"><i
                                                                class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                                                                                                data-toggle="modal"
                                                                                                                data-target="#quick-view"
                                                                                                                title="Quick View"><i
                                                                class="ti-search"
                                                                aria-hidden="true"></i></a> <a href="compare.html"
                                                                                               title="Compare"><i
                                                                class="ti-reload" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-info">
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i> <i
                                                            class="fa fa-star"></i> <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="product-page(no-sidebar).html">
                                                        <h6>{{ $product->name }}</h6>
                                                    </a>
                                                    @if(isset($product->coupon->amount))
                                                        <h4>
                                                            ${{ $product->price * ( (100 - $product->coupon->amount ) / 100 ) }}
                                                            <del>${{ $product->price }}</del>
                                                        </h4>
                                                    @else
                                                        <h4>${{ $product->price}}</h4>
                                                    @endif
                                                    <ul class="color-variant">
                                                        <li class="bg-light0"></li>
                                                        <li class="bg-light1"></li>
                                                        <li class="bg-light2"></li>
                                                    </ul>
                                                    <div class="add-btn addCart">
                                                        <button data-id="{{$product->id}}"
                                                                class="btn btn-solid add-to-cart">
                                                            <i class="ti-shopping-cart"></i> add to cart
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Tab product end -->

@push('js')
    <script>
        $('.addCart').on('click', function () {

            $.notify({
                icon: 'fa fa-check',
                title: 'Success!',
                message: 'Item Successfully added to your cart'
            }, {
                element: 'body',
                position: null,
                type: "success",
                allow_dismiss: true,
                newest_on_top: false,
                showProgressbar: true,
                placement: {
                    from: "top",
                    align: "right"
                },
                offset: 20,
                spacing: 10,
                z_index: 1031,
                delay: 1000,
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                },
                icon_type: 'class',
                template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                    '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                    '<span data-notify="icon"></span> ' +
                    '<span data-notify="title">{1}</span> ' +
                    '<span data-notify="message">{2}</span>' +
                    '<div class="progress" data-notify="progressbar">' +
                    '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                    '</div>' +
                    '<a href="{3}" target="{4}" data-notify="url"></a>' +
                    '</div>'
            });
        });

        function add_to_cart($id) {

        }
    </script>

@endpush
