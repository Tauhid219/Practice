<?php

namespace App\Http\Controllers;

use App\Facades\MyFacade;
use App\Facades\MyServiceFacade;
use App\Services\MyCustomService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ExampleController extends Controller
{
    // public function about(MyLogger $logger)
    // {
    //     $logMessage = $logger->Log("This is the about page.");
    //     return response()->json(['message' => $logMessage]);
    // }

    public function about(MyCustomService $service) // Dependency Injection
    {
        return $service->performAction();
        // return MyServiceFacade::performAction(); // Using Facade
    }

    public function anotherAction(MyCustomService $service)
    {
        return $service->anotherAction();
    }

    public function logExample()
    {
        Log::info('This is an info log from ExampleController.');
        return 'Log entry created.';
    }

    public function facadeExample()
    {
        return MyFacade::doSomething();
    }

    public function adultTest()
    {
        return 'Access granted. You are at least 18 years old.';
    }
}
