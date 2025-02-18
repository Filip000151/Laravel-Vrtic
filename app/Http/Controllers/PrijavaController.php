<?php

namespace App\Http\Controllers;

use App\Http\Requests\PrijavaStoreRequest;
use App\Http\Requests\PrijavaUpdateRequest;
use App\Models\Prijava;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Carbon\Carbon;

class PrijavaController extends Controller
{
    public function index(Request $request)
    {
        $prijavas = Prijava::all();

        return view('prijava.index', [
            'prijavas' => $prijavas,
        ]);
    }

    public function create(Request $request)
    {
        return view('prijava.create');
    }

    public function store(PrijavaStoreRequest $request)
    {
        $podaci = $request->validated();
        $podaci['datum_prijave'] = Carbon::today();
        $prijava = Prijava::create($podaci);

        session()->flash('success', 'Prijava je uspešno podneta!');

        return redirect()->route('prijavas.create');
    }

    public function show(Request $request, Prijava $prijava)
    {
        return view('prijava.show', [
            'prijava' => $prijava,
        ]);
    }

    public function edit(Request $request, Prijava $prijava)
    {
        return view('prijava.edit', [
            'prijava' => $prijava,
        ]);
    }

    public function update(PrijavaUpdateRequest $request, Prijava $prijava)
    {
        $prijava->update($request->validated());

        $request->session()->flash('prijava.id', $prijava->id);

        return redirect()->route('prijavas.index');
    }

    public function destroy(Request $request, Prijava $prijava)
    {
        $prijava->delete();

        return redirect()->route('prijavas.index');
    }
}
