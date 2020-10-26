@extends('dashboard.layouts.master')
@section('title')
    {{ trans("dashboard.Category") }}
@endsection
@section('page-css')
    <!-- jsgrid css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jsgrid.css') }}">
    <!-- Dropzone css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dropzone.css')}}">
    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
    <link rel="stylesheet" href="{{ asset("assets/css/file-upload/jquery.fileupload.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/file-upload/jquery.fileupload.ui.css") }}">



@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Category
                            <small>Multikart Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Physical</li>
                        <li class="breadcrumb-item active">Category</li>
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
                        <h5>Category</h5>
                        <div class="btn-popup pull-right">
                            <a href="{{ route('category.create') }}" class="btn btn-primary">Add Category</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" action="{{route('category.store')}}" method="post"
                              enctype="multipart/form-data">
                            <div class="form">
                                @csrf
                                @foreach(config("app.languages") as $key => $language)
                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1">Category Name in {{$language}}:</label>
                                        <input class="form-control @error("$key.name") is-invalid @enderror"
                                               id="validationCustom01" type="text"
                                               name="{{$key}}[name]" value="{{ old("$key.name") }}">
                                    </div>
                                    @error("$key.name")
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                @endforeach

                                @foreach(config("app.languages") as $key => $language)
                                    <div class="form-group">
                                        <label for="validationCustom01" class="mb-1">Description in {{$language}}:</label>
                                        <input class="form-control @error("$key.description") is-invalid @enderror"
                                               id="validationCustom01" type="text"
                                               name="{{$key}}[description]" value="{{ old("$key.description") }}">
                                    </div>
                                    @error("$key.description")
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                @endforeach


                                <span class="btn btn-theme04 delete my-3  fileinput-button">
                                    <i class="fa fa-photo"></i>
                                    <span> {{ trans('dashboard.Image')}} </span>
                                  <input type="file" name="image">
                                </span>
                                @if($errors->has('image'))
                                    <div class="alert alert-danger ">{{ $errors->first('image')}}</div>
                                @endif

                                <div class="modal-footer">
                                    <input class="btn btn-primary" type="submit" value="Save">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>
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
