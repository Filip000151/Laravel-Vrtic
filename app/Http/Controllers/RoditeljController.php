<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoditeljUpdateRequest;
use App\Models\Roditelj;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RoditeljController extends Controller
{
    public function index(Request $request)
    {
        $roditelji = Roditelj::all();

        return view('roditelj.index', compact('roditelji'));
    }

    public function show(Request $request, Roditelj $roditelj)
    {
        return view('roditelj.show', compact('roditelj'));
    }

    public function edit(Request $request, Roditelj $roditelj)
    {
        return view('roditelj.edit', compact('roditelj'));
    }

    public function update(RoditeljUpdateRequest $request, Roditelj $roditelj)
    {
        $roditelj->update($request->validated());

        return redirect()->route('roditelj.index')->with('success', 'Roditelj je izmenjen!');
    }
}
