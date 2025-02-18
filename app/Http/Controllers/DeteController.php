<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeteStoreRequest;
use App\Http\Requests\DeteUpdateRequest;
use App\Models\Dete;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DeteController extends Controller
{
    public function index(Request $request)
    {
        $detes = Dete::all();

        return view('dete.index', [
            'detes' => $detes,
        ]);
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
        return view('dete.edit', [
            'dete' => $dete,
        ]);
    }

    public function update(DeteUpdateRequest $request, Dete $dete)
    {
        $dete->update($request->validated());

        $request->session()->flash('dete.id', $dete->id);

        return redirect()->route('detes.index');
    }

    public function destroy(Request $request, Dete $dete)
    {
        $dete->delete();

        return redirect()->route('detes.index');
    }
}
