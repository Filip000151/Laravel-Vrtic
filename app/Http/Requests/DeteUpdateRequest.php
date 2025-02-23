<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DeteUpdateRequest extends FormRequest
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
            'datum_rodjenja' => ['required', 'date'],
            'jmbg' => ['required', 'string', 'size:13', Rule::unique('detes')->ignore($this->dete->id), 'regex:/^\d+$/'],
            'grupa' => ['string'],
            'napomene' => ['nullable', 'string']
        ];
    }

    public function messages()
    {
        return [
            'ime.required' => 'Ime je obavezno!',
            'prezime.required' => 'Prezime je obavezno!',
            'datum_rodjenja.required' => 'Datum rođenja je obavezan!',
            'jmbg.required' => 'JMBG je obavezan!',
            'jmbg.size' => 'JMBG mora imati tačno 13 brojeva!',
            'jmbg.unique' => 'JMBG već postoji!',
            'jmbg.regex' => 'JMBG mora imati samo brojeve!'
        ];
    }
}
