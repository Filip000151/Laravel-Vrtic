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
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
        
        <!-- Icons -->
        <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
        
        <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
        
        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

        
        @livewireStyles
        <style>
            body{
                font-family: 'Irish Grover', cursive;
                background-color: #A7E6FF;
                color: #3C23AB;
            }
            .nav-link:hover{
                color: #A7E6FF !important;
            }
            .nav-link.active{
                background-color: #1FBFFE;
            }
            .custom-btn:hover,
            .custom-btn2:hover{
                color: #9BC699;
            }
            .custom-btn{
                background: linear-gradient(to bottom, #79A9E7, #36F8CA);
                color: #3C23AB;
                border: 1px solid #3C23AB;
            }
            .custom-btn2{
                background: linear-gradient(to bottom, #79A9E7, #FF416A);
                color: #3C23AB;
                border: 1px solid #3C23AB;
            }
            .custom-link{
            color: #3C23AB;
            }
            .nav-tabs{
                border-bottom: solid 2px #3C23AB !important;
            }
            .custom-link:hover{
                color: #60D2FF !important;
                border: 2px solid #60D2FF !important;
            }
            .custom-link.active{
                background-color: #1FBFFE !important;
                border: #1FBFFE !important;
                color: #3C23AB !important;
            }
            .table thead tr{
                border-bottom: 3px solid #3C23AB;
                border-top: 2px solid #3C23AB;
            }
            .table tbody tr{
                border-top: 2px solid #3C23AB;
            }
            .custom-card{
                background-color: #1FBFFE;
            }
            .custom-link2{
                color: #3C23AB;
            }
            .list-group-item{
                background-color: #1FBFFE;
                color: #3C23AB;
            }
            .list-group-item:hover{
                background-color: #A7E6FF;
                color: #1FBFFE;
            }
        </style>
    </head>
    
    <body>
        <div id="app">
            @include('layouts.nav')
        
            <main class="py-4">
                @yield('content')
            </main>
        </div>

        @stack('modals')
        
        @livewireScripts
        
        @stack('scripts')
        
        <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
        
        @if (session()->has('success')) 
        <script>
            var notyf = new Notyf({dismissible: true})
            notyf.success('{{ session('success') }}')
        </script> 
        @endif
    </body>
</html>