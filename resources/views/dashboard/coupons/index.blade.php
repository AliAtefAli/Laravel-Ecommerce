@extends('dashboard.layouts.master')

@section('page-css')
    <!-- jsgrid css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jsgrid.css') }}">

@endsection

@section('content')

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Products Category</h5>
                    </div>
                    <div class="card-body">
                        <div id="batchDelete" class="category-table order-table jsgrid"
                             style="position: relative; height: auto; width: 100%;">
                            <div class="jsgrid-grid-header jsgrid-header-scrollbar">
                                <table class="jsgrid-table">
                                    <tr class="jsgrid-header-row">
                                        <th class="jsgrid-header-cell jsgrid-align-center" style="width: 100px;">
                                            <button type="button" class="btn btn-danger btn-sm btn-delete mb-0 b-r-4">
                                                Delete
                                            </button>
                                        </th>
                                        <th class="jsgrid-header-cell" style="width: 150px;">Title</th>
                                        <th class="jsgrid-header-cell jsgrid-align-right" style="width: 100px;">Code
                                        </th>
                                        <th class="jsgrid-header-cell jsgrid-align-right" style="width: 100px;">
                                            Discount
                                        </th>
                                        <th class="jsgrid-header-cell" style="width: 100px;">Status</th>
                                    </tr>
                                    <tr class="jsgrid-filter-row" style="display: none;">
                                        <td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"></td>
                                        <td class="jsgrid-cell" style="width: 150px;"><input type="text"></td>
                                        <td class="jsgrid-cell jsgrid-align-right" style="width: 100px;"><input
                                                type="number"></td>
                                        <td class="jsgrid-cell jsgrid-align-right" style="width: 100px;"><input
                                                type="number"></td>
                                        <td class="jsgrid-cell" style="width: 100px;"><input type="text"></td>
                                    </tr>
                                    <tr class="jsgrid-insert-row" style="display: none;">
                                        <td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"></td>
                                        <td class="jsgrid-cell" style="width: 150px;"><input type="text"></td>
                                        <td class="jsgrid-cell jsgrid-align-right" style="width: 100px;"><input
                                                type="number"></td>
                                        <td class="jsgrid-cell jsgrid-align-right" style="width: 100px;"><input
                                                type="number"></td>
                                        <td class="jsgrid-cell" style="width: 100px;"><input type="text"></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="jsgrid-grid-body">
                                <table class="jsgrid-table">
                                    <tbody>
                                    <tr class="jsgrid-row">
                                        <td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input
                                                type="checkbox"></td>
                                        <td class="jsgrid-cell" style="width: 150px;"> 10% Off</td>
                                        <td class="jsgrid-cell jsgrid-align-right" style="width: 100px;"> Percent10</td>
                                        <td class="jsgrid-cell jsgrid-align-right" style="width: 100px;"> 10%</td>
                                        <td class="jsgrid-cell" style="width: 100px;"><i
                                                class="fa fa-circle font-success f-12"></i></td>
                                    </tr>
                                    <tr class="jsgrid-alt-row">
                                        <td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input
                                                type="checkbox"></td>
                                        <td class="jsgrid-cell" style="width: 150px;"> 25% Off</td>
                                        <td class="jsgrid-cell jsgrid-align-right" style="width: 100px;"> Percent25</td>
                                        <td class="jsgrid-cell jsgrid-align-right" style="width: 100px;"> 25%</td>
                                        <td class="jsgrid-cell" style="width: 100px;"><i
                                                class="fa fa-circle font-warning f-12"></i></td>
                                    </tr>
                                    <tr class="jsgrid-row">
                                        <td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input
                                                type="checkbox"></td>
                                        <td class="jsgrid-cell" style="width: 150px;"> 5% Off</td>
                                        <td class="jsgrid-cell jsgrid-align-right" style="width: 100px;"> Percent5</td>
                                        <td class="jsgrid-cell jsgrid-align-right" style="width: 100px;"> 5%</td>
                                        <td class="jsgrid-cell" style="width: 100px;"><i
                                                class="fa fa-circle font-success f-12"></i></td>
                                    </tr>
                                    <tr class="jsgrid-alt-row">
                                        <td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input
                                                type="checkbox"></td>
                                        <td class="jsgrid-cell" style="width: 150px;"> 2% Off</td>
                                        <td class="jsgrid-cell jsgrid-align-right" style="width: 100px;"> Percent2</td>
                                        <td class="jsgrid-cell jsgrid-align-right" style="width: 100px;"> 2%</td>
                                        <td class="jsgrid-cell" style="width: 100px;"><i
                                                class="fa fa-circle font-warning f-12"></i></td>
                                    </tr>
                                    <tr class="jsgrid-row">
                                        <td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input
                                                type="checkbox"></td>
                                        <td class="jsgrid-cell" style="width: 150px;"> 50% Off</td>
                                        <td class="jsgrid-cell jsgrid-align-right" style="width: 100px;"> Percent50</td>
                                        <td class="jsgrid-cell jsgrid-align-right" style="width: 100px;"> 50%</td>
                                        <td class="jsgrid-cell" style="width: 100px;"><i
                                                class="fa fa-circle font-danger f-12"></i></td>
                                    </tr>
                                    <tr class="jsgrid-alt-row">
                                        <td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input
                                                type="checkbox"></td>
                                        <td class="jsgrid-cell" style="width: 150px;"> 70% Off</td>
                                        <td class="jsgrid-cell jsgrid-align-right" style="width: 100px;"> Percent70</td>
                                        <td class="jsgrid-cell jsgrid-align-right" style="width: 100px;"> 70%</td>
                                        <td class="jsgrid-cell" style="width: 100px;"><i
                                                class="fa fa-circle font-success f-12"></i></td>
                                    </tr>
                                    <tr class="jsgrid-row">
                                        <td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input
                                                type="checkbox"></td>
                                        <td class="jsgrid-cell" style="width: 150px;"> 75% Off</td>
                                        <td class="jsgrid-cell jsgrid-align-right" style="width: 100px;"> Percent75</td>
                                        <td class="jsgrid-cell jsgrid-align-right" style="width: 100px;"> 75%</td>
                                        <td class="jsgrid-cell" style="width: 100px;"><i
                                                class="fa fa-circle font-danger f-12"></i></td>
                                    </tr>
                                    <tr class="jsgrid-alt-row">
                                        <td class="jsgrid-cell jsgrid-align-center" style="width: 100px;"><input
                                                type="checkbox"></td>
                                        <td class="jsgrid-cell" style="width: 150px;"> 80% Off</td>
                                        <td class="jsgrid-cell jsgrid-align-right" style="width: 100px;"> Percent80</td>
                                        <td class="jsgrid-cell jsgrid-align-right" style="width: 100px;"> 80%</td>
                                        <td class="jsgrid-cell" style="width: 100px;"><i
                                                class="fa fa-circle font-success f-12"></i></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="jsgrid-pager-container" style="display: none;">
                                <div class="jsgrid-pager">Pages: <span
                                        class="jsgrid-pager-nav-button jsgrid-pager-nav-inactive-button"><a
                                            href="javascript:void(0);">First</a></span> <span
                                        class="jsgrid-pager-nav-button jsgrid-pager-nav-inactive-button"><a
                                            href="javascript:void(0);">Prev</a></span> <span
                                        class="jsgrid-pager-page jsgrid-pager-current-page">1</span> <span
                                        class="jsgrid-pager-nav-button jsgrid-pager-nav-inactive-button"><a
                                            href="javascript:void(0);">Next</a></span> <span
                                        class="jsgrid-pager-nav-button jsgrid-pager-nav-inactive-button"><a
                                            href="javascript:void(0);">Last</a></span> &nbsp;&nbsp; 1 of 1
                                </div>
                            </div>
                            <div class="jsgrid-load-shader"
                                 style="display: none; position: absolute; top: 0px; right: 0px; bottom: 0px; left: 0px; z-index: 1000;"></div>
                            <div class="jsgrid-load-panel"
                                 style="display: none; position: absolute; top: 50%; left: 50%; z-index: 1000;">Please,
                                wait...
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

