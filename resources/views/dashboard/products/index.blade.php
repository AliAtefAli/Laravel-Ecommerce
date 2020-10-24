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
                        <h3>Product
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

    @foreach($products as $product)
        {{--        <div class="alert">{{ $product->name }}</div>--}}
        @foreach($product->images() as $image)
            @dd($image)
            <div class="alert">{{ $image->path }}</div>
        @endforeach
    @endforeach
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Products</h5>
                    </div>
                    <div class="card-body">
                        <div class="btn-popup pull-right">
                            <div class="btn-popup pull-right">
                                <a href="{{ route('products.create') }}" class="btn btn-primary">Add
                                    Product</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <div id="basicScenario" class="product-physical jsgrid"
                                 style="position: relative; height: auto; width: 100%;">
                                <div class="jsgrid-grid-header jsgrid-header-scrollbar">
                                    <table class="jsgrid-table">
                                        <tr class="jsgrid-header-row">
                                            <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 50px;">
                                                Name
                                            </th>
                                            <th class="jsgrid-header-cell jsgrid-header-sortable" style="width:
                                            50px;">Coupon
                                            </th>
                                            <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 50px;">
                                                Expiration Date
                                            </th>
                                            <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 50px;">
                                                Price
                                            </th>
                                            <th class="jsgrid-header-cell jsgrid-header-sortable" style="width: 50px;">
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
                                                <td class="jsgrid-cell" style="width: 50px;"><i class="fa fa-circle @if($product->coupo_id
                                                == null ) font-danger @else font-success- @endif  f-12"> </i></td>
                                                <td class="jsgrid-cell" style="width: 50px;">{{
                                                Carbon\Carbon::parse( $product->expiration_date )->diffForHumans() }}
                                                </td>
                                                <td class="jsgrid-cell" style="width: 50px;">{{ $product->price}}</td>
                                                <td class="jsgrid-cell jsgrid-control-field jsgrid-align-center"
                                                    style="width: 50px;">
                                                    <a href="{{ route('products.edit', $product) }}"><input class="jsgrid-button
                                                    jsgrid-edit-button" type="button" title="Edit"></a>

                                                    <form action="{{ route('products.destroy', $product) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button>Delete</button>
                                                    </form>
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
            </div>
        </div>
        <!-- Container-fluid Ends-->

    </div>

    <!-- footer start-->

@endsection


@section('js')
    <!-- Jsgrid js-->
    <script src="{{ asset('assets/js/jsgrid/jsgrid.min.js') }}"></script>
    <script src="{{ asset('assets/js/jsgrid/griddata-transactions.js') }}"></script>
    <script src="{{ asset('assets/js/jsgrid/jsgrid-transactions.js') }}"></script>

@endsection
