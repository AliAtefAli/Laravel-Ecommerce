<div class="card mb-5">
    <div class="card-header bg-transparent">
        <h3 class="card-title">{{trans('dashboard.settings.Website Social Media Links')}} </h3>
    </div>

    <div class="card-body">
        <form action="{{--{{ route("settings.update",['lang' => app()->getLocale()]) }}--}}" method="post">
            @csrf
            @method("put")

            <div class="form-group row">
                <label for="inputFacebook3" class="col-sm-2 col-form-label">{{trans('dashboard.settings.Facebook')}}</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="settings[social_facebook]" value="{{ config("settings.social_facebook") ?? "" }}" id="inputFacebook3" aria-describedby="basic-addon3" required placeholder="ex: https://www.facebook.com/baitalumor/">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputTwitter3" class="col-sm-2 col-form-label"> {{trans('dashboard.settings.Twitter')}}</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="settings[social_twitter]" value="{{ config("settings.social_twitter") ?? "" }}" id="inputTwitter3" aria-describedby="basic-addon3" required placeholder="ex: https://www.twitter.com/baitalumor/">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputInstagram3" class="col-sm-2 col-form-label"> {{trans('dashboard.settings.Instagram')}}</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="settings[social_instagram]" value="{{ config("settings.social_instagram") ?? "" }}" id="inputInstagram3" aria-describedby="basic-addon3" required placeholder="ex: https://www.instagram.com/baitalumor/">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputWhatsapp3" class="col-sm-2 col-form-label"> {{trans('dashboard.settings.Whatsapp number')}}</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="settings[social_whatsapp]" value="{{ config("settings.social_whatsapp") ?? "" }}" id="inputWhatsapp3" aria-describedby="basic-addon3" required placeholder="ex: 15551234567">
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
