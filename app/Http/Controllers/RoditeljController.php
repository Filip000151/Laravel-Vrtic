<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoditeljStoreRequest;
use App\Http\Requests\RoditeljUpdateRequest;
use App\Models\Roditelj;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RoditeljController extends Controller
{
    public function index(Request $request): Response
    {
        $roditeljs = Roditelj::all();

        return view('roditelj.index', [
            'roditeljs' => $roditeljs,
        ]);
    }

    public function create(Request $request): Response
    {
        return view('roditelj.create');
    }

    public function store(RoditeljStoreRequest $request): Response
    {
        $roditelj = Roditelj::create($request->validated());

        $request->session()->flash('roditelj.id', $roditelj->id);

        return redirect()->route('roditeljs.index');
    }

    public function show(Request $request, Roditelj $roditelj): Response
    {
        return view('roditelj.show', [
            'roditelj' => $roditelj,
        ]);
    }

    public function edit(Request $request, Roditelj $roditelj): Response
    {
        return view('roditelj.edit', [
            'roditelj' => $roditelj,
        ]);
    }

    public function update(RoditeljUpdateRequest $request, Roditelj $roditelj): Response
    {
        $roditelj->update($request->validated());

        $request->session()->flash('roditelj.id', $roditelj->id);

        return redirect()->route('roditeljs.index');
    }

    public function destroy(Request $request, Roditelj $roditelj): Response
    {
        $roditelj->delete();

        return redirect()->route('roditeljs.index');
    }
}
