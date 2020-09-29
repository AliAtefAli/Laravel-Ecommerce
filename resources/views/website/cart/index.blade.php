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
            <form action="{{ route('checkout.create') }}" method="GET">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table cart-table table-responsive-xs">
                            <thead>
                            <tr class="table-head">
                                <th scope="col">image
                                <th>
                                <th scope="col">product name</th>
                                <th scope="col">price</th>
                                <th scope="col">quantity</th>
                                <th scope="col">action</th>
                            </tr>
                            </thead>

                            @foreach($carts as $cart)
                                @if($cart)
                                    No
                                @endif
                                <tbody>
                                <tr>
                                    <td>
                                        <a href="#"><img
                                                src="{{ asset('assets/images/products/' . optional($cart->product->first()->images->first())->path) }}"
                                                alt=""></a>
                                    </td>
                                    <td><a href="#">{{ $cart->product->name }}</a>
                                        <div class="mobile-cart-content row">

                                            <div class="col-xs-3">
                                                <h2 class="td-color">${{ $cart->product->first()->price }}</h2>
                                            </div>
                                            <div class="col-xs-3">
                                                <h2 class="td-color"><a
                                                        class="icon"><i
                                                            class="ti-close"></i></a>
                                                </h2>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h2>${{ $cart->product->first()->price }}</h2>
                                    </td>
                                    <td>
                                        <div class="qty-box">
                                            <div class="input-group">
                                                <input type="number" name="{{$cart->id}}.quantity" class="form-control
                                            input-number"
                                                       value="1">
                                            </div>
                                        </div>
                                    </td>
                                    <td><a href="{{ route('cart.destroy', ['cart' => $cart]) }}" class="icon"><i
                                                class="fa fa-times-circle fa-2x text-danger"></i></a></td>

                                </tr>
                                </tbody>
                            @endforeach
                        </table>
                        <table class="table cart-table table-responsive-md">
                            <tfoot>
                            <tr>
                                <td>total price :</td>
                                <td>
                                    <h2>${{ $total }}</h2>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="row cart-buttons">
                    <div class="col-6"><a href="{{ route('product.index') }}" class="btn btn-solid">
                            <i class="fa fa-backward"> continue shopping</i></a></div>
                    <input type="submit" class="col-6 btn btn-solid" value="check out">
                </div>
            </form>
        </div>
    </section>
    <!--section end-->


@endsection


