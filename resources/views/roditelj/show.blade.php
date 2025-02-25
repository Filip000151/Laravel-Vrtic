@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="h1 text-center">{{$roditelj->ime}} {{$roditelj->prezime}}</h2>
        @if(Auth::user()->uloga == 'admin')
        <div class="row justify-content-center mt-4">
            <a class="btn custom-btn" href="{{route('roditelj.edit', ['roditelj' => $roditelj])}}">Izmeni</a>
        </div>
        @endif
        <div class="row justify-content-center">
            <div style="background-color: #60D2FF; font-size: 20px;" class="col-sm-9 mt-4 p-4">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <p>Broj telefona: <inline class="font-weight-bold">{{$roditelj->broj_telefona}}</inline></p>
                    </div>
                    <div class="col-auto">
                        <p>JMBG: <inline class="font-weight-bold">{{$roditelj->jmbg}}</inline></p>
                    </div>
                </div>
                <h3 class="text-center mt-3">Deca</h3>
                <div class="row p-3 justify-content-center">
                    <div class="list-group">
                        @foreach($roditelj->deca as $dete)
                        <a class="list-group-item list-group-item-action" href="{{route('dete.show', ['dete' => $dete])}}">{{$dete->ime}} {{$dete->prezime}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

