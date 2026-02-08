<div class="card" style="width: 18rem;">
    @php
        $url_images = array(
                "partly-cloudy-day" => '/img/weather/',
                "rain" => '/img/weather/rain-rainy.gif',
                "clear-day" => '/img/weather/',
                "clear-night" => '/img/weather/',
                "partly-cloudy-night" => '/img/weather/',
                "cloudy" => '/img/weather/',
            );
    @endphp
    @if(isset($url_images[$day['icon']]))
    <img src="{{ $url_images[$day['icon']] }}" width="150px" height="150px" class="card-img-top mt-2 rounded" alt="...">
    @endif
    <div class="card-body">
        <h5 class="card-title">{{ $day['conditions'] }}</h5>
        <h3>Minima: {{ $day['tempmin'] }}  |  Máxima: {{ $day['tempmax'] }}</h3>
        <p class="card-text">{{ $day['description'] }}</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
</div>
