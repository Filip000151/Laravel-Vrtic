@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="h1 text-center">Nova grupa</h2>

        <div class="row justify-content-center">
            <div style="background-color: #60D2FF;" class="col-sm-8 mt-4 p-4">
                <form method="POST" action="{{route('grupas.store')}}">
                    @csrf
                    <div class="form-group row mb-3 mt-3 align-items-center">
                        <label class="col-auto col-form-label">Naziv:</label>
                        <div class="col">
                            <input type="text" name="naziv" class="form-control" placeholder="Unesite naziv grupe" required>
                        </div>
                    </div>
                    <div class="form-group row mb-3 align-items-center">
                        <label class="col-auto col-form-label">Vaspitač:</label>
                        <div class="col">
                            <select name="vaspitac_id" class="custom-select">
                                @foreach($vaspitaci as $vaspitac)
                                <option value="{{$vaspitac->id}}">{{$vaspitac->ime}} {{$vaspitac->prezime}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-around mt-5">
                        <button class="btn custom-btn" type="submit">Kreiraj</button>
                        <a class="btn custom-btn2" href="{{route('grupas.index')}}">Otkaži</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

