@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-end">
            <a href="{{route('evidencijas.edit', ['evidencija' => $evidencija])}}" class="btn custom-btn mr-3">Izmeni</a>
            @if(Auth::user()->uloga == 'admin')
            <form method="POST" action="{{route('evidencijas.destroy', ['evidencija' => $evidencija])}}" onsubmit="return confirm('Obriši evidenciju?');">
                @csrf
                @method('DELETE')
                <button class="btn custom-btn2">Obriši</button>
            </form>
            @endif
        </div>

        <h2 class="h1 text-center">Evidencija prisustva</h2>
        <h3 class="text-center">{{$evidencija->grupa->naziv}}</h3>

        <div class="row justify-content-center">
            <div style="background-color: #60D2FF; font-size: 20px;" class="col-sm-9 p-4 mt-4">
                <h3 class="text-center">Datum: <inline class="font-weight-bold">{{$evidencija->datum->format('d.m.Y.')}}</inline></h3>

                <table style="color: #3C23AB;" class="table">
                    <thead>
                        <tr>
                            <th>Dete</th>
                            <th>Prisustvo</th>
                            <th>Napomena</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($evidencija->deca as $dete)
                        <tr>
                            <td>{{$dete->ime}} {{$dete->prezime}}</td>
                            @if($dete->pivot->status == 'prisutan')
                            <td class="text-success">Prisutan</td>
                            @elseif($dete->pivot->status == 'odsutan')
                            <td class="text-danger">Odsutan</td>
                            @else
                            <td class="text-primary">Opravdano</td>
                            @endif

                            @if(isset($dete->pivot->napomena))
                            <td>{{$dete->pivot->napomena}}</td>
                            @else
                            <td>Nema</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
