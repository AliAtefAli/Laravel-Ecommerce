<div class="card mb-5">
    <div class="card-header bg-transparent">
        <h3 class="card-title">{{trans('dashboard.settings.General Website Settings')}} </h3>
    </div>

    <div class="card-body">
        <form action="{{ route("setting.update") }}" method="post">
            @csrf
            @method("put")

            <div class="form-group row">
                <label for="inputTitle3"
                       class="col-sm-2 col-form-label">{{trans('dashboard.settings.Site Arabic Title')}}</label>
                <div class="col-sm-10">
                    <input type="text" name="settings[site_ar_title]"
                           value="{{ config("settings.site_ar_title") ?? "" }}" class="form-control" id="inputTitle3"
                           required placeholder="Enter site arabic title">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputTitle4"
                       class="col-sm-2 col-form-label">{{trans('dashboard.settings.Site English Title')}}</label>
                <div class="col-sm-10">
                    <input type="text" name="settings[site_en_title]"
{{--                           value="{{ config("settings.site_en_title") ?? "" }}" class="form-control" id="inputTitle4"--}}
                           required placeholder="Enter site english title">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputTitle4"
                       class="col-sm-2 col-form-label">{{trans('dashboard.settings.Site turkish Title')}}</label>
                <div class="col-sm-10">
                    <input type="text" name="settings[site_tr_title]"
{{--                           value="{{ config("settings.site_tr_title") ?? "" }}" class="form-control" id="inputTitle4"--}}
                           required placeholder="Enter site turkish title">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail5"
                       class="col-sm-2 col-form-label">{{trans('dashboard.settings.Site fee')}}</label>
                <div class="col-sm-10">
                    <input type="text" name="settings[fee]" value="{{ config("settings.fee") }}" class="form-control"
                           id="inputEmail5" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail5"
                       class="col-sm-2 col-form-label">{{trans('dashboard.settings.Default Email Address')}}</label>
                <div class="col-sm-10">
                    <input type="email" name="settings[site_email]" {{--value="{{ config("settings.site_email") }}"--}}
                           class="form-control" id="inputEmail5" required placeholder="Enter Default Email Address">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputHours"
                       class="col-sm-2 col-form-label">{{trans('dashboard.settings.Company opening hours')}} </label>
                <div class="col-sm-10">
                    <input type="text" name="settings[opening_hours]" {{--value="{{ config("settings.opening_hours") }}"--}}
                           class="form-control" id="inputHours" placeholder="Enter Company opening hours">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPhone3"
                       class="col-sm-2 col-form-label">{{trans('dashboard.settings.Phone Number')}} </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="settings[site_phone_number]"
                           value="{{ config("settings.site_phone_number") }}" id="inputPhone3" required
                           placeholder="Enter Company Phone Number">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPhone3" class="col-sm-2 col-form-label">{{trans('dashboard.settings.Phone Number')}}
                    2</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="settings[site_phone_number_2]"
{{--                           value="{{ config("settings.site_phone_number_2") }}" id="inputPhone3"--}}
                           placeholder="Enter Company Phone 2 Number">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPhone3" class="col-sm-2 col-form-label">{{trans('dashboard.settings.Phone Number')}}
                    3</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="settings[site_phone_number_3]"
                           value="{{ config("settings.site_phone_number_3") }}" id="inputPhone3"
                           placeholder="Enter Company Phone 3 Number">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputDescription3"
                       class="col-sm-2 col-form-label">{{trans('dashboard.settings.Site English Description')}} </label>
                <div class="col-sm-10">
                    <textarea id="inputDescription3" name="settings[site_en_description]" class="form-control" required
                              aria-label="With textarea">{{--{{ config("settings.site_en_description") }}--}}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputDescription4"
                       class="col-sm-2 col-form-label">{{trans('dashboard.settings.Site turkish Description')}} </label>
                <div class="col-sm-10">
                    <textarea id="inputDescription4" name="settings[site_tr_description]" class="form-control" required
                              aria-label="With textarea">{{--{{ config("settings.site_tr_description") }}--}}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputDescription3"
                       class="col-sm-2 col-form-label">{{trans('dashboard.settings.Site Arabic Description')}}</label>
                <div class="col-sm-10">
                    <textarea id="inputDescription3" name="settings[site_ar_description]" class="form-control" required
                              aria-label="With textarea">{{--{{ config("settings.site_ar_description") }}--}}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="autocomplete_search"
                       class="col-sm-2 col-form-label">{{trans('dashboard.settings.Company Location')}}</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="settings[company_location]"
{{--                           value="{{ config("settings.company_location") ?? "" }}" id="autocomplete_search" required--}}
                           placeholder="Enter site location">
{{--                    <input type="hidden" id="latitude" value="{{ config("settings.company_latitude") ?? "53.8478" }}"--}}
                           name="settings[company_latitude]">
{{--                    <input type="hidden" id="longitude" value="{{ config("settings.company_longitude") ?? "23.4241" }}"--}}
                           name="settings[company_longitude]">
                    <br>
                    <div id="map"
                         style="position: fixed !important; height: 300px !important; width: 100% !important"></div>
                </div>
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
