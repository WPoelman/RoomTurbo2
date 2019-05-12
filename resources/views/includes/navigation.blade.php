<nav class="navbar navbar-expand-sm bg-dark navbar-dark mb-4">
    <a class="navbar-brand" href="/">RoomTurbo2</a>

    <!-- Left Side -->
    <ul class="navbar-nav">
        <li class="nav-item {{ isActive('about') }}">
            <a class="nav-link" href="/about">Over</a>
        </li>
        <li class="nav-item {{ isActive('rooms') }}">
            <a class="nav-link" href="/rooms">Kamers</a>
        </li>
    </ul>

    <!-- Right Side -->
    <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Inloggen') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Registreren') }}</a>
                    </li>
                @endif
            @else
            <li class="nav-item {{ isActive('add') }}">
                    <a class="nav-link" href="/rooms/create">Kamer Toevoegen</a>
            </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('home') }}">
                            {{ __('Dashboard') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Uitloggen') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
    </ul>
</nav>
