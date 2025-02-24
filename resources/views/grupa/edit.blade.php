@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="h1 text-center">{{$grupa->naziv}}</h2>

        <div class="row justify-content-center">
            <div style="background-color: #60D2FF;" class="col-sm-9 mt-4 p-4">
                <form action="{{route('grupas.update', ['grupa' => $grupa])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row justify-content-center">
                        <div class="col-sm-9">
                            <div class="form-group row mb-3 mt-3 align-items-center">
                                <label class="col-auto col-form-label">Naziv:</label>
                                <div class="col">
                                    <input type="text" name="naziv" class="form-control" value="{{old('naziv', $grupa->naziv)}}" required>
                                </div>
                            </div>
                            <div class="form-group row mb-3 align-items-center">
                                <label class="col-auto col-form-label">Vaspitač:</label>
                                <div class="col">
                                    <select name="vaspitac_id" class="custom-select">
                                        @foreach($vaspitaci as $vaspitac)
                                        <option value="{{$vaspitac->id}}" {{old('vaspitac_id', $grupa->vaspitac->id) == $vaspitac->id ? 'selected' : ''}}>{{$vaspitac->ime}} {{$vaspitac->prezime}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row justify-content-between mt-5">
                                <div class="form-group col-auto">
                                    <h3 class="text-center">Deca u ovoj grupi:</h3>
                                    @if($grupisani->isEmpty())
                                        <div class="alert alert-danger text-center">
                                            Grupa je prazna.
                                        </div>
                                    @else
                                        @foreach($grupisani as $dete)
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="deca[]" value="{{$dete->id}}" checked>{{$dete->ime}} {{$dete->prezime}}
                                            </label>
                                        </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="form-group col-auto">
                                    <h3 class="text-center">Negrupisana deca:</h3>
                                    @if($negrupisani->isEmpty())
                                        <div class="alert alert-danger text-center">
                                            Nema dece.
                                        </div>
                                    @else
                                        @foreach($negrupisani as $dete)
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="deca[]" value="{{$dete->id}}">{{$dete->ime}} {{$dete->prezime}}
                                            </label>
                                        </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="row justify-content-around mt-4">
                                <button class="btn custom-btn" type="submit">Izmeni</button>
                                <a class="btn custom-btn2" href="{{route('grupas.show', ['grupa' => $grupa])}}">Otkaži</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

