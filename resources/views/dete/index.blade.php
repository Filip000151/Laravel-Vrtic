@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="h1 text-center">Deca</h2>

        <ul style="font-size: 16px" class="nav nav-tabs justify-content-center mt-5">
            <li class="nav-item">
                <a class="nav-link custom-link {{$grupa === 'negrupisana' ? 'active disabled' : ''}}" href="{{route('detes.index', ['grupa' => 'negrupisana'])}}">Negrupisana</a>
            </li>
            <li class="nav-item">
                <a class="nav-link custom-link {{$grupa === 'grupisana' ? 'active disabled' : ''}}" href="{{route('detes.index', ['grupa' => 'grupisana'])}}">Grupisana</a>
            </li>
        </ul>

        <div class="row justify-content-center">
            <div style="background-color: #60D2FF; font-size: 20px;" class="col-sm-9 p-4 mt-4">
                @if($deca->isEmpty())
                <div class="alert alert-danger text-center">
                    Nema dece.
                </div>
                @else
                <div class="list-group">
                    @foreach($deca as $dete)
                    <a class="list-group-item list-group-item-action" href="{{route('detes.show', ['dete' => $dete])}}">{{$dete->ime}} {{$dete->prezime}}</a>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection

