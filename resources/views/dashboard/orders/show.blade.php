@extends('dashboard.layouts.master')

@section('page-css')
    <!-- Datatables css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">

    <link rel="stylesheet" href="{{asset('assets/css/pickadate/classic.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pickadate/classic.date.css')}}">
@endsection

@section('content')

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Orders
                            <small>Multikart Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Sales</li>
                        <li class="breadcrumb-item active">Orders</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="row flex-column align-items-center">
        <div class="col-md-10 align-content-center">
            <div class="card ">

                <div class="tab-content m-5" id="myTabContent">
                    <div class="tab-pane fade show active" id="invoice" role="tabpanel" aria-labelledby="invoice-tab">
                        <div class="d-sm-flex mb-5" data-view="print">
                            <span class="m-auto"></span>
                            <button class="btn btn-primary mb-sm-0 mb-3 print-invoice">{{trans('dashboard.order.Print Invoice')}}</button>
                        </div>
                        <!---===== Print Area =======-->
                        <div id="print-area">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="font-weight-bold">{{trans('dashboard.order.show order')}}</h4>
                                    <p>#{{$order->id}}</p>
                                </div>
                                <div class="col-md-6 text-sm-right">
                                    <p><strong> {{trans('dashboard.order.Order date')}} : </strong> {{$order->created_at}}</p>
                                </div>
                            </div>
                            <div class="mt-3 mb-4 border-top"></div>
                            <div class="row mb-5">
                                <div class="col-md-6 mb-3 mb-sm-0">
                                    <h5 class="font-weight-bold"> <i class="nav-icon i-Map-Marker"></i> {{trans('dashboard.order.address')}}</h5>
                                    {{--<p>New Age Inc.</p>--}}
                                    <span style="white-space: pre-line">
                                            {{$order->billing_address}}

                                            </span>
                                </div>
                                <div class="col-md-6 mb-3 mb-sm-0 pull-right">
                                    <h5 class="font-weight-bold"> <i class="nav-icon i-Telephone"></i> {{trans('dashboard.order.phone')}}</h5>
                                    {{--<p>New Age Inc.</p>--}}
                                    <span >


                                        {{$order->billing_phone}}
                                            </span>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-hover mb-4">
                                        <thead class="bg-gray-300">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col"> {{trans('dashboard.order.Product Name')}}</th>
                                            <th scope="col">  {{trans('dashboard.order.Product Price')}}</th>
                                            <th scope="col"> {{trans('dashboard.order.Quantity')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($order->products as $product)
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>{{$product->title}}</td>
                                                <td>{{$product->price}}</td>
                                                <td>{{$product->pivot->quantity}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-md-12">
                                    <div class="invoice-summary">
                                        <h5 class="font-weight-bold">  {{trans('dashboard.order.Total Price')}} : <span> &#8378; {{$order->billing_total}}</span></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--==== / Print Area =====-->
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

@endsection


@section('script')
    <script src="{{asset('assets/js/vendor/picker.js')}}"></script>
    <script src="{{asset('assets/js/vendor/picker.date.js')}}"></script>

    <script src="{{asset('assets/js/vendor/invoice.script.js')}}"></script>
@endsection

