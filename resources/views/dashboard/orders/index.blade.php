@extends('dashboard.layouts.master')

@section('page-css')
    <!-- Datatables css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Manage Order</h5>
                    </div>
                    <div class="card-body order-datatable">
                        <table class="display" id="basic-1">
                            <thead>
                            <tr>
                                <th>Order Id</th>
                                <th>Product</th>
                                <th>Payment Status</th>
                                <th>Payment Method</th>
                                <th>Order Status</th>
                                <th>Date</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td><a href="{{ route('order.show', $order->id) }}">#{{ $order->id }}</a></td>
                                    <td>
                                        <div class="d-flex">
                                            @foreach($order->products as $product)
                                                <a href="{{ route('product.show', $product->id) }}"
                                                   title="Show the product">
                                                    <img
                                                        src="{{ asset('assets/images/products/' . $product->images()->first()['path'] ) }}"
                                                        alt="" class="img-fluid img-30 mr-2 blur-up lazyloaded">
                                                </a>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td><span class="badge badge-secondary">
                                        @if($order->payment_method === 'on_delivery') Cash On Delivery @else
                                                Payment @endif
                                    </span></td>
                                    <td>Paypal</td>
                                    <td><span class="badge badge-success">Delivered</span></td>
                                    <td>{{ $order->created_at->diffForHumans() }}</td>
                                    <td>$54671</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

@endsection


@section('js')
    <!-- Datatable js-->
    <script src="{{ asset('assets/js/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables/custom-basic.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('123229ac640738f44cc3', {
            cluster: 'eu'
        });
    </script>

    <script src="{{ asset('assets/js/order-notification.js') }}"></script>
@endsection

