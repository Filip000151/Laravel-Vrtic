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
    public function index(Request $request): Response
    {
        $evidencijas = Evidencija::all();

        return view('evidencija.index', [
            'evidencijas' => $evidencijas,
        ]);
    }

    public function create(Request $request): Response
    {
        return view('evidencija.create');
    }

    public function store(EvidencijaStoreRequest $request): Response
    {
        $evidencija = Evidencija::create($request->validated());

        $request->session()->flash('evidencija.id', $evidencija->id);

        return redirect()->route('evidencijas.index');
    }

    public function show(Request $request, Evidencija $evidencija): Response
    {
        return view('evidencija.show', [
            'evidencija' => $evidencija,
        ]);
    }

    public function edit(Request $request, Evidencija $evidencija): Response
    {
        return view('evidencija.edit', [
            'evidencija' => $evidencija,
        ]);
    }

    public function update(EvidencijaUpdateRequest $request, Evidencija $evidencija): Response
    {
        $evidencija->update($request->validated());

        $request->session()->flash('evidencija.id', $evidencija->id);

        return redirect()->route('evidencijas.index');
    }

    public function destroy(Request $request, Evidencija $evidencija): Response
    {
        $evidencija->delete();

        return redirect()->route('evidencijas.index');
    }
}
