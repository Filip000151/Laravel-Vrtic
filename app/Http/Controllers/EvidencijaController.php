<?php

namespace App\Http\Controllers;

use App\Http\Requests\EvidencijaStoreRequest;
use App\Http\Requests\EvidencijaUpdateRequest;
use App\Models\Evidencija;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EvidencijaController extends Controller
{
    public function index(Request $request)
    {
        $evidencijas = Evidencija::all();

        return view('evidencija.index', [
            'evidencijas' => $evidencijas,
        ]);
    }

    public function create(Request $request)
    {
        return view('evidencija.create');
    }

    public function store(EvidencijaStoreRequest $request)
    {
        $evidencija = Evidencija::create($request->validated());

        $request->session()->flash('evidencija.id', $evidencija->id);

        return redirect()->route('evidencijas.index');
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
        $evidencija->update($request->validated());

        $request->session()->flash('evidencija.id', $evidencija->id);

        return redirect()->route('evidencijas.index');
    }

    public function destroy(Request $request, Evidencija $evidencija)
    {
        $evidencija->delete();

        return redirect()->route('evidencijas.index');
    }
}
