@extends('dashboard.layouts.master')

@section('style')
    <!-- Datepicker css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/date-picker.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


@endsection

@section('content')

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Create Coupon
                            <small>Multikart Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Coupons</li>
                        <li class="breadcrumb-item active">Create Coupon</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="card tab2-card">
            <div class="card-header">
                <h5>Discount Coupon Details</h5>
            </div>
            <div class="card-body">
                <form action="{{route('coupon.store')}} " method="POST">
                    @csrf
                    <div class="tab-content" id="myTabContent">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label for="validationCustom0" class="col-xl-3 col-md-4"><span>*</span>
                                        Coupon Title</label>
                                    <input name="title" class="form-control col-md-7" id="validationCustom0" type="text"
                                           required="">
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom1" class="col-xl-3 col-md-4"><span>*</span>Coupon
                                        Code</label>
                                    <input name="code" class="form-control col-md-7" id="validationCustom1" type="text"
                                           required="">
                                    <div class="valid-feedback">Please Provide a Valid Coupon Code.</div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-md-4">Product</label>
                                    <select name="product_id" class="custom-select col-md-7" required="">
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom9" class="col-xl-3 col-md-4">Amount</label>
                                    <input name="amount" class="form-control col-md-7" id="validationCustom9" type="text"
                                           required="">
                                    <div class="valid-feedback">Please Provide a Valid Coupon Code.</div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-md-4">Start Date</label>
                                    <input name="start_date" id="start_date"
                                           class="datepicker-here form-control digits col-md-7" type="text"
                                           data-language="en">
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-md-4">End Date</label>
                                    <input name="end_date" id="end_date"
                                           class="datepicker-here form-control digits col-md-7" type="text"
                                           data-language="en">
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-md-4">Discount Type</label>
                                    <select name="discount_type" class="custom-select col-md-7" required="">
                                        <option value="">--Select--</option>
                                        <option value="1">Percent</option>
                                        <option value="2">Fixed</option>
                                        <option value="3">Free Shipping</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-md-4">Status</label>
                                    <div class="checkbox checkbox-primary col-md-7">
                                        <input name="status" id="checkbox-primary-2" type="checkbox"
                                               data-original-title=""
                                               title="">
                                        <label for="checkbox-primary-2">Enable the Coupon</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom4" class="col-xl-3 col-md-4">Minimum Spend</label>
                                    <input name="min_spend" class="form-control col-md-7" id="validationCustom4"
                                           type="number">
                                </div>
                                <div class="form-group row">
                                    <label for="validationCustom5" class="col-xl-3 col-md-4">Maximum Spend</label>
                                    <input name="max_spend" class="form-control col-md-7" id="validationCustom5"
                                           type="number">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pull-right">
                        <input type="submit" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection


@section('js')

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>

        flatpickr("#start_date");
        flatpickr("#end_date");

    </script>

@endsection

