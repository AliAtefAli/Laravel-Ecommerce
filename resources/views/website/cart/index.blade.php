@extends('website.layouts.master')

@section('content')

    @if($errors->any)
        @foreach($errors->all() as $error)
            <div class="alert">{{ $error }}</div>
        @endforeach
    @endif

    <!--section start-->
    <section class="cart-section section-b-space">
        <div class="container">
            {{--            <form action="{{ route('checkout.store') }}" method="POST">--}}
            {{--                @csrf--}}
            <div class="row">
                <div class="col-sm-12">
                    <table class="table cart-table table-responsive-xs">
                        <thead>
                        @if($carts->count() > 0)
                            <tr class="table-head">
                                <th scope="col">image</th>
                                <th scope="col">product name</th>
                                <th scope="col">price</th>
                                <th scope="col">quantity</th>
                                <th scope="col">action</th>
                            </tr>
                        @else
                            <div class="p-3 mb-5" style="background-color: var(--theme-deafult);">
                                <h3 class="text-white">Shopping cart is currently empty</h3>
                                <p class="text-white">Add items to your cart and view them here before you checkout.
                                    Continue shopping!</p>
                            </div>
                        @endif
                        </thead>

                        @foreach($carts as $cart)
                            <tbody>
                            <tr>
                                <td>
                                    <a href="#"><img
                                            src="{{ asset('assets/images/products/' . $cart->model->images()->first()['path'] ) }}"
                                            alt=""></a>
                                </td>
                                <td><a href="#">{{ $cart->name }}</a>
                                    <div class="mobile-cart-content row">
                                        <div class="col-xs-3">
                                            <h2 class="td-color">${{ $cart->price }}</h2>
                                        </div>
                                        <div class="col-xs-3">
                                            <h2 class="td-color"><a
                                                    class="icon"><i class="ti-close"></i></a>
                                            </h2>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h2>${{ $cart->price * $cart->qty}}</h2>
                                </td>
                                <td>
                                    <div class="qty-box">
                                        <div class="input-group"><span class="input-group-prepend"><button
                                                    type="button"
                                                    class="btn quantity-left-minus"
                                                    data-type="minus"
                                                    data-field=""><i
                                                        class="ti-angle-left"></i></button> </span>
                                            <input type="text" name="quantity" class="form-control input-number"
                                                   value="{{ $cart->qty }}">
                                            <span class="input-group-prepend"><button type="button"
                                                                                      class="btn quantity-right-plus"
                                                                                      data-type="plus"
                                                                                      data-field=""><i
                                                        class="ti-angle-right"></i></button></span></div>
                                    </div>

                                </td>
                                <td><a href="{{ route('cart.destroy', ['row' => $cart->rowId]) }}" class="icon"><i
                                            class="fa fa-times-circle fa-2x text-danger"></i></a></td>

                            </tr>
                            </tbody>
                        @endforeach
                    </table>
                    <table class="table cart-table table-responsive-md">
                        @if($carts->count() > 0)
                            <tfoot>
                            <tr>
                                <td>total price :</td>
                                <td>
                                    <h2>${{ Cart::total() }}</h2>
                                </td>
                            </tr>
                            </tfoot>
                        @endif
                    </table>
                </div>
            </div>
            <div class="row cart-buttons">
                <div class="col-6"><a href="{{ route('product.index') }}" class="btn btn-solid">
                        <i class="fa fa-backward"> continue shopping</i></a></div>
                @if($carts->count() > 0)
                    <a href="{{ route('checkout.index') }}" class="col-6 btn btn-solid">Check out</a>
                @endif
            </div>
            {{--            </form>--}}
        </div>
    </section>
    <!--section end-->


@endsection

@push('js')
    <script>

        // $('.quantity-plus').on('click', function () {
        // var val = parseInt($(this).prev('input').val());
        //
        // console.log(val);
        //
        // $(this).prev('input').val(val + 1).change();
        // return false;
        // });
        //
        // $('.quantity-minus').on('click', function () {
        // var val = parseInt($(this).next('input').val());
        // if (val !== 1) {
        // $(this).next('input').val(val - 1).change();
        // }
        // return false;
        // });
        /*=====================
             10. Add to cart quantity Counter
             ==========================*/
        $("button.add-button").click(function () {
            $(this).next().addClass("open");
            $(".qty-input").val('1');
        });
        $('.quantity-right-plus').on('click', function () {
            var $qty = $(this).siblings(".qty-input");
            var currentVal = parseInt($qty.val());

            if (!isNaN(currentVal)) {
                $qty.val(currentVal + 1);
            }
        });
        $('.quantity-left-minus').on('click', function () {
            var $qty = $(this).siblings(".qty-input");
            var _val = $($qty).val();
            if (_val == '1') {
                var _removeCls = $(this).parents('.cart_qty');
                $(_removeCls).removeClass("open");
            }
            var currentVal = parseInt($qty.val());
            if (!isNaN(currentVal) && currentVal > 0) {
                $qty.val(currentVal - 1);
            }
        });


        /*=====================
         11. Product page Quantity Counter
         ==========================*/
        $('.collection-wrapper .qty-box .quantity-right-plus').on('click', function () {
            console.log('Hello');
            // var $qty = $('.qty-box .input-number');
            // var currentVal = parseInt($qty.val(), 10);
            // if (!isNaN(currentVal)) {
            //     $qty.val(currentVal + 1);
            // }
        });
        $('.collection-wrapper .qty-box .quantity-left-minus').on('click', function () {
            var $qty = $('.qty-box .input-number');
            var currentVal = parseInt($qty.val(), 10);
            if (!isNaN(currentVal) && currentVal > 1) {
                $qty.val(currentVal - 1);
            }
        });


    </script>
    {{--$('.product-box button .ti-shopping-cart').on('click', function() {--}}
    {{--$.notify({--}}
    {{--icon: 'fa fa-check',--}}
    {{--title: 'Success!',--}}
    {{--message: 'Item Successfully added to your cart'--}}
    {{--}, {--}}
    {{--element: 'body',--}}
    {{--position: null,--}}
    {{--type: "success",--}}
    {{--allow_dismiss: true,--}}
    {{--newest_on_top: false,--}}
    {{--showProgressbar: true,--}}
    {{--placement: {--}}
    {{--from: "top",--}}
    {{--align: "right"--}}
    {{--},--}}
    {{--offset: 20,--}}
    {{--spacing: 10,--}}
    {{--z_index: 1031,--}}
    {{--delay: 5000,--}}
    {{--animate: {--}}
    {{--enter: 'animated fadeInDown',--}}
    {{--exit: 'animated fadeOutUp'--}}
    {{--},--}}
    {{--icon_type: 'class',--}}
    {{--template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +--}}
    {{--    '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +--}}
    {{--    '<span data-notify="icon"></span> ' +--}}
    {{--    '<span data-notify="title">{1}</span> ' +--}}
    {{--    '<span data-notify="message">{2}</span>' +--}}
    {{--    '<div class="progress" data-notify="progressbar">' +--}}
    {{--        '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +--}}
    {{--        '</div>' +--}}
    {{--    '<a href="{3}" target="{4}" data-notify="url"></a>' +--}}
    {{--    '</div>'--}}
    {{--});--}}
    {{--});--}}
    {{--</script>--}}

@endpush
