@extends('dashboard.layouts.master')

@section('page-css')
    <!-- jsgrid css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jsgrid.css') }}">

@endsection

@section('content')

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Profile
                            <small>Multikart Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Settings</li>
                        <li class="breadcrumb-item active">Profile</li>
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
                                                    href="#top-profile" role="tab" aria-controls="top-profile"
                                                    aria-selected="true"><i data-feather="user" class="mr-2"></i>Profile</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-toggle="tab"
                                                    href="#top-contact" role="tab" aria-controls="top-contact"
                                                    aria-selected="false"><i data-feather="settings" class="mr-2"></i>Contact</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="top-tabContent">
                            <div class="tab-pane fade show active" id="top-profile" role="tabpanel"
                                 aria-labelledby="top-profile-tab">
                                <div class="table-responsive profile-table">
                                    <table class="table table-responsive">
                                        <form class="needs-validation" action="{{route('setting.update')}}"
                                              method="post"
                                              enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <div class="form">
                                                @foreach(config("app.languages") as $key => $language)
                                                    <div class="form-group">
                                                        <label for="validationCustom01" class="mb-1">Site Name
                                                            in {{$language}}:</label>
                                                        <input
                                                            class="form-control @error("$key.name") is-invalid @enderror"
                                                            id="validationCustom01" type="text"
                                                            name="{{$key}}[name]"
                                                            value="{{ $setting->translate($key)->name }}">
                                                    </div>
                                                    @error("$key.name")
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                @endforeach

                                                @foreach(config("app.languages") as $key => $language)
                                                    <div class="form-group">
                                                        <label for="validationCustom01" class="mb-1">Description of Site
                                                            in {{$language}}:</label>
                                                        <input
                                                            class="form-control @error("$key.description") is-invalid @enderror"
                                                            id="validationCustom01" type="text"
                                                            name="{{$key}}[description]"
                                                            value="{{ $setting->translate($key)->description }}">
                                                    </div>
                                                    @error("$key.description")
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                @endforeach

                                                    <div class="form-group">
                                                        <label for="validationCustom01" class="mb-1">Default language: </label>
                                                        <input
                                                            class="form-control @error("default_language") is-invalid @enderror"
                                                            id="validationCustom01" type="text"
                                                            name="default_language"
                                                            value="{{ $setting->default_language }}">
                                                    </div>
                                                    @error("default_language")
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                <div class="row">
                                                <span class="btn btn-theme04 delete my-3  fileinput-button">
                                                    <i class="fa fa-photo"></i>
                                                    <span> Logo </span>
                                                    <input type="file" class="logo" name="logo">
                                                </span>
                                                    @if($errors->has('logo'))
                                                        <div
                                                            class="alert alert-danger ">{{ $errors->first('logo')}}</div>
                                                    @endif
                                                    <div class="form-group">
                                                        <img src="" class="logo-preview" width="100" alt="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                <span class="btn btn-theme04 delete my-3  fileinput-button">
                                                    <i class="fa fa-photo"></i>
                                                    <span> Icon </span>
                                                    <input type="file" class="icon" name="icon">
                                                </span>
                                                    @if($errors->has('icon'))
                                                        <div
                                                            class="alert alert-danger ">{{ $errors->first('icon')}}</div>
                                                    @endif
                                                    <div class="form-group">
                                                    <img src="" width="100" class="icon-preview" alt="">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                <span class="btn btn-theme04 delete my-3  fileinput-button">
                                                    <i class="fa fa-photo"></i>
                                                    <span> Slider </span>
                                                    <input type="file" class="slider" name="slider">
                                                </span>
                                                    @if($errors->has('slider'))
                                                        <div
                                                            class="alert alert-danger ">{{ $errors->first('slider')}}</div>
                                                    @endif

                                                    <div class="form-group">
                                                        <img src="" width="100" class="slider-preview" alt="">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input class="btn btn-primary" type="submit" value="Save">
                                                    <button class="btn btn-secondary" type="button"
                                                            data-dismiss="modal">Close
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="top-contact" role="tabpanel"
                                 aria-labelledby="contact-top-tab">
                                <div class="account-setting">
                                    <h5 class="f-w-600">Notifications</h5>
                                    <div class="row">
                                        <div class="col">
                                            <label class="d-block" for="chk-ani">
                                                <input class="checkbox_animated" id="chk-ani" type="checkbox">
                                                Allow Desktop Notifications
                                            </label>
                                            <label class="d-block" for="chk-ani1">
                                                <input class="checkbox_animated" id="chk-ani1" type="checkbox">
                                                Enable Notifications
                                            </label>
                                            <label class="d-block" for="chk-ani2">
                                                <input class="checkbox_animated" id="chk-ani2" type="checkbox">
                                                Get notification for my own activity
                                            </label>
                                            <label class="d-block mb-0" for="chk-ani3">
                                                <input class="checkbox_animated" id="chk-ani3" type="checkbox"
                                                       checked="">
                                                DND
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-setting deactivate-account">
                                    <h5 class="f-w-600">Deactivate Account</h5>
                                    <div class="row">
                                        <div class="col">
                                            <label class="d-block" for="edo-ani">
                                                <input class="radio_animated" id="edo-ani" type="radio" name="rdo-ani"
                                                       checked="">
                                                I have a privacy concern
                                            </label>
                                            <label class="d-block" for="edo-ani1">
                                                <input class="radio_animated" id="edo-ani1" type="radio" name="rdo-ani">
                                                This is temporary
                                            </label>
                                            <label class="d-block mb-0" for="edo-ani2">
                                                <input class="radio_animated" id="edo-ani2" type="radio" name="rdo-ani"
                                                       checked="">
                                                Other
                                            </label>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary">Deactivate Account</button>
                                </div>
                                <div class="account-setting deactivate-account">
                                    <h5 class="f-w-600">Delete Account</h5>
                                    <div class="row">
                                        <div class="col">
                                            <label class="d-block" for="edo-ani3">
                                                <input class="radio_animated" id="edo-ani3" type="radio" name="rdo-ani1"
                                                       checked="">
                                                No longer usable
                                            </label>
                                            <label class="d-block" for="edo-ani4">
                                                <input class="radio_animated" id="edo-ani4" type="radio"
                                                       name="rdo-ani1">
                                                Want to switch on other account
                                            </label>
                                            <label class="d-block mb-0" for="edo-ani5">
                                                <input class="radio_animated" id="edo-ani5" type="radio" name="rdo-ani1"
                                                       checked="">
                                                Other
                                            </label>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary">Delete Account</button>
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

@push('script')
    <script>
        $('.logo').change(function () {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.logo-preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        });

        // $("#imgInp").change(function() {
        //     readURL(this);
        // });

    </script>
@endpush

