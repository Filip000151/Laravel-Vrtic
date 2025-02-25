<?php

namespace App\Http\Controllers;

use App\Http\Requests\PrijavaStoreRequest;
use App\Models\Prijava;
use App\Models\Dete;
use App\Models\Roditelj;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PrijavaController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status', 'nepotvrdjen');
        $prijavas = Prijava::where('status', $status)->orderBy('datum_prijave', 'desc')->get();
        return view('prijava.index', compact('prijavas', 'status'));
    }

    public function create(Request $request)
    {
        return view('prijava.create');
    }

    public function store(PrijavaStoreRequest $request)
    {
        $podaci = $request->validated();
        $podaci['datum_prijave'] = Carbon::today();
        Prijava::create($podaci);

        session()->flash('success', 'Prijava je uspešno podneta!');

        return redirect()->route('prijava.create');
    }

    public function show(Request $request, Prijava $prijava)
    {
        return view('prijava.show', compact('prijava'));
    }

    public function odbij(Prijava $prijava){
        $prijava->update([
            'status' => 'odbijen',
            'administrator_id' => auth()->id()
        ]);

        return redirect()->route('prijava.index', ['status' => 'odbijen'])->with('success', 'Prijava je odbijena!');
    }

    public function potvrdi(Prijava $prijava){
        DB::beginTransaction();

        try{
            $roditelj = Roditelj::where('jmbg', $prijava->jmbg_roditelj)->first();

            if(!$roditelj){
                $roditelj = Roditelj::create([
                    'ime' => $prijava->ime_roditelj,
                    'prezime' => $prijava->prezime_roditelj,
                    'broj_telefona' => $prijava->broj_telefona,
                    'jmbg' => $prijava->jmbg_roditelj
                ]);
            }

            $dete = Dete::where('jmbg', $prijava->jmbg_dete)->first();
            
            if($dete){
                return redirect()->back()->withErrors(['error' => 'Dete sa ovim JMBG-om već postoji u bazi!']);
            }

            $dete = Dete::create([
                'ime' => $prijava->ime_dete,
                'prezime' => $prijava->prezime_dete,
                'datum_rodjenja' => $prijava->datum_rodjenja,
                'jmbg' => $prijava->jmbg_dete,
                'napomene' => $prijava->napomene,
                'roditelj_id' => $roditelj->id
            ]);

            $prijava->update([
                'status' => 'potvrdjen',
                'administrator_id' => auth()->id()
            ]);

            DB::commit();

            return redirect()->route('prijava.index', ['status' => 'potvrdjen'])->with('success', 'Prijava je uspešno potvrđena!');
        } 
        catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Desila se greška!']);
        }
    }
}
