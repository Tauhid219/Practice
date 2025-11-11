<?php

use Illuminate\Support\Facades\Route;

Route::get('/test-page', function () {
    return view('test');
});

Route::middleware('auth')->group(function () {
    Route::get('/test', function () {
        return 'This is a test route.';
    });
});

Route::prefix('api')->group(function () {
    Route::get('/test-api', function () {
        return "This is a test API route.";
    });

    Route::get('/data', function () {
        return response()->json(['key' => 'value', 'foo' => 'bar']);
    });
});

Route::name('test.')->group(function () {
    Route::get('/test-named', function () {
        return 'This is a named test route.';
    })->name('named');
});

// auth middleware
Route::middleware('auth')->get('/test-auth', function () {
    return 'This is a test route with auth middleware.';
});

// guest middleware
Route::middleware('guest')->get('/test-guest', function () {
    return 'This is a test route with guest middleware.';
});

// throttle middleware
Route::middleware('throttle:5,1')->get('/test-throttle', function () {
    return 'This is a test route with throttle middleware.';
});

// verify middleware
Route::middleware('verified')->get('/test-verify', function () {
    return 'This is a test route with verified middleware.';
});

// encrypt cookies middleware
Route::middleware('encrypt.cookies')->get('/test-encrypt', function () {
    return 'This is a test route with encrypt cookies middleware.';
});
