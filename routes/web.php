<?php

use App\Http\Controllers\General\LanguageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

// Requires
require __DIR__.'/web/general/general.php';
require __DIR__.'/web/home/home.php';
require __DIR__.'/web/auth/auth.php';
require __DIR__.'/web/dashboard/dashboard.php';
require __DIR__.'/web/hr/hr.php';
require __DIR__.'/web/admin/admin.php';
require __DIR__.'/web/users/users.php';

// SSL
if(env('APP_DEBUG') == false){
    URL::forceScheme('https');
}



