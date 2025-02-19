@extends('layouts.app')

@section('content')
    <div class="container">
        @if($prijava->status == 'nepotvrdjen')
        <h2 class="text-center">Nepotvrđena prijava</h2>
        @elseif($prijava->status == 'potvrdjen')
        <h2 class="text-center">Potvrđena prijava</h2>
        @else
        <h2 class="text-center">Odbijena prijava</h2>
        @endif

        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="row justify-content-center">
            <div style="font-size: 18px; background-color: #60D2FF;" class="col-sm-10 p-5 mt-4">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        Prijavljeno: <inline class="font-weight-bold">{{$prijava->datum_prijave->format('d.m.Y.')}}</inline>
                    </div>
                    <div class="col-auto">
                        Status prijave: <inline class="font-weight-bold">{{$prijava->status}}</inline>
                    </div>
                </div>
                <div class="row justify-content-between mt-5">
                    <div class="col-auto">
                        <p>Dete: <inline class="font-weight-bold">{{$prijava->ime_dete}} {{$prijava->prezime_dete}}</inline></p>
                        <p>Datum rođenja: <inline class="font-weight-bold">{{$prijava->datum_rodjenja->format('d.m.Y.')}}</inline></p>
                        <p>JMBG: <inline class="font-weight-bold">{{$prijava->jmbg_dete}}</inline></p>
                    </div>
                    <div class="col-auto">
                        <p>Roditelj: <inline class="font-weight-bold">{{$prijava->ime_roditelj}} {{$prijava->prezime_roditelj}}</inline></p>
                        <p>Broj telefona: <inline class="font-weight-bold">{{$prijava->broj_telefona}}</inline></p>
                        <p>JMBG: <inline class="font-weight-bold">{{$prijava->jmbg_roditelj}}</inline></p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-auto">
                        <inline class="font-weight-bold">Napomene:</inline>
                        @if(!empty($prijava->napomene))
                        <p>{{$prijava->napomene}}</p>
                        @else
                        <p>Nema napomena.</p>
                        @endif
                    </div>
                </div>
                @if($prijava->status == 'nepotvrdjen')
                <div class="row mt-5 justify-content-end">
                    <form class="col-sm-1" method="POST" action="{{route('prijavas.odbij', ['prijava' => $prijava->id])}}" onsubmit="return confirm('Odbij prijavu?');">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn custom-btn2">Odbij</button>
                    </form>
                    <form class="col-sm-1" method="POST" action="{{route('prijavas.potvrdi', ['prijava' => $prijava->id])}}" onsubmit="return confirm('Potvrdi prijavu?');">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn custom-btn">Potvrdi</button>
                    </form>
                </div>
                @elseif($prijava->status == 'potvrdjen')
                <div class="row justify-content-end mt-5">
                    <div class="col-auto">
                        <p>Potvrdio: <inline class="font-weight-bold">{{$prijava->administrator->ime}} {{$prijava->administrator->prezime}}</inline></p>
                    </div>
                </div>
                @else
                <div class="row justify-content-end mt-5">
                    <div class="col-auto">
                        <p>Odbio: <inline class="font-weight-bold">{{$prijava->administrator->ime}} {{$prijava->administrator->prezime}}</inline></p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection

