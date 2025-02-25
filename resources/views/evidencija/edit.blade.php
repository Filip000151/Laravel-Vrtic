@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="h1 text-center">Izmena evidencije</h2>
        <h3 class="text-center">{{$evidencija->grupa->naziv}}</h3>

        <div class="row justify-content-center">
            <div style="background-color: #60D2FF; font-size: 20px;" class="col-sm-9 p-4 mt-4">
                <form method="POST" action="{{route('evidencija.update', ['evidencija' => $evidencija])}}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="grupa_id" value="{{$evidencija->grupa->id}}">
                    <div class="form-group row mb-3 mt-3 align-items-center">
                        <label class="col-auto col-form-label">Datum:</label>
                        <div class="col">
                            <input type="date" name="datum" class="form-control" value="{{old('datum', $evidencija->datum->format('Y-m-d'))}}" required>
                        </div>
                    </div>

                    <hr class="custom-hr">

                    @foreach($evidencija->deca as $dete)
                    <div class="mb-5">
                        <h3 class="mt-3 text-center">{{$dete->ime}} {{$dete->prezime}}</h3>
                        <div class="row justify-content-around">
                            <div class="form-check-inline pl-3 col-auto">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="deca[{{$dete->id}}][status]" value="odsutan" {{old('deca.$dete->id.status', $dete->pivot->status) == 'odsutan' ? 'checked' : ''}}>Odsutan
                                </label>
                            </div>
                            <div class="form-check-inline pl-3 col-auto">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="deca[{{$dete->id}}][status]" value="prisutan" {{old('deca.$dete->id.status', $dete->pivot->status) == 'prisutan' ? 'checked' : ''}}>Prisutan
                                </label>
                            </div>
                            <div class="form-check-inline pl-3 col-auto">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="deca[{{$dete->id}}][status]" value="opravdano" {{old('deca.$dete->id.status', $dete->pivot->status) == 'opravdano' ? 'checked' : ''}}>Opravdano
                                </label>
                            </div>
                            
                        </div>
                        <div class="form-group row align-items-center col pt-3">
                            <label class="col-auto col-form-label">Napomena:</label>
                            <div class="col">
                                <input type="text" name="deca[{{$dete->id}}][napomena]" class="form-control" placeholder="Unesite napomenu" value="{{old('deca.$dete->id.napomena', $dete->pivot->napomena)}}">
                            </div>
                        </div>
                    </div>

                    @endforeach

                    <div class="row justify-content-around mt-5">
                        <button type="submit" class="btn custom-btn">Potvrdi</button>
                        <a href="{{route('grupa.show', ['grupa' => $evidencija->grupa])}}" class="btn custom-btn2">Otkaži</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection