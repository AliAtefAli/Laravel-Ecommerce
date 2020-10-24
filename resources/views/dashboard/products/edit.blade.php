@extends('dashboard.layouts.master')

@section('page-css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('content')


    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Add Products
                            <small>Multikart Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Physical</li>
                        <li class="breadcrumb-item active">Add Product</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card tab2-card">
                    <div class="card-header">
                        <h5> Add User</h5>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                        @endif
                        <form class="needs-validation add-product-form"
                              action="{{ route('products.update', $product) }}"
                              method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form">
                                <div class="form">
                                    @foreach(config('app.languages') as $key => $language)
                                        <div class="form-group mb-3 row">
                                            <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Name in
                                                {{ $language }}:</label>
                                            <input class="form-control col-xl-8 col-sm-7" id="validationCustom01"
                                                   name="{{$key}}[name]" type="text"  value="{{
                                                   $product->translate($key)->name }}">
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                    @endforeach

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-sm-4">Description in Arabic :</label>
                                        <div class="col-xl-8 col-sm-7 pl-0 description-sm">
                                                    <textarea id="editor3" name="ar[description]" cols="10"
                                                              rows="4">value="{{
                                                   $product->translate('ar')->description }}"</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-sm-4">Description in English :</label>
                                        <div class="col-xl-8 col-sm-7 pl-0 description-sm">
                                                    <textarea id="editor3" name="en[description]" cols="10"
                                                              rows="4">value="{{
                                                   $product->translate('en')->description }}"</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3 row">
                                        <label for="validationCustom02" class="col-xl-3 col-sm-4 mb-0">Price
                                            :</label>
                                        <input class="form-control col-xl-8 col-sm-7" name="price"
                                               id="validationCustom02" type="number" name="price"  value="{{
                                                   $product->price }}">
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>

                                    <div class="form-group row" id="ref">
                                        <label for="exampleFormControlSelect1" class="col-xl-3 col-sm-4 mb-0">Category
                                            :</label>
                                        <select name="category_id" class="form-control digits col-xl-8 col-sm-7"
                                                id="exampleFormControlSelect1">
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-sm-4 mb-0">Total Products :</label>
                                        <fieldset class="qty-box col-xl-9 col-xl-8 col-sm-7 pl-0">
                                            <div class="input-group">
                                                <input class="touchspin" name="quantity" type="text" value="{{
                                                   $product->quantity }}">
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-sm-4 mb-0">Production date :</label>

                                        <input class="flatpickr flatpickr-input active" id="production_date" name="production_date"
                                               type="text"
                                               placeholder="Select Date.." readonly="readonly" value="{{
                                                   $product->production_date }}">

                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-sm-4 mb-0">Expiration date :</label>

                                        <input class="flatpickr flatpickr-input active" id="expiration_date" name="expiration_date"
                                               type="text"
                                               placeholder="Select Date.." readonly="readonly" value="{{
                                                   $product->expiration_date }}">

                                    </div>

                                </div>

                                <div class="form-group row">
                                <span class="btn btn-success fileinput-button">
                                    <i class="fa fa-photo"></i>
                                    <span>Add files...</span>
                                      <input type="file" name="images[]" multiple="">
                                  </span>
                                </div>

                                <div class="offset-xl-3 offset-sm-4">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('js')
    <!-- touchspin js-->
    <script src="../assets/js/touchspin/vendors.min.js"></script>
    <script src="../assets/js/touchspin/touchspin.js"></script>
    <script src="../assets/js/touchspin/input-groups.min.js"></script>

    <!-- form validation js-->
    <script src="../assets/js/dashboard/form-validation-custom.js"></script>

    <!-- ckeditor js-->
    <script src="../assets/js/editor/ckeditor/ckeditor.js"></script>
    <script src="../assets/js/editor/ckeditor/styles.js"></script>
    <script src="../assets/js/editor/ckeditor/adapters/jquery.js"></script>
    <script src="../assets/js/editor/ckeditor/ckeditor.custom.js"></script>

    <!-- Zoom js-->
    <script src="../assets/js/jquery.elevatezoom.js"></script>
    <script src="../assets/js/zoom-scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script !src="">
        // Default ckeditor
        CKEDITOR.replace('editor3', {
            on: {
                contentDom: function (evt) {
                    // Allow custom context menu only with table elemnts.
                    evt.editor.editable().on('contextmenu', function (contextEvent) {
                        var path = evt.editor.elementPath();

                        if (!path.contains('table')) {
                            contextEvent.cancel();
                        }
                    }, null, null, 5);
                }
            }
        });
        flatpickr('#production_date');
        flatpickr('#expiration_date');

    </script>
@endsection

