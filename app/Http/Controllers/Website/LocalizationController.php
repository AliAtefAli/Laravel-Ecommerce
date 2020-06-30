<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  $lang
     * @return \Illuminate\Http\Response
     */
    public function __invoke($lang)
    {
        // return $previousURL = explode('/', url()->previous());
        // $previousURL[3] = $lang;
        // $currentURL = implode('/', $previousURL);
        // set the locale
        app()->setLocale($lang);
        // set the session
        session()->put('lang', $lang);
        // return redirect($currentURL);
        return back();

    }
}
