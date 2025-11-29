<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstadiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nom' => 'required|string|unique:estadis,nom,' . $this->estadi,
            'capacitat' => 'required|integer|min:1',
        ];
    }
}
