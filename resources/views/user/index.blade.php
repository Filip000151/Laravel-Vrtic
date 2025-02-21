@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-end">
            <a class="btn custom-btn" href="{{route('users.create')}}">Registruj korisnika</a>
        </div>
        <h2 class="text-center">Korisnici</h2>
        <ul style="font-size: 16px" class="nav nav-tabs justify-content-center mt-5">
            <li class="nav-item">
                <a class="nav-link custom-link {{$uloga === 'vaspitac' ? 'active disabled' : ''}}" href="{{route('users.index', ['uloga' => 'vaspitac'])}}">Vaspitači</a>
            </li>
            <li class="nav-item">
                <a class="nav-link custom-link {{$uloga === 'admin' ? 'active disabled' : ''}}" href="{{route('users.index', ['uloga' => 'admin'])}}">Administratori</a>
            </li>
        </ul>

        @if($users->isEmpty())
        <div class="alert alert-danger text-center mt-5">
            Nema korisnika.
        </div>
        @endif

        <div style="font-size: 16px" class="row justify-content-center mt-3">
            <div style="background-color: #60D2FF;" class="col-sm-9 p-4">
                <div class="d-flex flex-wrap justify-content-around">
                    @foreach($users as $user)
                    <div class="card custom-card m-3">
                        <div class="card-header text-center">
                            <a class="link custom-link2" href="{{route('users.show', ['user' => $user])}}">{{$user->ime}} {{$user->prezime}}</a>
                        </div>
                        <div class="card-body d-flex justify-content-around">
                            <a class="btn custom-btn m-2" href="{{route('users.edit', ['user' => $user])}}">Izmeni</a>
                            @if($user->uloga == 'vaspitac')
                            <form method="POST" action="{{route('users.destroy', ['user' => $user])}}" onsubmit="return confirm('Ukloni korisnika?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn custom-btn2 m-2">Ukloni</button>
                            </form>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
