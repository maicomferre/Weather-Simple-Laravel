<!doctype html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Weather</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<body>
@if(!empty($weather))
    <div class="container text-center">
        <div class="row row-cols-2 table-striped">
            <div class="col">
                <span class="mt-4">Latitude</span><br/><span class="text-center"> {{$weather['latitude'] }} </span>
            </div>
            <div class="col">
                <span class="mt-4">Longitude</span><br/><span class="text-center"> {{$weather['latitude'] }} </span>
            </div>
            <div class="col">
                <span class="mt-4">Cidade</span><br/><span class="text-center"> {{$weather['resolvedAddress'] }} </span>
            </div>
            <div class="col">
                <span class="mt-4">Timezone</span><br/><span class="text-center"> {{$weather['timezone'] }} </span>
            </div>
        </div>

        <br /><br /><br />
        <div class="row float-left">
            @foreach($weather['days'] as $day_weather)
                @include('weather_template_ico', [ "day" => $day_weather ])
            @endforeach
        </div>
    </div>
@endif
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
