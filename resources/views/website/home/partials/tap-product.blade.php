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
                                                <div class="lable-wrapper">{{--<span class="lable1">new</span>--}} <span
                                                        class="lable2">{{ $product->coupon->amount }}%
                                        off</span></div>
                                            @endif
                                            <div class="front">
                                                <a href="{{ route('product.show', $product) }}">
                                                    <img
                                                        src="{{ asset("assets/images/products/" . optional($product->images->first())->path) }}"
                                                        class="img-fluid  bg-img" alt=""></a>
                                            </div>
                                            <div class="back">
                                                <a href="{{ route('product.show', $product) }}"><img
                                                        src="{{ asset("assets/images/products/" . optional($product->images->first())->path) }}"
                                                        class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                            </div>
                                            <div class="cart-detail"><a href="#" title="Add to
                                            Wishlist"><i
                                                        class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                                                                                        data-toggle="modal"
                                                                                                        data-target="#quick-view"
                                                                                                        title="Quick View"><i
                                                        class="ti-search"
                                                        aria-hidden="true"></i></a> <a href="compare.html"
                                                                                       title="Compare"><i
                                                        class="ti-reload" aria-hidden="true"></i></a></div>
                                        </div>
                                        <div class="product-info">
                                            <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star"></i>
                                            </div>
                                            <a href="product-page(no-sidebar).html">
                                                <h6>{{ $product->name }}</h6>
                                            </a>
                                            @if(isset($product->coupon->amount))
                                                <h4>${{ $product->price * ( (100 - $product->coupon->amount ) / 100 ) }}
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
                                                <a href="{{ route('cart.add', ['product' => $product])}}" class="btn
                                                btn-outline" >
                                                    <i class="ti-shopping-cart"></i> add to cart
                                                </a>
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
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="lable-block"><span class="lable3">new</span> <span
                                                            class="lable4">on sale</span></div>
                                                    <div class="front">
                                                        <a href="product-page(no-sidebar).html"><img
                                                                src=" {{ asset("assets/images/products/" . optional
                                                                ($product->images->first())->path) }}"
                                                                class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                    </div>
                                                    <div class="back">
                                                        <a href="product-page(no-sidebar).html"><img
                                                                src=" {{ asset("assets/images/products/" . optional
                                                                ($product->images->first())->path) }}"
                                                                class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                    </div>
                                                    <div class="cart-info cart-wrap">
                                                        <button data-toggle="modal" data-target="#addtocart"
                                                                title="Add to cart"><i class="ti-shopping-cart"></i>
                                                        </button>
                                                        <a
                                                            href="javascript:void(0)" title="Add to Wishlist"><i
                                                                class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                                                                                                data-toggle="modal"
                                                                                                                data-target="#quick-view"
                                                                                                                title="Quick View"><i
                                                                class="ti-search" aria-hidden="true"></i></a> <a
                                                            href="compare.html" title="Compare"><i class="ti-reload"
                                                                                                   aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div class="rating"><i class="fa fa-star"></i> <i
                                                            class="fa fa-star"></i> <i
                                                            class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                            class="fa fa-star"></i></div>
                                                    <a href="product-page(no-sidebar).html">
                                                        <h6>{{ $product->name }}</h6>
                                                    </a>
                                                    <h4>${{ $product->price }}</h4>
                                                    <ul class="color-variant">
                                                        <li class="bg-light0"></li>
                                                        <li class="bg-light1"></li>
                                                        <li class="bg-light2"></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                        <div id="tab-6" class="tab-content">
                            <div class="no-slider row">
                                <div class="product-box">
                                    <div class="img-wrapper">
                                        <div class="lable-block"><span class="lable3">new</span> <span
                                                class="lable4">on sale</span></div>
                                        <div class="front">
                                            <a href="product-page(no-sidebar).html"><img
                                                    src="../assets/images/pro3/33.jpg"
                                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                        </div>
                                        <div class="back">
                                            <a href="product-page(no-sidebar).html"><img
                                                    src="../assets/images/pro3/34.jpg"
                                                    class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                        </div>
                                        <div class="cart-info cart-wrap">
                                            <button data-toggle="modal" data-target="#addtocart"
                                                    title="Add to cart"><i class="ti-shopping-cart"></i></button>
                                            <a
                                                href="javascript:void(0)" title="Add to Wishlist"><i
                                                    class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                                                                                    data-toggle="modal"
                                                                                                    data-target="#quick-view"
                                                                                                    title="Quick View"><i
                                                    class="ti-search" aria-hidden="true"></i></a> <a
                                                href="compare.html" title="Compare"><i class="ti-reload"
                                                                                       aria-hidden="true"></i></a></div>
                                    </div>
                                    <div class="product-detail">
                                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                class="fa fa-star"></i></div>
                                        <a href="product-page(no-sidebar).html">
                                            <h6>Slim Fit Cotton Shirt</h6>
                                        </a>
                                        <h4>$500.00</h4>
                                        <ul class="color-variant">
                                            <li class="bg-light0"></li>
                                            <li class="bg-light1"></li>
                                            <li class="bg-light2"></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Tab product end -->

@push('js')
    <script>
        $('.addCart').on('click', function() {

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
