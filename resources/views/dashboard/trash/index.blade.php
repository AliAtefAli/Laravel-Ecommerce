@extends('dashboard.layouts.master')

@section('page-css')
    <!-- jsgrid css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jsgrid.css') }}">

@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Trash
                            <small>Multikart Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Physical</li>
                        <li class="breadcrumb-item active">Product</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card tab2-card">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                            <li class="nav-item"><a class="nav-link active" id="top-profile-tab" data-toggle="tab"
                                                    href="#top-products" role="tab" aria-controls="top-profile"
                                                    aria-selected="true"><i data-feather="box" class="mr-2"></i>Product
                                    <span
                                        class="badge badge-pill badge-primary pull-right notification-badge data-count">{{ $products->count() }}</span>
                                </a>

                            </li>
                            <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-toggle="tab"
                                                    href="#top-categories" role="tab" aria-controls="top-contact"
                                                    aria-selected="false"><i data-feather="dollar-sign"
                                                                             class="mr-2"></i>Category
                                    <span class="badge badge-pill badge-primary pull-right notification-badge data-count">{{ $categories->count() }}</span>
                                </a>
                            </li>
                            <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-toggle="tab"
                                                    href="#top-orders" role="tab" aria-controls="top-contact"
                                                    aria-selected="false"><i data-feather="shopping-cart"
                                                                             class="mr-2"></i>Order
                                    <span class="badge badge-pill badge-primary pull-right notification-badge data-count">{{ $orders->count() }}</span>
                                </a>
                            </li>
                            <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-toggle="tab"
                                                    href="#top-orders" role="tab" aria-controls="top-contact"
                                                    aria-selected="false"><i data-feather="tag" class="mr-2"></i>Coupon
                                    <span
                                        class="badge badge-pill badge-primary pull-right notification-badge data-count">{{ $coupons->count() }}</span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="top-tabContent">
                            <div class="tab-pane fade show active" id="top-products" role="tabpanel"
                                 aria-labelledby="top-profile-tab">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div id="basicScenario" class="product-physical jsgrid"
                                             style="position: relative; height: auto; width: 100%;">
                                            <div class="jsgrid-grid-header jsgrid-header-scrollbar">
                                                <table class="jsgrid-table">
                                                    <tr class="jsgrid-header-row">
                                                        <th class="jsgrid-header-cell jsgrid-header-sortable"
                                                            style="width: 50px;">
                                                            Name
                                                        </th>
                                                        <th class="jsgrid-header-cell jsgrid-header-sortable" style="width:
                                            50px;">Coupon
                                                        </th>
                                                        <th class="jsgrid-header-cell jsgrid-header-sortable"
                                                            style="width: 50px;">
                                                            Expiration Date
                                                        </th>
                                                        <th class="jsgrid-header-cell jsgrid-header-sortable"
                                                            style="width: 50px;">
                                                            Price
                                                        </th>
                                                        <th class="jsgrid-header-cell jsgrid-header-sortable"
                                                            style="width: 50px;">
                                                            Quantity
                                                        </th>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="jsgrid-grid-body">
                                                <table class="jsgrid-table">
                                                    <tbody>
                                                    @foreach($products as $product)
                                                        <tr class="jsgrid-row" style="">
                                                            <td class="jsgrid-cell" style="width: 50px;"><a title="Show"
                                                                                                            href="{{ route('products.show', $product) }}">{{ $product->name }}</a>
                                                            </td>
                                                            <td class="jsgrid-cell" style="width: 50px;"><i
                                                                    class="fa fa-circle @if($product->coupo_id == null ) font-danger @else font-success- @endif  f-12">
                                                                </i></td>
                                                            <td class="jsgrid-cell"
                                                                style="width: 50px;">{{ Carbon\Carbon::parse( $product->expiration_date )->diffForHumans() }}
                                                            </td>
                                                            <td class="jsgrid-cell"
                                                                style="width: 50px;">{{ $product->price}}</td>
                                                            <td class="jsgrid-cell jsgrid-control-field jsgrid-align-center"
                                                                style="width: 50px;">
                                                                <a href="{{ route('trash.restore', ['id' => $product,'type'  => 'product']) }}">
                                                                    <input value="restore" type="button" title="Edit">
                                                                </a>

                                                                <a class="jsgrid-button jsgrid-delete-button"
                                                                   data-toggle="modal"
                                                                   data-original-title="Delete"
                                                                   data-target="#deleteSubCategory-{{$product->id}}"
                                                                   type="button"></a>

                                                                <div class="modal fade"
                                                                     id="deleteSubCategory-{{$product->id}}"
                                                                     tabindex="-1" role="dialog"
                                                                     aria-labelledby="exampleModalLabel"
                                                                     aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title f-w-600 text-center"
                                                                                    id="exampleModalLabel">Delete
                                                                                    Category</h5>
                                                                                <button class="close" type="button"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                    <span aria-hidden="true">×</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form class="needs-validation"
                                                                                      action="{{route('products.destroy',
                                                                                   $product) }}"
                                                                                      method="POST">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <div class="form">
                                                                                        Permanently Delete <span
                                                                                            class="text-primary">'{{ $product->name }}'</span>
                                                                                        Category ?
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <input class="btn btn-primary"
                                                                                               type="submit"
                                                                                               value="Delete">
                                                                                        <button
                                                                                            class="btn btn-secondary"
                                                                                            type="button"
                                                                                            data-dismiss="modal">
                                                                                            Close
                                                                                        </button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="top-categories" role="tabpanel"
                                 aria-labelledby="contact-top-tab">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div id="basicScenario" class="product-physical jsgrid"
                                             style="position: relative; height: auto; width: 100%;">
                                            <div class="jsgrid-grid-header jsgrid-header-scrollbar">
                                                <table class="jsgrid-table">
                                                    <tr class="jsgrid-header-row">
                                                        <th class="jsgrid-header-cell jsgrid-header-sortable"
                                                            style="width: 50px;">
                                                            Image
                                                        </th>
                                                        <th class="jsgrid-header-cell jsgrid-header-sortable"
                                                            style="width: 100px;">
                                                            Name
                                                        </th>
                                                        <th class="jsgrid-header-cell jsgrid-header-sortable"
                                                            style="width: 50px;">
                                                            Discription
                                                        </th>
                                                        <th class="jsgrid-header-cell jsgrid-control-field jsgrid-align-center"
                                                            style="width: 50px;">
                                                            <input
                                                                class="jsgrid-button jsgrid-mode-button jsgrid-insert-mode-button"
                                                                type="button" title="Switch to inserting">
                                                        </th>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="jsgrid-grid-body">
                                                <table class="jsgrid-table">
                                                    <tbody>
                                                    @foreach($categories as $category)
                                                        <tr class="jsgrid-row" style="">
                                                            <td class="jsgrid-cell jsgrid-align-center"
                                                                style="width: 50px;">
                                                                <img
                                                                    src="{{ public_path('assets/'. $category->image) }}"
                                                                    class="blur-up
                                                            lazyloaded"
                                                                    style="height: 50px; width: 50px;">
                                                            </td>
                                                            <td class="jsgrid-cell"
                                                                style="width: 100px;">{{$category->name }}</td>
                                                            <td class="jsgrid-cell"
                                                                style="width: 50px;">{{ $category->description }}</td>
                                                            <td class="jsgrid-cell jsgrid-control-field jsgrid-align-center"
                                                                style="width: 50px;">
                                                                <a href="{{ route('trash.restore', ['id' => $category, 'type' => 'category']) }}">
                                                                    <input value="restore" type="button" title="Edit">
                                                                </a>
                                                                <a class="jsgrid-button jsgrid-delete-button"
                                                                   data-toggle="modal"
                                                                   data-original-title="Delete"
                                                                   data-target="#deleteSubCategory-{{$category->id}}"
                                                                   type="button"></a>

                                                                <div class="modal fade"
                                                                     id="deleteSubCategory-{{$category->id}}"
                                                                     tabindex="-1" role="dialog"
                                                                     aria-labelledby="exampleModalLabel"
                                                                     aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title f-w-600 text-center"
                                                                                    id="exampleModalLabel">Delete
                                                                                    Category</h5>
                                                                                <button class="close" type="button"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                    <span aria-hidden="true">×</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form class="needs-validation"
                                                                                      action="{{route('trash.destroy', ['id' => $category, 'type' => 'category']) }}"
                                                                                      method="GET">
                                                                                    @csrf
                                                                                    @method('DELETE')
                                                                                    <div class="form">
                                                                                        Permanently Delete <span
                                                                                            class="text-primary">'{{ $category->name }}'</span>
                                                                                        Category ?
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <input class="btn btn-primary"
                                                                                               type="submit"
                                                                                               value="Delete">
                                                                                        <button
                                                                                            class="btn btn-secondary"
                                                                                            type="button"
                                                                                            data-dismiss="modal">
                                                                                            Close
                                                                                        </button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="top-orders" role="tabpanel"
                                 aria-labelledby="contact-top-tab">
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
                                                <td>
                                                    <a href="{{ route('order.show', $order->id) }}">#{{ $order->id }}</a>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        @foreach($order->products as $product)
                                                            <a href="{{ route('product.show', $product->id) }}"
                                                               title="Show the product">
                                                                <img
                                                                    src="{{ asset('assets/images/products/' . $product->images()->first()['path'] ) }}"
                                                                    alt=""
                                                                    class="img-fluid img-30 mr-2 blur-up lazyloaded">
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
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

@endsection


@section('script')
    <!-- Jsgrid js-->
    <script src="{{ asset('assets/js/jsgrid/jsgrid.min.js') }}"></script>
    <script src="{{ asset('assets/js/jsgrid/griddata-transactions.js') }}"></script>
    <script src="{{ asset('assets/js/jsgrid/jsgrid-transactions.js') }}"></script>

@endsection
