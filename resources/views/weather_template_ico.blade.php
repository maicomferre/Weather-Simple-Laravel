<div class="card" style="width: 18rem;">
    @php
        use Illuminate\Support\Carbon;
        $url_images = array(
                "partly-cloudy-day" => '/img/weather/partly-cloudy-day.png',
                "rain" => '/img/weather/rain-rainy.gif',
                "clear-day" => '/img/weather/clear-no-clouds.png',
                "clear-night" => '/img/weather/clear-night.png',
                "partly-cloudy-night" => '/img/weather/partly-cloudy-night',
                "cloudy" => '/img/weather/cloudy.png',
            );
        $nome_do_dia = Carbon::parse($day['datetime'])->locale('pt-BR')->translatedFormat('l');
    @endphp
    {{ $nome_do_dia  }}
    @if(isset($url_images[$day['icon']]))
        <img src="{{ $url_images[$day['icon']] }}" width="150px" height="150px" class="card-img-top mt-2 rounded" alt="...">
    @endif
    <div class="card-body">
        <h5 class="card-title">{{ $day['conditions'] }}</h5>
        <h3>Minima: {{ $day['tempmin'] }}  |  Máxima: {{ $day['tempmax'] }}</h3>
        <p class="card-text">{{ $day['description'] }}</p>
        <a href="#" class="btn btn-primary">Ver Detalhes ({{ $nome_do_dia }})</a>
    </div>
</div>
