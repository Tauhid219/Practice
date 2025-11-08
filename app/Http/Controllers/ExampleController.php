<?php

namespace App\Http\Controllers;

use App\Facades\MyFacade;
use App\Facades\MyServiceFacade;
use App\Services\MyCustomService;
use Illuminate\Http\Request;

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
    }

    public function anotherAction(MyCustomService $service)
    {
        return $service->anotherAction();
    }

    public function facadeExample()
    {
        return MyFacade::doSomething();
    }
}
