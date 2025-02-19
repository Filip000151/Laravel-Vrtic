@extends('layouts.app')

@section('content')
    <style>
        .table thead tr{
            border-bottom: 3px solid #3C23AB;
            border-top: 2px solid #3C23AB;
        }
        .table tbody tr{
            border-top: 2px solid #3C23AB;
        }
        .custom-link{
            color: #3C23AB;
        }
        .nav-tabs{
            border-bottom: solid 2px #3C23AB !important;
        }
        .custom-link:hover{
            color: #60D2FF !important;
            border: 2px solid #60D2FF !important;
        }
        .custom-link.active{
            background-color: #1FBFFE !important;
            border: #1FBFFE !important;
            color: #3C23AB !important;
        }
    </style>
    
    <div class="container">
        <h2 class="text-center">Prijave</h2>
        <ul style="font-size: 16px" class="nav nav-tabs justify-content-center mt-5">
            <li class="nav-item">
                <a class="nav-link custom-link {{$status === 'nepotvrdjen' ? 'active disabled' : ''}}" href="{{route('prijavas.index', ['status' => 'nepotvrdjen'])}}">Nepotvrđene</a>
            </li>
            <li class="nav-item">
                <a class="nav-link custom-link {{$status === 'potvrdjen' ? 'active disabled' : ''}}" href="{{route('prijavas.index', ['status' => 'potvrdjen'])}}">Potvrđene</a>
            </li>
            <li class="nav-item">
                <a class="nav-link custom-link {{$status === 'odbijen' ? 'active disabled' : ''}}" href="{{route('prijavas.index', ['status' => 'odbijen'])}}">Odbijene</a>
            </li>
        </ul>

        @if($prijavas->isEmpty())
        <div class="alert alert-danger text-center">
            Nema prijava.
        </div>

        @else

        <div style="font-size: 16px" class="row justify-content-center mt-3">
            <div style="background-color: #60D2FF;" class="col-sm-9 p-4">
                <table style="color: #3C23AB;" class="table">
                    <thead>
                        <tr>
                            <th>Datum prijave</th>
                            <th>Ime deteta</th>
                            <th>Prezime deteta</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($prijavas as $prijava)
                        <tr>
                            <td>{{$prijava->datum_prijave->format('d.m.Y.')}}</td>
                            <td>{{$prijava->ime_dete}}</td>
                            <td>{{$prijava->prezime_dete}}</td>
                            <td><a class="btn custom-btn" href="{{route('prijavas.show', ['prijava' => $prijava])}}">Detaljnije</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @endif
    </div>

@endsection
