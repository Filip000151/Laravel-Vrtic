@extends('layouts.app')

@section('content')
    <div class="container">

        @if(Auth::user()->uloga == 'admin')
        <div class="row justify-content-end mt-2">
            <a class="btn custom-btn" href="{{route('grupa.create')}}">Kreiraj grupu</a>
        </div>
        @endif

        @if(Auth::user()->uloga == 'admin')
        <h2 class="h1 text-center">Grupe</h2>
        @elseif(Auth::user()->uloga == 'vaspitac')
        <h2 class="h1 text-center">Moje grupe</h2>
        @endif
        <div class="row justify-content-center">
            <div style="background-color: #60D2FF; font-size: 20px;" class="col-sm-6 mt-4 p-4">
                @if($grupe->isEmpty())
                <div class="alert alert-danger text-center">
                    Nema grupa.
                </div>
                @else
                <div class="list-group">
                    @foreach($grupe as $grupa)
                    <a class="list-group-item list-group-item-action text-center" href="{{route('grupa.show', ['grupa' => $grupa])}}">{{$grupa->naziv}}</a>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection

