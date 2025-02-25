@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="h1 text-center">{{$roditelj->ime}} {{$roditelj->prezime}}</h2>

        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="row justify-content-center">
            <div style="background-color: #60D2FF;" class="col-sm-9 p-4 mt-4">
                <form method="POST" action="{{route('roditelj.update', ['roditelj' => $roditelj])}}">
                    @csrf
                    @method('PUT')
                    <div class="row justify-content-center">
                        <div class="col-sm-9">
                            <div class="form-group row mb-3 mt-3 align-items-center">
                                <label class="col-sm-3 col-form-label">Ime:</label>
                                <div class="col-sm-9">
                                    <input type="text" name="ime" class="form-control" value="{{old('ime', $roditelj->ime)}}" required>
                                </div>
                            </div>
                            <div class="form-group row mb-3 align-items-center">
                                <label class="col-sm-3 col-form-label">Prezime:</label>
                                <div class="col-sm-9">
                                    <input type="text" name="prezime" class="form-control" value="{{old('prezime', $roditelj->prezime)}}" required>
                                </div>
                            </div>
                            <div class="form-group row mb-3 align-items-center">
                                <label class="col-sm-3 col-form-label">Broj telefona:</label>
                                <div class="col-sm-9">
                                    <input type="text" name="broj_telefona" class="form-control" value="{{old('broj_telefona', $roditelj->broj_telefona)}}" required>
                                </div>
                            </div>
                            <div class="form-group row mb-3 align-items-center">
                                <label class="col-sm-3 col-form-label">JMBG:</label>
                                <div class="col-sm-9">
                                    <input type="text" name="jmbg" class="form-control" value="{{old('jmbg', $roditelj->jmbg)}}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-around mt-4">
                        <button type="submit" class="btn custom-btn">Izmeni</button>
                        <a class="btn custom-btn2" href="{{route('roditelj.show', ['roditelj' => $roditelj])}}">Otkaži</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
