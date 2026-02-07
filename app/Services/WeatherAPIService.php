<?php


use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class WeatherAPIService{
    protected $apiKey;
    protected $baseUrl;


    public function __construct(){
        $this->apiKey = env('config.services.weatherAPIKey');
        $this->baseUrl = env('config.services.weatherAPIUrl');
    }

    public function getWeatherFromCity($city){
        $cache_city = 'weatherFromCity_'. Str::slug($city);

        return Cache::remember($cache_city, 36000, function() use ($city){
            $response = Http::get($this->baseUrl . $city, [
                'unitGroup' => 'metric',
                'include' => 'hours,alerts,current,days',
                'key' => $this->apiKey,
                'contentType' => 'json'
            ]);
            if($response->successful()){
                return response($response->json());
            }

            return null;
        });
    }
}
