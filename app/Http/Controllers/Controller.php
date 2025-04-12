<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Car;
use App\Models\Mf;
class Controller extends BaseController
{
    public function index()
    {
        $cars=Car::with('mf')->get();
        // dd($cars);
        return view('carlist',compact('cars'));
    }
}
