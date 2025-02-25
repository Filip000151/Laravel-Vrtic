<?php

namespace App\Http\Controllers;

use App\Http\Requests\GrupaStoreRequest;
use App\Http\Requests\GrupaUpdateRequest;
use App\Models\Grupa;
use App\Models\User;
use App\Models\Dete;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GrupaController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();

        if($user->uloga === 'admin'){
            $grupe = Grupa::all();
        }
        elseif($user->uloga === 'vaspitac'){
            $grupe = $user->grupe;
        }

        return view('grupa.index', compact('grupe'));
    }

    public function create(Request $request)
    {
        $vaspitaci = User::where('uloga', 'vaspitac')->get();
        return view('grupa.create', compact('vaspitaci'));
    }

    public function store(GrupaStoreRequest $request)
    {
        Grupa::create($request->validated());

        return redirect()->route('grupa.index')->with('success', 'Grupa je kreirana!');
    }

    public function show(Request $request, Grupa $grupa)
    {
        return view('grupa.show', compact('grupa'));
    }

    public function edit(Request $request, Grupa $grupa)
    {
        $vaspitaci = User::where('uloga', 'vaspitac')->get();
        $negrupisani = Dete::where('grupa_id', null)->get();
        $grupisani = Dete::where('grupa_id', $grupa->id)->get();
        return view('grupa.edit', compact('grupa', 'vaspitaci', 'negrupisani', 'grupisani'));
    }

    public function update(GrupaUpdateRequest $request, Grupa $grupa)
    {
        $grupa->update([
            'naziv' => $request->naziv,
            'vaspitac_id' => $request->vaspitac_id
        ]);

        Dete::where('grupa_id', $grupa->id)->update([
            'grupa_id' => null
        ]);

        if($request->has('deca')){
            Dete::whereIn('id', $request->deca)->update([
                'grupa_id' => $grupa->id
            ]);
        }

        return redirect()->route('grupa.show', ['grupa' => $grupa])->with('success', 'Grupa uspešno ažurirana!');
    }

    public function destroy(Request $request, Grupa $grupa)
    {
        $grupa->delete();

        return redirect()->route('grupa.index')->with('success', 'Grupa je obrisana!');
    }
}
