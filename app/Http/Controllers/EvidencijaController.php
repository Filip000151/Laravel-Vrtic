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
    public function index(Request $request)
    {
        $evidencijas = Evidencija::all();

        return view('evidencija.index', [
            'evidencijas' => $evidencijas
        ]);
    }

    public function create(Request $request, Grupa $grupa)
    {
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

        return redirect()->route('grupas.show', ['grupa' => $request->grupa_id])->with('success', 'Evidencija uspešno napravljena!');
    }

    public function show(Request $request, Evidencija $evidencija)
    {
        return view('evidencija.show', [
            'evidencija' => $evidencija,
        ]);
    }

    public function edit(Request $request, Evidencija $evidencija)
    {
        return view('evidencija.edit', [
            'evidencija' => $evidencija,
        ]);
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

        return redirect()->route('grupas.show', ['grupa' => $evidencija->grupa, 'tab' => 'evidencije'])->with('success', 'Evidencija uspešno izmenjena!');
    }

    public function destroy(Request $request, Evidencija $evidencija)
    {
        $grupa = $evidencija->grupa;
        $evidencija->delete();

        return redirect()->route('grupas.show', ['grupa' => $grupa, 'tab' => 'evidencije'])->with('success', 'Evidencija je obrisana!');
    }
}
