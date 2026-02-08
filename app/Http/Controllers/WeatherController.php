<?php

namespace App\Http\Controllers;

use App\Services\WeatherAPIService;
use Illuminate\Http\Request;

class WeatherController extends Controller
{

    public function index(){
        $weather = (new WeatherAPIService)->getWeatherFromCity('São Paulo Brasil');

        return view('weather', compact('weather'));
    }
}
