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
        <section class="first-screen">
            <div class="search-block">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="center-screen">
                                <h2 class="header-text">Let's find something</h2>
                                <form method="GET" class="input-group">
                                    <input type="text" class="form-control" disabled placeholder="Search for...">
                                    <select name="city" class="selectpicker">
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}" {{ $city->id == $cityID ? 'selected' : '' }}>
                                                {{ $city->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <select name="rooms" class="selectpicker">
                                        @for($idx = 1; $idx <= $maxRooms; $idx++ )
                                            <option value="{{ $idx }}" {{ $idx == $rooms ? 'selected' : '' }}>
                                                {{ $idx }} rooms
                                            </option>
                                        @endfor
                                    </select>
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit">Go!</button>
                                    </span>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container result-block">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h2 class="header-text">Found <span id="num-of-results">{{ $total }}</span> results</h2>

                    @foreach($flats as $flat)
                        <div class="result-apartments-block">
                            <div class="block-img">
                                <img src="img/page.jpg" class="image-apartaments" alt="">
                            </div>
                            <div class="left-info-block">
                                <p class="info-text">
                                    <a>{{ $flat->name }}</a> - updated {{ $flat->updated_at->diffForHumans() }}
                                </p>
                                <div class="info-text">
                                    <b>Description: </b>{!! $flat->description !!}
                                </div>
                                <p class="info-text">
                                    <b>Complex:</b> {{ $flat->buildings()->first() ? $flat->buildings()->first()->residentialComplex->name : '-' }}
                                </p>
                                <p class="info-text">
                                    <b>City:</b> {{ isset($flat->city) ?
                                        $flat->city->name
                                        : '-' }}
                                </p>
                                <p class="info-text">
                                    <b>Rooms: </b> {{ $flat->num_of_rooms }}
                                </p>
                                <p class="info-text">
                                    <b>Building(s): </b>
                                    <ul>
                                        @foreach($flat->buildings as $building)
                                            <li>{{ $building->name }}</li>
                                        @endforeach
                                    </ul>
                                </p>
                            </div>
                            <div class="right-info-block">
                                <p class="info-text">{{ $flat->price }} $</p>
                                <p class="info-text">
                                    <b>Area: </b> {{ $flat->area_m2 }} m2
                                </p>
                            </div>
                        </div>
                    @endforeach

                    {{ $flats->appends(['rooms' => $rooms, 'city' => $cityID])->links() }}

                </div>
            </div>


            {{--<div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <ul class="pagination">
                            <li><a href="#">«</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">»</a></li>
                        </ul>
                    </div>
                </div>
            </div>--}}
        </section>
        {!! Html::script('js/app.js') !!}
    </body>
</html>
