<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CongeFormRequest extends FormRequest
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
            'numConge' => ['required'],
            'numEmp' => ['required'],
            'motif' => ['required'],
            'nbrjr' => ['required', 'integer', 'min:1', 'max:30'],
            'dateDemande' => ['required']
        ];
    }

    public function message()
    {
        return [
            'numConge.required' => 'Le numéro de congé est requis.',
            'numEmp.required' => 'L\'ID de l\'employé est requis.',
            'motif.required' => 'Le motif est requis.',
            'nbrjr.required' => 'Le nombre de jours est requis.',
            'nbrjr.max' => 'Le nombre de jours ne doit pas dépasser 30.',
            'nbrjr.min' => 'Le nombre de jours doit être au minimum 1.'
        ];
    }
}
