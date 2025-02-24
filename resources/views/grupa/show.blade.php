@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="h1 text-center">{{$grupa->naziv}}</h2>
        <h5 class="text-center">{{$grupa->vaspitac->ime}} {{$grupa->vaspitac->prezime}}</h5>

        <div class="row justify-content-center">
            <div class="col-sm-5 mt-4">
                <div class="row justify-content-around">
                    @if(Auth::user()->uloga == 'admin')
                    <a class="btn custom-btn" href="{{route('grupas.edit', ['grupa' => $grupa])}}">Izmeni</a>
                    @endif
                    <a class="btn custom-btn3" href="{{route('evidencija.create', ['grupa' => $grupa])}}">Napravi evidenciju</a>
                    @if(Auth::user()->uloga == 'admin')
                    <form method="POST" action="{{route('grupas.destroy', ['grupa' => $grupa])}}" onsubmit="return confirm('Obriši grupu?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn custom-btn2" type="submit">Ukloni</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>

        <ul style="font-size: 16px" class="nav nav-tabs justify-content-center mt-5">
            <li class="nav-item">
                <a href="{{route('grupas.show', ['grupa' => $grupa, 'tab' => 'deca'])}}" class="nav-link custom-link {{request('tab', 'deca') == 'deca' ? 'active disabled' : ''}}">Deca</a>
            </li>
            <li class="nav-item">
                <a href="{{route('grupas.show', ['grupa' => $grupa, 'tab' => 'evidencije'])}}" class="nav-link custom-link {{request('tab') == 'evidencije' ? 'active disabled' : ''}}">Evidencije</a>
            </li>
        </ul>
        
        @if(request('tab', 'deca') == 'deca')
        <div class="row justify-content-center">
            <div style="background-color: #60D2FF; font-size: 20px;" class="col-sm-9 mt-4 p-4">
                <div class="row justify-content-center mb-4">
                    <h3>Deca</h3>
                </div>
                @if($grupa->deca->isEmpty())
                <div class="alert alert-danger text-center">
                    Grupa je prazna.
                </div>
                @else
                <div class="list-group">
                    @foreach($grupa->deca as $dete)
                    <a class="list-group-item list-group-item-action text-center" href="{{route('detes.show', ['dete' => $dete])}}">{{$dete->ime}} {{$dete->prezime}}</a>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
        @else
        <div class="row justify-content-center">
            <div style="background-color: #60D2FF; font-size: 20px;" class="col-sm-9 mt-4 p-4">
                <div class="row justify-content-center mb-4">
                    <h3>Evidencije</h3>
                </div>
                @if($grupa->evidencije->isEmpty())
                <div class="alert alert-danger text-center">
                    Grupa nema evidencije.
                </div>
                @else
                <div class="list-group">
                    @foreach($grupa->evidencije as $evidencija)
                    <a class="list-group-item list-group-item-action text-center" href="{{route('evidencijas.show', ['evidencija' => $evidencija])}}">{{$evidencija->datum->format('d.m.Y.')}}</a>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
        @endif
    </div>
@endsection

