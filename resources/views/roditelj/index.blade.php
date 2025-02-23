@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="h1 text-center">Roditelji</h2>

        <div class="row justify-content-center">
            <div style="background-color: #60D2FF; font-size: 20px;" class="col-sm-9 mt-4 p-4">
                @if($roditelji->isEmpty())
                <div class="alert alert-danger text-center">
                    Nema roditelja.
                </div>
                @else
                <div class="list-group">
                    @foreach($roditelji as $roditelj)
                    <a class="list-group-item list-group-item-action" href="{{route('roditeljs.show', ['roditelj' => $roditelj])}}">{{$roditelj->ime}} {{$roditelj->prezime}}</a>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection

