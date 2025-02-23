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
                    <a class="btn custom-btn3" href="{{route('evidencijas.index')}}">Evidencije</a>
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
    </div>
@endsection

