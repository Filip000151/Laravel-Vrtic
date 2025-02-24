<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EvidencijaUpdateRequest extends FormRequest
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
            'datum' => ['required', 'date'],
            'deca' => ['required', 'array'],
            'deca.*.status' => ['required', 'in:odsutan,prisutan,opravdano'],
            'deca.*.napomena' => ['nullable', 'string']
        ];
    }
}
