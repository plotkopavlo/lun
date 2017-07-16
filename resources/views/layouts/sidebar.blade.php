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
                <li>
                    <a href="">
                        <i class="fa fa-building"></i>
                        <span class="nav-label">Buildings</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{ url('panel/buildings') }}">List all buildings</a></li>
                        <li><a href="{{ url('panel/buildings/create') }}">Add a building</a></li>
                    </ul>
                </li>
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                        <span class="nav-label">Flats</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{ url('panel/flats') }}">List all flats</a></li>
                        <li><a href="{{ url('panel/flats/create') }}">Add a flat</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</div>