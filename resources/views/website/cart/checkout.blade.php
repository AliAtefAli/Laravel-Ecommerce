@extends('website.layouts.master')

@section('content')

    <!-- section start -->
    <section class="section-b-space">
        <div class="container">
            <div class="checkout-page">
                <div class="checkout-form">
                    <form>
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-details">
                                <div class="order-box">
                                    <div class="title-box">
                                        <div>Product <span>Total</span></div>
                                    </div>
                                    <ul class="qty">
                                        <li>Pink Slim Shirt × 1 <span>$25.10</span></li>
                                        <li>SLim Fit Jeans × 1 <span>$555.00</span></li>
                                    </ul>

                                    <ul class="total">
                                        <li>Total <span class="count">$620.00</span></li>
                                    </ul>
                                </div>
                                <div class="payment-box">
                                    <div class="upper-box">
                                        <div class="payment-options">
                                            <ul>
                                                <li>
                                                    <div class="radio-option">
                                                        <input type="radio" name="payment-group" id="payment-1"
                                                               checked="checked">
                                                        <label for="payment-1">Check Payments<span
                                                                class="small-text">Please send a check to Store
                                                                    Name, Store Street, Store Town, Store State /
                                                                    County, Store Postcode.</span></label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="radio-option">
                                                        <input type="radio" name="payment-group" id="payment-2">
                                                        <label for="payment-2">Cash On Delivery<span
                                                                class="small-text">Please send a check to Store
                                                                    Name, Store Street, Store Town, Store State /
                                                                    County, Store Postcode.</span></label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="radio-option paypal">
                                                        <input type="radio" name="payment-group" id="payment-3">
                                                        <label for="payment-3">PayPal<span class="image"><img
                                                                    src="../assets/images/paypal.png"
                                                                    alt=""></span></label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="text-right"><a href="#" class="btn-solid btn">Place Order</a></div>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
        </div>
    </section>
    <!-- section end -->
@endsection


