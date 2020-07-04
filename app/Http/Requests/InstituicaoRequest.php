<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstituicaoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'cnpj' => 'required|max:20',
            'city' => 'required|max:100',
            'state' => 'required|max:100',
            'link' => 'max:150',
            'active' => 'required|max:2',
        ];
    }

    /**
     * Get the messages for validations.
     *
     * @return array
     */
    public function messages()
    {
        return [
           'name.required' => 'O campo nome da instituição é requerido',
           'cnpj.required' => 'O campo cnpj da instituição é requerido',
           'city.required' => 'O campo cidade é requerido',
           'state.required' => 'O campo Estado é requerido',
           'active.required' => 'O campo Ativar Instituição é requerido',
           'name.max' => 'O tamanho do Nome da instituição inserido no campo não pode utltrapassar 255 caracteres',
           'cnpj.max' => 'O tamanho do CNPJ da instituição inserido no campo não pode utltrapassar 20 caracteres',
           'city.max' => 'O tamanho da Cidade da instituição inserido no campo não pode utltrapassar 100 caracteres',
           'state.max' => 'O tamanho do Estado da instituição inserido no campo não pode utltrapassar 100 caracteres',
           'link.max' => 'O tamanho do Link da instituição inserido no campo não pode utltrapassar 150 caracteres',
           'active.max' => 'O tamanho do campo Ativar Conta inserido não pode utltrapassar 2 caracteres',
        ];
    }
}
