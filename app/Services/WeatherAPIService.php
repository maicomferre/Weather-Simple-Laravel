<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;


class WeatherAPIService{
    protected $apiKey;
    protected $baseUrl;


    public function __construct(){
        $this->apiKey = config('services.weather.key');
        $this->baseUrl = config('services.weather.url');
    }

    public function getWeatherFromCity($city){
        $cache_city = 'weatherFromCity_'. Str::slug($city);

        return Cache::remember($cache_city, 36000, function() use ($city){
            $url = $this->baseUrl . urlencode($city);
            $response = Http::get($url, [
                'unitGroup' => 'metric',
                'lang' => 'pt',
                'include' => 'hours,alerts,current',
                'key' => $this->apiKey,
                'contentType' => 'json',
            ]);
            if($response->successful()){
                return $response->json() ;
            }

            return null;
        });
    }
}
