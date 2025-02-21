@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center">Registracija korisnika</h2>

        @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif

        <div class="row justify-content-center mt-4">
            <div style="background-color: #60D2FF;" class="col-sm-10 p-4">
                <form method="POST" action="{{route('users.store')}}">
                    @csrf
                    <div class="row justify-content-between">
                        <div class="col-sm-6">
                            <div class="form-group row mb-3 mt-3 align-items-center">
                                <label for="ime_dete" class="col-sm-2 col-form-label">Ime:</label>
                                <div class="col-sm-9">
                                    <input type="text" name="ime" class="form-control" placeholder="Unesite ime" required>
                                </div>
                            </div>
                            <div class="form-group row mb-3 align-items-center">
                                <label for="ime_dete" class="col-sm-2 col-form-label">Prezime:</label>
                                <div class="col-sm-9">
                                    <input type="text" name="prezime" class="form-control" placeholder="Unesite prezime" required>
                                </div>
                            </div>
                            <div class="form-group row mb-3 align-items-center">
                                <label for="ime_dete" class="col-sm-4 col-form-label">Broj telefona:</label>
                                <div class="col-sm-7">
                                    <input type="text" name="broj_telefona" class="form-control" placeholder="Unesite broj telefona" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group row mb-3 mt-3 align-items-center">
                                <label for="ime_dete" class="col-sm-2 col-form-label">Email:</label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" class="form-control" placeholder="Unesite email" required>
                                </div>
                            </div>
                            <div class="form-group row mb-3 align-items-center">
                                <label for="ime_dete" class="col-sm-2 col-form-label">Lozinka:</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" class="form-control" placeholder="Unesite lozinku" required>
                                </div>
                            </div>
                            <div class="form-group row mb-3 align-items-center">
                                <label for="ime_dete" class="col-sm-4 col-form-label">Potvrdi lozinku:</label>
                                <div class="col-sm-7">
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Potvrdite lozinku" required>
                                </div>
                            </div>
                            <div class="form-group row mb-3 align-items-center">
                                <label for="" class="col-sm-2 col-form-label">Uloga:</label>
                                <div class="col-sm-9">
                                    <select name="uloga" class="custom-select">
                                        <option value="vaspitac" selected>Vaspitač</option>
                                        <option value="admin">Administrator</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-4">
                        <button class="btn custom-btn col-sm-2 mr-3" type="submit">Registruj</button>
                        <a href="{{route('users.index')}}" class="btn custom-btn2 col-sm-2 ml-3">Otkaži</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

