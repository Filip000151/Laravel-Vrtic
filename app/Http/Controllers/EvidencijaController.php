<?php

namespace App\Http\Controllers;

use App\Http\Requests\EvidencijaStoreRequest;
use App\Http\Requests\EvidencijaUpdateRequest;
use App\Models\Evidencija;
use App\Models\Grupa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EvidencijaController extends Controller
{

    public function create(Request $request, Grupa $grupa)
    {
        if(auth()->user()->uloga === 'vaspitac'){
            if(auth()->user()->id !== $grupa->vaspitac_id) {
                abort(403, 'Nemate pravo pristupa ovoj grupi');
            }
        }
        return view('evidencija.create', compact('grupa'));
    }

    public function store(EvidencijaStoreRequest $request)
    {
        $evidencija = Evidencija::create([
            'grupa_id' => $request->grupa_id,
            'datum' => $request->datum
        ]);

        foreach($request->deca as $dete){
            $evidencija->deca()->attach($dete['dete_id'], [
                'status' => $dete['status'],
                'napomena' => $dete['napomena'] ?? null,
            ]);
        }

        return redirect()->route('grupa.show', ['grupa' => $request->grupa_id])->with('success', 'Evidencija uspešno napravljena!');
    }

    public function show(Request $request, Evidencija $evidencija)
    {
        return view('evidencija.show', compact('evidencija'));
    }

    public function edit(Request $request, Evidencija $evidencija)
    {
        if(auth()->user()->uloga === 'vaspitac'){
            if(auth()->user()->id !== $evidencija->grupa->vaspitac->id) {
                abort(403, 'Nemate pravo pristupa ovoj evidenciji');
            }
        }
        return view('evidencija.edit', compact('evidencija'));
    }

    public function update(EvidencijaUpdateRequest $request, Evidencija $evidencija)
    {
        $evidencija->update([
            'datum' => $request->datum
        ]);

        $prisustva = [];

        foreach ($request->deca as $dete_id => $podaci) {
            $prisustva[$dete_id] = [
                'status' => $podaci['status'],
                'napomena' => $podaci['napomena'] ?? null
            ];
        }

        $evidencija->deca()->sync($prisustva);

        return redirect()->route('grupa.show', ['grupa' => $evidencija->grupa, 'tab' => 'evidencije'])->with('success', 'Evidencija uspešno izmenjena!');
    }

    public function destroy(Request $request, Evidencija $evidencija)
    {
        $grupa = $evidencija->grupa;
        $evidencija->delete();

        return redirect()->route('grupa.show', ['grupa' => $grupa, 'tab' => 'evidencije'])->with('success', 'Evidencija je obrisana!');
    }
}
