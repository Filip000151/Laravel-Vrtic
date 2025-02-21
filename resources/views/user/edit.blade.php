@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center">{{$user->ime}} {{$user->prezime}}</h2>

        @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif

        <div class="row mt-3 justify-content-center">
            <div style="background-color: #60D2FF;" class="col-sm-10 p-4 mt-4">
                <form method="POST" action="{{route('users.update', ['user' => $user])}}">
                    @csrf
                    @method('PUT')
                    <div class="row justify-content-between">
                        <div class="col-6">
                            <div class="form-group row mb-3 mt-3 align-items-center">
                                <label for="ime_dete" class="col-sm-2 col-form-label">Ime:</label>
                                <div class="col-sm-9">
                                    <input type="text" name="ime" class="form-control" value="{{old('ime', $user->ime)}}" required>
                                </div>
                            </div>
                            <div class="form-group row mb-3 align-items-center">
                                <label for="ime_dete" class="col-sm-2 col-form-label">Prezime:</label>
                                <div class="col-sm-9">
                                    <input type="text" name="prezime" class="form-control" value="{{old('prezime', $user->prezime)}}" required>
                                </div>
                            </div>
                            <div class="form-group row mb-3 align-items-center">
                                <label for="ime_dete" class="col-sm-4 col-form-label">Broj telefona:</label>
                                <div class="col-sm-7">
                                    <input type="text" name="broj_telefona" class="form-control" value="{{old('broj_telefona', $user->broj_telefona)}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group row mb-3 mt-3 align-items-center">
                                <label for="ime_dete" class="col-sm-2 col-form-label">Email:</label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" class="form-control" value="{{old('email', $user->email)}}" required>
                                </div>
                            </div>
                            <div class="form-group row mb-3 mt-3 align-items-center">
                                <label for="ime_dete" class="col-sm-4 col-form-label">Stara lozinka:</label>
                                <div class="col-sm-7">
                                    <input type="password" name="old_password" class="form-control" placeholder="Unesite staru lozinku" required>
                                </div>
                            </div>
                            <div class="form-group row mb-3 mt-3 align-items-center">
                                <label for="ime_dete" class="col-sm-4 col-form-label">Nova lozinka:</label>
                                <div class="col-sm-7">
                                    <input type="password" name="password" class="form-control" placeholder="Unesite novu lozinku">
                                </div>
                            </div>
                            <div class="form-group row mb-3 mt-3 align-items-center">
                                <label for="ime_dete" class="col-sm-4 col-form-label">Potvrdi lozinku:</label>
                                <div class="col-sm-7">
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Ponovite novu lozinku">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center p-4">
                        <button type="submit" class="btn custom-btn col-sm-1 mr-3">Izmeni</button>
                        <a class="btn custom-btn2 col-sm-1 ml-3" href="{{route('users.index')}}">Otkaži</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
