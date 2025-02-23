<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeteStoreRequest;
use App\Http\Requests\DeteUpdateRequest;
use App\Models\Dete;
use App\Models\Roditelj;
use App\Models\Grupa;
use App\Models\Prijava;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DeteController extends Controller
{
    public function index(Request $request)
    {
        $grupa = $request->query('grupa', 'negrupisana');

        if($grupa === 'grupisana'){
            $deca = Dete::whereNotNull('grupa_id')->orderBy('updated_at', 'desc');
        }
        elseif($grupa === 'negrupisana'){
            $deca = Dete::whereNull('grupa_id')->orderBy('updated_at', 'desc');
        }

        return view('dete.index', ['deca' => $deca->get(), 'grupa' => $grupa]);
    }

    public function create(Request $request)
    {
        return view('dete.create');
    }

    public function store(DeteStoreRequest $request)
    {
        $dete = Dete::create($request->validated());

        $request->session()->flash('dete.id', $dete->id);

        return redirect()->route('detes.index');
    }

    public function show(Request $request, Dete $dete)
    {
        return view('dete.show', [
            'dete' => $dete,
        ]);
    }

    public function edit(Request $request, Dete $dete)
    {
        $roditelji = Roditelj::all();
        $grupe = Grupa::all();
        return view('dete.edit', [
            'dete' => $dete,
            'roditelji' => $roditelji,
            'grupe' => $grupe
        ]);
    }

    public function update(DeteUpdateRequest $request, Dete $dete)
    {
        if($request->grupa == 'negrupisan'){
            $dete->update([
                'ime' => $request->ime,
                'prezime' => $request->prezime,
                'datum_rodjenja' => $request->datum_rodjenja,
                'jmbg' => $request->jmbg,
                'grupa_id' => null,
                'napomene' => $request->napomene
            ]);
        }
        else{
            $dete->update([
                'ime' => $request->ime,
                'prezime' => $request->prezime,
                'datum_rodjenja' => $request->datum_rodjenja,
                'jmbg' => $request->jmbg,
                'grupa_id' => $request->grupa,
                'napomene' => $request->napomene
            ]);
        }

        return redirect()->route('detes.index')->with('success', 'Dete je ažurirano!');
    }

    public function destroy(Request $request, Dete $dete)
    {
        $roditelj = $dete->roditelj;

        $broj_dece = $roditelj->deca()->count();

        if($broj_dece == 1){
            $roditelj->delete();
        }

        $jmbg = $dete->jmbg;

        $dete->delete();

        $prijava = Prijava::where('jmbg_dete', $jmbg)->where('status', 'potvrdjen');

        $prijava->update([
            'status' => 'ispisan'
        ]);

        return redirect()->route('detes.index')->with('success', 'Dete je ispisano!');
    }
}
