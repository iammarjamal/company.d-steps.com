<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class LanguageController extends Controller
{
    public function index($lang)
    {
        if (! in_array($lang, ['ar', 'en'])) {
            abort(404);
        }
        session()->put('locale', $lang);
        App::setLocale($lang);

        if(Auth::check()){
            User::where('id', Auth::user()->id)->update([
                'language' => $lang,
                'updated_at' => Carbon::now()
            ]);
        }

        return back();
    }
}
