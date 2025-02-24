<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EvidencijaStoreRequest extends FormRequest
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
            'grupa_id' => ['required'],
            'datum' => ['required', 'date'],
            'deca' => ['required', 'array'],
            'deca.*.status' => ['required', 'in:odsutan,prisutan,opravdano'],
            'deca.*.napomena' => ['nullable', 'string']
        ];
    }

    public function messages()
    {
        return [
            'deca.required' => 'Evidencija ne može biti kreirana jer grupa nema dece.'
        ];
    }
}
