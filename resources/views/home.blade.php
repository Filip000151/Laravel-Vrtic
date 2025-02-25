<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>Vrtic</title>
        
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Irish+Grover&display=swap" rel="stylesheet">       

        <!-- Bootstrap 4 -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/css/bootstrap.min.css">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
        
        <!-- Icons -->
        <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
        
        <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
        
        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

        @livewireStyles
        <style>
            body {
                font-family: 'Irish Grover', cursive;
                background-color: #A7E6FF;
            }
            .custom-border {
                border: 3px solid #3C23AB;
                border-radius: 15px;
                color: #3C23AB;
            }
            .custom-btn {
                background: linear-gradient(to bottom, #79A9E7, #FF416A);
                color: #3C23AB;
                border: 1px solid #3C23AB;
            }
            .custom-btn:hover,
            .custom-btn2:hover {
                color: #9BC699;
            }
            .custom-btn2 {
                background: linear-gradient(to bottom, #79A9E7, #36F8CA);
                color: #3C23AB;
                border: 1px solid #3C23AB;
            }
        </style>
    </head>
    
    <body>
        <div class="row d-flex justify-content-end mt-3">
            <div style="color:#3C23AB" class="col-sm-3">
                <h4>{{Auth::user()->ime}} {{Auth::user()->prezime}} ({{Auth::user()->uloga}})</h4>
            </div>
        </div>
        <div class="container mt-3">
            <h2 style="color: #3C23AB;" class="text-center display-3">Sunshine Kidz</h2>

            @if(Auth::user()->uloga == 'admin')

            <div class="row d-flex justify-content-center">
                <div style="background-color: #60D2FF;" class="col-sm-5 custom-border mt-5 p-4 align-items-center">
                    <div class="row d-flex justify-content-around">
                        <a style="font-size: 20px;" class="btn custom-btn2 col-sm-4" href="{{route('prijava.index')}}">Prijave</a>
                        <a style="font-size: 20px;" class="btn custom-btn2 col-sm-4" href="{{route('dete.index')}}">Deca</a>
                    </div>
                    <div class="row d-flex justify-content-around mt-4">
                        <a style="font-size: 20px;" class="btn custom-btn2 col-sm-4" href="{{route('user.index')}}">Korisnici</a>
                        <a style="font-size: 20px;" class="btn custom-btn2 col-sm-4" href="{{route('roditelj.index')}}">Roditelji</a>
                    </div>
                    <div class="row d-flex justify-content-around mt-4">
                        <a style="font-size: 20px;" class="btn custom-btn2 col-sm-4" href="{{route('grupa.index')}}">Grupe</a>
                        <form action="{{ route('logout') }}" method="POST" class="col-sm-4">
                            @csrf
                            <div class="row">
                                <button style="font-size: 20px;" type="submit" class="btn custom-btn col-sm-12">Logout</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @elseif(Auth::user()->uloga == 'vaspitac')

            @endif
        </div>
        
        @stack('modals')
        @livewireScripts
        @stack('scripts')

        <!-- Bootstrap 4 Scripts -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
        
        @if (session()->has('success')) 
        <script>
            var notyf = new Notyf({dismissible: true});
            notyf.success('{{ session('success') }}');
        </script> 
        @endif
    </body>
</html>

