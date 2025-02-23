@extends('layouts.app')

@section('content')
    <div class="container">

        @if(Auth::user()->uloga == 'admin')
        <div class="row justify-content-end mt-2">
            <a class="btn custom-btn" href="{{route('grupas.create')}}">Kreiraj grupu</a>
        </div>
        @endif

        <h2 class="h1 text-center">Grupe</h2>

        <div class="row justify-content-center">
            <div style="background-color: #60D2FF; font-size: 20px;" class="col-sm-6 mt-4 p-4">
                @if($grupas->isEmpty())
                <div class="alert alert-danger text-center">
                    Nema grupa.
                </div>
                @else
                <div class="list-group">
                    @foreach($grupas as $grupa)
                    <a class="list-group-item list-group-item-action text-center" href="{{route('grupas.show', ['grupa' => $grupa])}}">{{$grupa->naziv}}</a>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection

