<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Lun TEST</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
    <div class="Vue" id="app">
        <section class="first-screen search-block">
                <div class="search-block__container">
                    <h2 class="search--header">Let's find something</h2>
                    <search></search>
                </div>

        </section>

        <section class="result-block container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <apartments-list class="center-screen"></apartments-list>
                </div>
            </div>

        </section>
        <router-view></router-view>
        <flat-information></flat-information>
    </div>
        {!! Html::script('js/app.js') !!}
    </body>
</html>
