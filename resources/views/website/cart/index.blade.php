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
                            <tbody id="data-{{$cart->id}}">
                            <tr id="ddddd">
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
                                    <h2 id="price-{{$cart->id}}">${{ $cart->price * $cart->qty}}</h2>
                                </td>
                                <td>
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <button id="quantity-left-minus-{{$cart->id}}" type="button"
                                                        class="btn quantity-left-minus" data-type="minus"
                                                        data-field="">
                                                    <i class="ti-angle-left"></i>
                                                </button>
                                            </span>

                                            <input id="qty-{{$cart->id}}" cart-id="{{ $cart->id }}"
                                                   row-id="{{ $cart->rowId }}" type="text"
                                                   name="quantity.{{$cart->id}}"
                                                   class="form-control input-number qty-input" value="{{ $cart->qty }}">

                                            <span class="input-group-prepend">
                                                <button id="quantity-right-plus-{{$cart->id}}" type="button"
                                                        class="btn quantity-right-plus" data-type="plus"
                                                        data-field="">
                                                    <i class="ti-angle-right"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a id="remove-{{$cart->id}}" href="" title="Remove" class="icon">
                                        <i class="fa fa-times-circle fa-2x text-danger"></i>
                                    </a>
                                </td>

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
                                    <h2 id="total">${{ Cart::total() }}</h2>
                                </td>
                            </tr>
                            </tfoot>
                        @endif
                    </table>
                </div>
            </div>
            <div class="row cart-buttons">
                <div class="col-6">
                    <a href="{{ route('product.index') }}" class="btn btn-solid"><i class="fa fa-backward"> continue shopping</i></a>
                </div>
                @if($carts->count() > 0)
                    <div class="col-6">
                        <a href="{{ route('checkout.index') }}" class="btn btn-outline">Check out</a>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!--section end-->

@endsection

@include('website.cart.change-quantity')
@include('website.cart.remove-item')

