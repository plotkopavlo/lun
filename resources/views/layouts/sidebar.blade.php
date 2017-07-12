<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs">
                                <strong class="font-bold">Lun test</strong>
                            </span>
                            <span class="text-muted text-xs block">Panel<b class="caret"></b></span>
                        </span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            {{--<li><a href="profile.html">Профиль</a></li>
                            <li><a href="contacts.html">Контакты</a></li>
                            <li><a href="mailbox.html">Почтовый ящик</a></li>--}}
                            <li class="divider"></li>
                            <li><a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        LN
                    </div>
                </li>
                <li>
                    <a href="">
                        <i class="fa fa-globe"></i>
                        <span class="nav-label">Cities</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{ url('panel/cities') }}">List all cities</a></li>
                        <li><a href="{{ url('panel/cities/create') }}">Add a city</a></li>
                    </ul>
                </li>
                <li>
                    <a href="">
                        <i class="fa fa-building-o"></i>
                        <span class="nav-label">Res. Complexes</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{ url('panel/complexes') }}">List all complexes</a></li>
                        <li><a href="{{ url('panel/complexes/create') }}">Add a complex</a></li>
                    </ul>
                </li>
                {{--<li>--}}
                    {{--<a href="">--}}
                        {{--<i class="fa fa-edit"></i>--}}
                        {{--<span class="nav-label">Категории товаров</span>--}}
                        {{--<span class="fa arrow"></span>--}}
                    {{--</a>--}}
                    {{--<ul class="nav nav-second-level">--}}
                        {{--<li><a href="{{url('dashboard/categories')}}">Просмотреть все категории</a></li>--}}
                        {{--<li><a href="{{url('dashboard/categories/create')}}">Создать новую категорию</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="">--}}
                        {{--<i class="fa fa-edit"></i>--}}
                        {{--<span class="nav-label">Фотогаллерея</span>--}}
                        {{--<span class="fa arrow"></span>--}}
                    {{--</a>--}}
                    {{--<ul class="nav nav-second-level">--}}
                        {{--<li><a href="{{url('dashboard/gallery')}}">Просмотреть все фотографии</a></li>--}}
                        {{--<li><a href="{{url('dashboard/gallery/create')}}">Добавить новую фотографию</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="">--}}
                        {{--<i class="fa fa-edit"></i>--}}
                        {{--<span class="nav-label">Партнёры</span>--}}
                        {{--<span class="fa arrow"></span>--}}
                    {{--</a>--}}
                    {{--<ul class="nav nav-second-level">--}}
                        {{--<li><a href="{{url('dashboard/partners')}}">Просмотреть всех партнёров</a></li>--}}
                        {{--<li><a href="{{url('dashboard/partners/create')}}">Создать нового партнера</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="">--}}
                        {{--<i class="fa fa-shopping-cart"></i>--}}
                        {{--<span class="nav-label">Продукты</span>--}}
                        {{--<span class="fa arrow"></span></a>--}}
                    {{--<ul class="nav nav-second-level">--}}
                        {{--<li><a href="{{url('admin/store')}}">Посмотреть все продукты</a></li>--}}
                        {{--<li><a href="{{url('admin/store/create')}}">Добавить новый продукт</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="{{ url('dashboard/contact/1/edit')}}">--}}
                        {{--<i class="fa fa-edit"></i>--}}
                        {{--<span class="nav-label">Обновить контакты</span></a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="{{ url('dashboard/footer/1/edit')}}">--}}
                        {{--<i class="fa fa-edit"></i>--}}
                        {{--<span class="nav-label">Обновить футер</span></a>--}}
                {{--</li>--}}
            </ul>
        </div>
    </nav>
</div>