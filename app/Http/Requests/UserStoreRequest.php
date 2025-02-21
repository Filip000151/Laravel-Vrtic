<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'ime' => ['required', 'string', 'max:255'],
            'prezime' => ['required', 'string', 'max:255'],
            'broj_telefona' => ['required', 'string', 'size:10', 'regex:/^\d+$/', Rule::unique('users')],
            'email' => ['required', 'email', Rule::unique('users')],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'uloga' => ['required', Rule::in(['vaspitac', 'admin'])]
        ];
    }

    public function messages()
    {
        return [
            'ime.required' => 'Ime je obavezno!',
            'prezime.required' => 'Prezime je obavezno!',
            'broj_telefona.required' => 'Broj telefona je obavezan!',
            'broj_telefona.size' => 'Broj telefona mora imati tačno 10 cifara!',
            'broj_telefona.regex' => 'Broj telefona mora imati samo cifre!',
            'broj_telefona.unique' => 'Broj telefona već postoji!',
            'email.required' => 'Email je obavezan!',
            'email.unique' => 'Email već postoji!',
            'password.required' => 'Lozinka je obavezna!',
            'password.min' => 'Lozinka mora imati minimum 8 karaktera!',
            'password.confirmed' => 'Lozinka se ne podudara!',
            'uloga.required' => 'Uloga je obavezna!'
        ];
    }
}
