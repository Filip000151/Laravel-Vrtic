@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="h1 text-center">{{$user->ime}} {{$user->prezime}}</h2>
        @if($user->uloga == 'admin')
        <h3 class="text-center">Administrator</h3>
        @else
        <h3 class="text-center">Vaspitač</h3>
        @endif


        <div class="row mt-4 justify-content-center">
            <div style="background-color: #60D2FF;" class="col-sm-10 mt-4 p-4">
                <div class="row justify-content-between">
                    <h3 class="col-sm-6">Informacije:</h3>
                    @if($user->uloga == 'vaspitac')
                    <h3 class="col-sm-6">Grupe:</h3>
                    @else
                    <h3 class="col-sm-6">Prijave:</h3>
                    @endif
                </div>
                <div style="font-size: 20px;" class="row justify-content-between mt-3">
                    <div class="col-sm-6">
                        <p>Email: <inline class="font-weight-bold">{{$user->email}}</inline></p>
                        <p>Broj telefona: <inline class="font-weight-bold">{{$user->broj_telefona}}</inline></p>
                    </div>
                    <div class="col-sm-6 list-group">
                        @if($user->uloga == 'vaspitac')
                            @if($user->grupe->isEmpty())
                                <div class="alert alert-danger text-center">
                                    Nema grupa.
                                </div>
                            @else
                                @foreach($user->grupe as $grupa)
                                <a href="{{route('grupas.show', ['grupa' => $grupa])}}" class="list-group-item list-group-item-action text-center">{{$grupa->naziv}}</a>
                                @endforeach
                            @endif
                        @else
                            @if($user->prijave->isEmpty())
                                <div class="alert alert-danger text-center">
                                    Nema potvrđenih/odbijenih prijava.
                                </div>
                            @else
                                @foreach($user->prijave as $prijava)
                                <a href="{{route('prijavas.show', ['prijava' => $prijava])}}" class="list-group-item list-group-item-action text-center">
                                    @if($prijava->status == 'potvrdjen' || $prijava->status == 'ispisan')
                                    (✓) {{$prijava->ime_dete}} {{$prijava->prezime_dete}} - {{$prijava->datum_prijave->format('d.m.Y.')}}
                                    @else
                                    (✗) {{$prijava->ime_dete}} {{$prijava->prezime_dete}} - {{$prijava->datum_prijave->format('d.m.Y.')}}
                                    @endif
                                </a>
                                @endforeach
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

