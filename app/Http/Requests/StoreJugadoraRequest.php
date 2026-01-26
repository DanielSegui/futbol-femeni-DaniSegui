<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJugadoraRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom'             => 'required|string|min:3',
            'equip_id'        => 'required|integer|exists:equips,id',
            'data_naixement'  => 'required|date|before:-16 years', 
            'dorsal'          => 'required|integer|min:1',
            'foto'            => 'nullable|image|mimes:png|max:2048',
            'gols'            => 'required|integer|min:0',
        ];
    }
}