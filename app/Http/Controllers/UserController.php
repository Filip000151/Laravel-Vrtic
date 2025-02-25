<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;


class UserController extends Controller
{
    public function index(Request $request)
    {
        $uloga = $request->query('uloga', 'vaspitac');
        $users = User::where('uloga', $uloga)->get();
        return view('user.index', compact('users', 'uloga'));
    }

    public function create(Request $request)
    {
        return view('user.create');
    }

    public function store(UserStoreRequest $request)
    {
        User::create([
            'ime' => $request['ime'],
            'prezime' => $request['prezime'],
            'broj_telefona' => $request['broj_telefona'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'uloga' => $request['uloga'],
        ]);

        return redirect()->route('user.index')->with('success', 'Korisnik je uspešno registrovan!');
    }

    public function show(Request $request, User $user)
    {
        return view('user.show', [
            'user' => $user,
        ]);
    }

    public function edit(Request $request, User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        if(!Hash::check($request->old_password, $user->password)){
            return redirect()->back()->withErrors(['old_password' => 'Stara lozinka nije tačna!'])->withInput();
        }

        $podaci = $request->only(['ime', 'prezime', 'broj_telefona', 'email']);

        if ($request->filled('password')) {
            $podaci['password'] = Hash::make($request->password);
        }

        $user->update($podaci);

        return redirect()->route('user.index')->with('success', 'Podaci su uspešno ažurirani!');
    }

    public function destroy(Request $request, User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Korisnik je uklonjen!');
    }
}
