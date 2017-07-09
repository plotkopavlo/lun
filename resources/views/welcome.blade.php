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
        <section class="search-block">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="center-screen">
                            <h2 class="header-text">Найдем быстро!!!</h2>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <select class="selectpicker">
                                    <option>Kiev</option>
                                    <option>Odessa</option>
                                    <option>Lviv</option>
                                </select>
                                <select class="selectpicker">
                                    <option>1k</option>
                                    <option>2k</option>
                                    <option>3k</option>
                                </select>
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="result-block">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <h2 class="header-text">Найдено ХХХ результатов</h2>
                        <div class="result-apartments-block">
                            <div class="block-img">
                                <img src="img/page.jpg" class="image-apartaments" alt="">
                            </div>
                            <div class="left-info-block">
                                <p class="info-text">asdasd</p>
                                <p class="info-text">ЖК</p>
                                <p class="info-text">Киев</p>
                                <p class="info-text">Дом 3</p>
                            </div>
                            <div class="right-info-block">
                                <p class="info-text">5000 $</p>
                                <p class="info-text">55 м2</p>
                            </div>
                        </div>
                        <div class="result-apartments-block">
                            <div class="block-img">
                                <img src="img/page.jpg" class="image-apartaments" alt="">
                            </div>
                            <div class="left-info-block">
                                <p class="info-text">asdasd</p>
                                <p class="info-text">ЖК</p>
                                <p class="info-text">Киев</p>
                                <p class="info-text">Дом 3</p>
                            </div>
                            <div class="right-info-block">
                                <p class="info-text">5000 $</p>
                                <p class="info-text">55 м2</p>
                            </div>
                        </div>
                        <div class="result-apartments-block">
                            <div class="block-img">
                                <img src="img/page.jpg" class="image-apartaments" alt="">
                            </div>
                            <div class="left-info-block">
                                <p class="info-text">asdasd</p>
                                <p class="info-text">ЖК</p>
                                <p class="info-text">Киев</p>
                                <p class="info-text">Дом 3</p>
                            </div>
                            <div class="right-info-block">
                                <p class="info-text">5000 $</p>
                                <p class="info-text">55 м2</p>
                            </div>
                        </div>
                        <div class="result-apartments-block">
                            <div class="block-img">
                                <img src="img/page.jpg" class="image-apartaments" alt="">
                            </div>
                            <div class="left-info-block">
                                <p class="info-text">asdasd</p>
                                <p class="info-text">ЖК</p>
                                <p class="info-text">Киев</p>
                                <p class="info-text">Дом 3</p>
                            </div>
                            <div class="right-info-block">
                                <p class="info-text">5000 $</p>
                                <p class="info-text">55 м2</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
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
            </div>
        </section>
        <script src="/js/app.js"></script>
    </body>
</html>
