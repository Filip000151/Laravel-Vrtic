<nav style="background-color: #60D2FF" class="navbar navbar-expand-sm">
    @if(Auth::user()->uloga == 'admin')
    <a style="color: #3C23AB" class="navbar-brand" href="{{route('home')}}">Sunshine Kidz</a>

    <ul class="navbar-nav">
        <li class="nav-item">
            <a style="color: #3C23AB" class="nav-link {{ Request::is('prijava') ? 'active' : '' }}" href="{{route('prijava.index')}}">Prijave</a>
        </li>
        <li class="nav-item">
            <a style="color: #3C23AB" class="nav-link {{ Request::is('user') ? 'active' : '' }}" href="{{route('user.index')}}">Korisnici</a>
        </li>
        <li class="nav-item">
            <a style="color: #3C23AB" class="nav-link {{ Request::is('dete') ? 'active' : '' }}" href="{{route('dete.index')}}">Deca</a>
        </li>
        <li class="nav-item">
            <a style="color: #3C23AB" class="nav-link {{ Request::is('roditelj') ? 'active' : '' }}" href="{{route('roditelj.index')}}">Roditelji</a>
        </li>
        <li class="nav-item">
            <a style="color: #3C23AB" class="nav-link {{ Request::is('grupa') ? 'active' : '' }}" href="{{route('grupa.index')}}">Grupe</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                {{Auth::user()->ime}} {{Auth::user()->prezime}} ({{Auth::user()->uloga}})
            </a>
            <div class="dropdown-menu">
                <form method="POST" action="{{route('logout')}}">
                    @csrf
                    <button type="submit" class="dropdown-item">Logout</button>
                </form>
            </div>
        </li>
    </ul>
    @else
    <a style="color: #3C23AB" class="navbar-brand" href="{{route('grupa.index')}}">Sunshine Kidz</a>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                {{Auth::user()->ime}} {{Auth::user()->prezime}} ({{Auth::user()->uloga}})
            </a>
            <div class="dropdown-menu">
                <form method="POST" action="{{route('logout')}}">
                    @csrf
                    <button type="submit" class="dropdown-item">Logout</button>
                </form>
            </div>
        </li>
    </ul>
    @endif
</nav>