<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request. (Atao true amn'iazay iz autorisé)
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
        // Ato le maha required azy
        return [
            'numEmp' => ['required'],
            'Nom' => ['required'],
            'Prenom' => ['required'],
            'poste' => ['required'],
            'salaire' => ['required', 'integer', 'min:100000'],
            // 'images' => ['required']
        ];
    }

    public function message()
    {
        return [
            'numEmp.required' => 'Numéro employe récquis.',
            'Nom.required' => 'Nom employe récquis.',
            'Prenom.required' => 'Prenom employe récquis.',
            'poste.required' => 'Poste employe récquis.',
            'salaire.required' => 'Salaire employe récquis.',
            'salaire.integer' => 'Salaire doit être nombre.',
            'salaire.min' => 'Salaire doit être 100000 minimum.',
            'images' => 'images employe récquis.'
        ];
    }
}
