@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="h1 text-center">{{$grupa->naziv}}</h2>
        <h3 class="text-center">Nova evidencija</h3>

        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        <div class="row justify-content-center">
            <div style="background-color: #60D2FF; font-size: 20px;" class="col-sm-9 p-4 mt-4">
                <form method="POST" action="{{route('evidencijas.store')}}">
                    @csrf
                    <input type="hidden" name="grupa_id" value="{{$grupa->id}}">
                    <div class="form-group row mb-3 mt-3 align-items-center">
                        <label class="col-auto col-form-label">Datum:</label>
                        <div class="col">
                            <input type="date" name="datum" class="form-control" required>
                        </div>
                    </div>

                    <hr class="custom-hr">

                    @if($grupa->deca->isEmpty())

                    <div class="alert alert-danger text-center">
                        Nema dece u grupi.
                    </div>

                    @else

                    @foreach($grupa->deca as $dete)
                    <div class="mb-5">
                        <h3 class="mt-3 text-center">{{$dete->ime}} {{$dete->prezime}}</h3>
                        <input type="hidden" name="deca[{{$dete->id}}][dete_id]" value="{{$dete->id}}">
                        <div class="row justify-content-around">
                            <div class="form-check-inline pl-3 col-auto">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="deca[{{$dete->id}}][status]" value="odsutan" checked>Odsutan
                                </label>
                            </div>
                            <div class="form-check-inline pl-3 col-auto">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="deca[{{$dete->id}}][status]" value="prisutan">Prisutan
                                </label>
                            </div>
                            <div class="form-check-inline pl-3 col-auto">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="deca[{{$dete->id}}][status]" value="opravdano">Opravdano
                                </label>
                            </div>
                            
                        </div>
                        <div class="form-group row align-items-center col pt-3">
                            <label class="col-auto col-form-label">Napomena:</label>
                            <div class="col">
                                <input type="text" name="deca[{{$dete->id}}][napomena]" class="form-control" placeholder="Unesite napomenu">
                            </div>
                        </div>
                    </div>

                    @endforeach

                    @endif

                    <div class="row justify-content-around mt-5">
                        <button type="submit" class="btn custom-btn">Potvrdi</button>
                        <a href="{{route('grupas.show', ['grupa' => $grupa])}}" class="btn custom-btn2">Otkaži</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
