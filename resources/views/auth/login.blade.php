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
                background: linear-gradient(to bottom, #E4F754, #36F8CA);
                color: #27AB23;
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
        <div class="container mt-3">
            <div class="d-flex  justify-content-end mt-3">
                <a href="{{route('prijavas.create')}}" class="btn custom-btn pl-4 pr-4">Prijava</a>
            </div>
            <h2 style="color: #3C23AB;" class="text-center display-1">Sunshine Kidz</h2>
            @if ($errors->has('login'))
            <div class="alert alert-danger">
                {{ $errors->first('login') }}
            </div>
            @endif
            <div style="background-color: #60D2FF; font-size: 16px;" class="mt-5 mb-3 ml-5 mr-5 p-4 custom-border">
                <form method="POST" action="{{route('login')}}" class="ml-4 mr-4">
                    @csrf
                    <h3 class="h1 text-center">Login</h3>
                    <div class="form-group row mb-3 mt-4 ml-4 mr-4 align-items-center">
                        <label for="email" class="col-sm-1 col-form-label">Email:</label>
                        <div class="col-sm-11">
                            <input type="email" name="email" class="form-control" placeholder="Unesite email" required>
                        </div>
                    </div>
                    <div class="form-group row mb-3 mt-3 ml-4 mr-4 align-items-center">
                        <label for="lozinka" class="col-sm-1 col-form-label">Lozinka:</label>
                        <div class="col-sm-11">
                            <input type="password" name="password" class="form-control"  placeholder="Unesite lozinku" required>
                        </div>
                    </div>
                    <div class="row justify-content-end mb-3 mt-3 ml-4 mr-4">
                        <button type="submit" class="btn custom-btn2 pl-4 pr-4 mr-3">Login</button>
                    </div>
                </form>
            </div>
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

