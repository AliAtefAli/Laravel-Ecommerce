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
                        <h3>coupon
                            <small>Multikart Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Physical</li>
                        <li class="breadcrumb-item active">coupon</li>
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
                        <h5>coupons</h5>
                        <div class="btn-popup pull-right">
                            <div class="btn-popup pull-right">
                                <a href="{{ route('coupon.create') }}" class="btn btn-primary">Add
                                    coupon</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
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
                                        @foreach($coupons as $coupon)
                                            <tr class="jsgrid-row" style="">
                                                <td class="jsgrid-cell" style="width: 50px;"><a title="Show"
                                                                                                href="{{ route('coupon.show', $coupon) }}">{{ $coupon->title }}</a>
                                                </td>
                                                <td class="jsgrid-cell" style="width: 50px;"><i class="fa fa-circle @if($coupon->coupo_id
                                                == null ) font-danger @else font-success- @endif  f-12"> </i></td>
                                                <td class="jsgrid-cell" style="width: 50px;">{{
                                                Carbon\Carbon::parse( $coupon->start_date )->diffForHumans() }}
                                                </td>
                                                <td class="jsgrid-cell" style="width: 50px;">{{ $coupon->end_date}}</td>
{{--                                                <td class="jsgrid-cell jsgrid-control-field jsgrid-align-center"--}}
{{--                                                    style="width: 50px;">--}}
{{--                                                    <a href="{{ route('products.edit', $coupon) }}"><input class="jsgrid-button--}}
{{--                                                    jsgrid-edit-button" type="button" title="Edit"></a>--}}

{{--                                                    <a class="jsgrid-button jsgrid-delete-button" data-toggle="modal"--}}
{{--                                                       data-original-title="Delete" data-target="#deleteSubCategory-{{$coupon->id}}"--}}
{{--                                                       type="button"></a>--}}

{{--                                                    <div class="modal fade" id="deleteSubCategory-{{$coupon->id}}"--}}
{{--                                                         tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"--}}
{{--                                                         aria-hidden="true">--}}
{{--                                                        <div class="modal-dialog" role="document">--}}
{{--                                                            <div class="modal-content">--}}
{{--                                                                <div class="modal-header">--}}
{{--                                                                    <h5 class="modal-title f-w-600 text-center"--}}
{{--                                                                        id="exampleModalLabel">Delete Category</h5>--}}
{{--                                                                    <button class="close" type="button"--}}
{{--                                                                            data-dismiss="modal" aria-label="Close">--}}
{{--                                                                        <span aria-hidden="true">×</span></button>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="modal-body">--}}
{{--                                                                    <form class="needs-validation"--}}
{{--                                                                          action="{{route('products.destroy',--}}
{{--                                                                                   $coupon) }}"--}}
{{--                                                                          method="POST">--}}
{{--                                                                        @csrf--}}
{{--                                                                        @method('DELETE')--}}
{{--                                                                        <div class="form">--}}
{{--                                                                            Delete <span class="text-primary">'{{ $coupon->name }}'</span> coupon ?--}}
{{--                                                                        </div>--}}
{{--                                                                        <div class="modal-footer">--}}
{{--                                                                            <input class="btn btn-primary"--}}
{{--                                                                                   type="submit" value="Delete">--}}
{{--                                                                            <button class="btn btn-secondary"--}}
{{--                                                                                    type="button" data-dismiss="modal">--}}
{{--                                                                                Close--}}
{{--                                                                            </button>--}}
{{--                                                                        </div>--}}
{{--                                                                    </form>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </td>--}}
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


@section('script')
    <!-- Jsgrid js-->
    <script src="{{ asset('assets/js/jsgrid/jsgrid.min.js') }}"></script>
    <script src="{{ asset('assets/js/jsgrid/griddata-transactions.js') }}"></script>
    <script src="{{ asset('assets/js/jsgrid/jsgrid-transactions.js') }}"></script>

@endsection
