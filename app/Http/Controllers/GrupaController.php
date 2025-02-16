<?php

namespace App\Http\Controllers;

use App\Http\Requests\GrupaStoreRequest;
use App\Http\Requests\GrupaUpdateRequest;
use App\Models\Grupa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GrupaController extends Controller
{
    public function index(Request $request): Response
    {
        $grupas = Grupa::all();

        return view('grupa.index', [
            'grupas' => $grupas,
        ]);
    }

    public function create(Request $request): Response
    {
        return view('grupa.create');
    }

    public function store(GrupaStoreRequest $request): Response
    {
        $grupa = Grupa::create($request->validated());

        $request->session()->flash('grupa.id', $grupa->id);

        return redirect()->route('grupas.index');
    }

    public function show(Request $request, Grupa $grupa): Response
    {
        return view('grupa.show', [
            'grupa' => $grupa,
        ]);
    }

    public function edit(Request $request, Grupa $grupa): Response
    {
        return view('grupa.edit', [
            'grupa' => $grupa,
        ]);
    }

    public function update(GrupaUpdateRequest $request, Grupa $grupa): Response
    {
        $grupa->update($request->validated());

        $request->session()->flash('grupa.id', $grupa->id);

        return redirect()->route('grupas.index');
    }

    public function destroy(Request $request, Grupa $grupa): Response
    {
        $grupa->delete();

        return redirect()->route('grupas.index');
    }
}
