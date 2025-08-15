<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

Route::get('/', function () {
    return view('welcome');
});

// Other routes
Route::get('/dbconn', function () {
    return view('dbconn');
});

// Catch-all route (must be last) - exclude API routes
Route::get('/{pathMatch}', function () {
    return view('welcome');
})->where('pathMatch', '^(?!api).*');

?>