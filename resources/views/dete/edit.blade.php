@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="h1 text-center">{{$dete->ime}} {{$dete->prezime}}</h2>

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
            <div style="background-color: #60D2FF;" class="col-sm-9 mt-4 p-4">
                <form action="{{route('dete.update', ['dete' => $dete])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group row mb-3 mt-3 align-items-center">
                                <label class="col-sm-2 col-form-label">Ime:</label>
                                <div class="col-sm-9">
                                    <input type="text" name="ime" class="form-control" value="{{old('ime', $dete->ime)}}">
                                </div>
                            </div>
                            <div class="form-group row mb-3 align-items-center">
                                <label class="col-sm-2 col-form-label">Prezime:</label>
                                <div class="col-sm-9">
                                    <input type="text" name="prezime" class="form-control" value="{{old('prezime', $dete->prezime)}}">
                                </div>
                            </div>
                            <div class="form-group row mb-3 align-items-center">
                                <label class="col-sm-2 col-form-label">Datum rođenja:</label>
                                <div class="col-sm-9">
                                    <input type="date" name="datum_rodjenja" class="form-control" value="{{old('datum_rodjenja', $dete->datum_rodjenja->format('Y-m-d'))}}">
                                </div>
                            </div>
                            <div class="form-group row mb-3 align-items-center">
                                <label class="col-sm-2 col-form-label">JMBG:</label>
                                <div class="col-sm-9">
                                    <input type="text" name="jmbg" class="form-control" value="{{old('jmbg', $dete->jmbg)}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group row mb-3 mt-3 align-items-center">
                                <label class="col-sm-2 col-form-label">Grupa:</label>
                                <div class="col-sm-9">
                                    @if(is_null($dete->grupa))
                                    <select name="grupa" class="custom-select">
                                        <option value="negrupisan" selected>Negrupisan</option>
                                        @foreach($grupe as $grupa)
                                        <option value="{{$grupa->id}}">{{$grupa->naziv}}</option>
                                        @endforeach
                                    </select>
                                    @else
                                    <select name="grupa" class="custom-select">
                                        <option value="negrupisan">-Negrupisan-</option>
                                        @foreach($grupe as $grupa)
                                        <option value="{{$grupa->id}}" {{old('grupa', $dete->grupa->id) == $grupa->id ? 'selected' : ''}}>{{$grupa->naziv}}</option>
                                        @endforeach
                                    </select>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Napomene:</label>
                                <textarea class="form-control" name="napomene">{{$dete->napomene}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-around mt-3">
                        <div class="col-auto">
                            <button class="btn custom-btn" type="submit">Izmeni</button>
                        </div>
                        <div class="col-auto">
                            <a class="btn custom-btn2" href="{{route('dete.show', ['dete' => $dete])}}">Otkaži</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

