<?php

use App\Facades\MyServiceFacade;
use App\Http\Controllers\Employee;
use App\Http\Controllers\ExampleController;
use App\Facades\MyFacade;
use App\Http\Controllers\InvokeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Employee Routes
Route::get('/employees/create', [Employee::class, 'create'])->name('employees.create');
Route::post('/employees', [Employee::class, 'store'])->name('employees.store');
Route::get('/employees', [Employee::class, 'index'])->name('employees.index');

Route::get('/about', [App\Http\Controllers\ExampleController::class, 'about']);
Route::get('/my-logger-example', [App\Http\Controllers\ExampleController::class, 'myLoggerExample']);
Route::get('/my-service-example', [ExampleController::class, 'myServiceExample']);
Route::get('/another-action', [ExampleController::class, 'anotherAction']);
Route::get('/test-facade', function () {
    return MyFacade::doSomething();
});
Route::get('/facade-example', [ExampleController::class, 'facadeExample']);
Route::get('/log-example', [ExampleController::class, 'logExample']);

Route::get('/invoke-controller', [InvokeController::class, '__invoke']);
