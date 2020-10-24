<div class="card mb-5">
    <div class="card-header bg-transparent">
        <h3 class="card-title"> {{trans('dashboard.settings.Website Logo & Fav Icon')}}</h3>
    </div>

    <div class="card-body">
        <form action="{{--{{ route("settings.update",['lang' => app()->getLocale()]) }}"--}} method="post" enctype="multipart/form-data">
            @csrf
            @method("put")



            <div class="form-group row">
                <input type="file" name="settings[site_logo]" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" >
                <label class="custom-file-label" for="inputGroupFile01"> {{trans('dashboard.settings.Website Logo')}}</label>
            </div>
            @if($errors->has('settings.site_logo'))
                <div class="error text-danger ">{{ $errors->first('settings.site_logo')}}</div>
            @endif
            <div class="col-3">
                <img src="{{ asset("assets/dashboard/images/settings") . "/" . config("settings.site_logo") ?? "https://via.placeholder.com/80x80?text=Placeholder+Image" }}" alt="site logo" style="width: 80px; height: auto; border-radius: 50%;margin: 20px auto">
            </div>

{{--@dd($errors)--}}
            <div class="form-group row">
                <input type="file" name="settings[site_favicon]" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01"> {{trans('dashboard.settings.Website Fav Icon')}}</label>
            </div>


            @if($errors->has('settings.site_favicon'))
                <div class="error text-danger ">{{ $errors->first('settings.site_favicon')}}</div>
            @endif
            <div class="col-3">
                <img src="{{ asset("assets/dashboard/images/settings") . "/" . config("settings.site_favicon") ?? "https://via.placeholder.com/80x80?text=Placeholder+Image" }}" alt="site logo" style="width: 80px; height: auto; border-radius: 50%; margin: 20px auto">
            </div>

            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-raised btn-raised-success m-1">
                        <span class="ul-btn__icon"><i class="i-Data-Save"></i></span>
                        {{trans('dashboard.main.Save')}}

                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
