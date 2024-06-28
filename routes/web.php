<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

// Requires
require __DIR__.'/web/general/general.php';
require __DIR__.'/web/home/home.php';
require __DIR__.'/web/auth/auth.php';
require __DIR__.'/web/hr/hr.php';
require __DIR__.'/web/admin/admin.php';
require __DIR__.'/web/users/users.php';

// SSL
if(env('APP_DEBUG') == false){
    URL::forceScheme('https');
}



Route::get('/refresh-laravel', function (){
    try {
        // Run Artisan commands
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('optimize:clear');

        return response()->json(['message' => 'All commands executed successfully!'], 200);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
});
