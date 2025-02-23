<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoditeljUpdateRequest extends FormRequest
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
            'broj_telefona' => ['required', 'string', 'size:10', 'regex:/^\d+$/', Rule::unique('roditeljs')->ignore($this->roditelj->id)],
            'jmbg' => ['required', 'string', 'size:13', 'regex:/^\d+$/', Rule::unique('roditeljs')->ignore($this->roditelj->id)]
        ];
    }

    public function messages()
    {
        return [
            'ime.required' => 'Ime je obavezno!',
            'prezime.required' => 'Prezime je obavezno!',
            'broj_telefona.required' => 'Broj telefona je obavezan!',
            'broj_telefona.size' => 'Broj telefona mora imati tačno 10 brojeva!',
            'broj_telefona.regex' => 'Broj telefona mora imati samo brojeve!',
            'broj_telefona.unique' => 'Broj telefona već postoji!',
            'jmbg.required' => 'JMBG je obavezan!',
            'jmbg.size' => 'JMBG mora imati tačno 13 brojeva!',
            'jmbg.regex' => 'JMBG mora imati samo brojeve!',
            'jmbg.unique' => 'JMBG već postoji!'
        ];
    }
}
