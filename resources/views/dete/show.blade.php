@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="h1 text-center">{{$dete->ime}} {{$dete->prezime}}</h2>

        <div class="row justify-content-center">
            <div style="background-color: #60D2FF;" class="col-sm-9 mt-4 p-4">
                <div style="font-size: 20px;" class="row justify-content-between">
                    <div class="col-sm-6">
                        <p>Datum rođenja: <inline class="font-weight-bold">{{$dete->datum_rodjenja->format('d.m.Y.')}}</inline></p>
                        <p>JMBG: <inline class="font-weight-bold">{{$dete->jmbg}}</inline></p>
                        <p class="font-weight-bold">Napomene:</p>
                        @if(is_null($dete->napomene))
                        <p>Nema napomena.</p>
                        @else
                        <p>{{$dete->napomene}}</p>
                        @endif
                    </div>
                    <div class="col-sm-6">
                        <p>Roditelj: <inline class="font-weight-bold">{{$dete->roditelj->ime}} {{$dete->roditelj->prezime}}</inline></p>
                        @if(is_null($dete->grupa))
                        <p>Grupa: <inline class="text-danger">Negrupisan!</inline></p>
                        @else
                        <p>Grupa: <inline class="font-weight-bold">{{$dete->grupa->naziv}}</inline></p>
                        @endif
                    </div>
                </div>
                @if(Auth::user()->uloga == 'admin')
                <div class="row justify-content-around">
                    <div class="col-auto">
                        <a class="btn custom-btn" href="{{route('detes.edit', ['dete' => $dete])}}">Izmeni grupu</a>
                    </div>
                    <div class="col-auto">
                        <form action="{{route('detes.destroy', ['dete' => $dete])}}" method="POST" onsubmit="return confirm('Ispiši dete?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn custom-btn2" type="submit">Ispiši</button>
                        </form>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection

