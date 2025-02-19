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
            }
            .custom-border {
                border: 3px solid #27AB23;
                border-radius: 15px;
                color: #27AB23;
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
    
    <body style="background-color: #DAFFA7">

        <div class="container">
            <div class="d-flex row justify-content-end mt-3">
                <a style="font-size: 16px;" href="{{route('login')}}" class="btn custom-btn2 col-sm-1">Login</a>
            </div>
            <h1 style="color: #27AB23" class="text-center display-1">Sunshine Kidz</h1>

            @if(session('success'))
            <div class="alert alert-success text-center">
                {{session('success')}}
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div style="background-color: #9DFF65; font-size: 16px;" class="mt-5 mb-3 ml-3 mr-3 custom-border">
                <form method="POST" action="{{route('prijavas.store')}}" onsubmit="return confirm('Podnesi prijavu?');">
                    @csrf
                    <div class="row pl-4 pr-4 pt-4">
                        <div class="col-6">
                            <h3 style="color: #27AB23" class="text-center">Dete</h3>
                            <div class="form-group row mb-3 mt-3 align-items-center">
                                <label for="ime_dete" class="col-auto col-form-label">Ime:</label>
                                <div class="col">
                                    <input type="text" name="ime_dete" class="form-control" placeholder="Unesite ime deteta" required>
                                </div>
                            </div>
                            <div class="form-group row mb-3 align-items-center">
                                <label for="prezime_dete" class="col-auto col-form-label">Prezime:</label>
                                <div class="col">
                                    <input type="text" name="prezime_dete" class="form-control" placeholder="Unesite prezime deteta" required>
                                </div>
                            </div>
                            <div class="form-group row mb-3 align-items-center">
                                <label for="datum_rodjenja" class="col-auto col-form-label">Datum rodjenja:</label>
                                <div class="col">
                                    <input type="date" name="datum_rodjenja" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row mb-3 align-items-center">
                                <label for="jmbg_dete" class="col-auto col-form-label">JMBG:</label>
                                <div class="col">
                                    <input type="text" name="jmbg_dete" class="form-control" placeholder="Unesite JMBG deteta" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <h3 style="color: #27AB23" class="text-center">Roditelj</h3>
                            <div class="form-group row mb-3 mt-3 align-items-center">
                                <label for="ime_roditelj" class="col-auto col-form-label">Ime:</label>
                                <div class="col">
                                    <input type="text" name="ime_roditelj" class="form-control" placeholder="Unesite ime roditelja" required>
                                </div>
                            </div>
                            <div class="form-group row mb-3 align-items-center">
                                <label for="prezime_roditelj" class="col-auto col-form-label">Prezime:</label>
                                <div class="col">
                                    <input type="text" name="prezime_roditelj" class="form-control" placeholder="Unesite prezime roditelja" required>
                                </div>
                            </div>
                            <div class="form-group row mb-3 align-items-center">
                                <label for="broj_telefona" class="col-auto col-form-label">Broj telefona:</label>
                                <div class="col">
                                    <input type="text" name="broj_telefona" class="form-control" placeholder="Unesite broj telefona roditelja" required>
                                </div>
                            </div>
                            <div class="form-group row mb-3 align-items-center">
                                <label for="jmbg_roditelj" class="col-auto col-form-label">JMBG:</label>
                                <div class="col">
                                    <input type="text" name="jmbg_roditelj" class="form-control" placeholder="Unesite JMBG roditelja" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-4 pl-4 pr-4">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="napomene" class="col-form-label">Napomene:</label>
                                <textarea class="form-control" name="napomene" cols="30" rows="10" placeholder="Dodatne napomene"></textarea>
                            </div>
                        </div>
                        <div class="col-6 d-flex justify-content-end align-items-end mb-3">
                            <button style="font-size: 16px;" type="submit" class="btn custom-btn col-sm-3">Prijavi</button>
                        </div>
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
