<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function index($lang)
    {
        // Check if the requested language is supported
        if (!in_array($lang, ['ar', 'en'])) {
            abort(404);
        }

        // Store the selected language in the session
        session()->put('locale', $lang);
        session()->save();

        // Set the application locale to the selected language
        App::setLocale($lang);

        // Redirect back to the previous page
        return redirect()->back();
    }
}