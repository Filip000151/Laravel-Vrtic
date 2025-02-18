<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrijavaStoreRequest extends FormRequest
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
            'ime_dete' => ['required', 'string', 'max:255'],
            'prezime_dete' => ['required', 'string', 'max:255'],
            'datum_rodjenja' => ['required', 'date'],
            'jmbg_dete' => ['required', 'string', 'size:13', 'regex:/^\d+$/'],
            'ime_roditelj' => ['required', 'string', 'max:255'],
            'prezime_roditelj' => ['required', 'string', 'max:255'],
            'broj_telefona' => ['required', 'string', 'size:10', 'regex:/^\d+$/'],
            'jmbg_roditelj' => ['required', 'string', 'size:13', 'regex:/^\d+$/'],
            'napomene' => ['nullable', 'string'],
            'datum_prijave' => ['date']
        ];
    }

    public function messages()
    {
        return [
            'ime_dete.required' => 'Ime deteta je obavezno.',
            'prezime_dete.required' => 'Prezime deteta je obavezno.',
            'datum_rodjenja.required' => 'Datum rođenja je obavezan.',
            'jmbg_dete.required' => 'JMBG deteta je obavezan.',
            'jmbg_dete.size' => 'JMBG deteta mora imati tačno 13 cifara.',
            'jmbg_dete.regex' => 'JMBG deteta mora imati samo cifre.',
            'ime_roditelj.required' => 'Ime roditelja je obavezno.',
            'prezime_roditelj.required' => 'Prezime roditelja je obavezno.',
            'broj_telefona.required' => 'Broj telefona je obavezan.',
            'broj_telefona.size' => 'Broj telefona mora imati tačno 10 cifara.',
            'broj_telefona.regex' => 'Broj telefona mora imati samo cifre.',
            'jmbg_roditelj.required' => 'JMBG roditelja je obavezan.',
            'jmbg_roditelj.size' => 'JMBG roditelja mora imati tačno 13 cifara.',
            'jmbg_roditelj.regex' => 'JMBG roditelja mora imati samo cifre.',
            'datum_prijave.date' => 'Datum prijave mora biti validan datum.'
        ];
    }
}
