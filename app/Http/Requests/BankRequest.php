<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BankRequest extends FormRequest
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
            'holder' => 'required|max:255',
            'holder_active' => 'required|max:2',
            'cpf' => 'required|max:255',
            'cpf_active' => 'required|max:2',
            'agency' => 'max:20',
            'agency_active' => 'max:2',
            'account' => 'max:20',
            'account_active' => 'max:2',
            'type' => 'max:2',
            'type_active' => 'max:2',
            'active' => 'required|max:2'
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
           'name.required' => 'O campo nome do banco é requerido',
           'holder.required' => 'O campo Titular é requerido',
           'holder_active.required' => 'O campo Ativar titular de Conta é requerido',
           'cpf.required' => 'O campo CPF é requerido',
           'cpf_active.required' => 'O campo Ativar CPF de Conta é requerido',
           'active.required' => 'O campo Ativar Conta é requerido',
           'name.max' => 'O tamanho da Nome da Conta inserido no campo não pode utltrapassar 255 caracteres',
           'holder.max' => 'O tamanho da agência inserido no campo não pode utltrapassar 255 caracteres',
           'holder_active.max' => 'O tamanho do campo ativar agência inserido no campo não pode utltrapassar 2 caracteres',
           'agency.max' => 'O tamanho do campo agência inserido no campo não pode utltrapassar 20 caracteres',
           'agency_active.max' => 'O tamanho do campo ativar agência inserido no campo não pode utltrapassar 2 caracteres',
           'account.max' => 'O tamanho do campo Conta inserido no campo não pode utltrapassar 20 caracteres',
           'account_active.max' => 'O tamanho do campo ativar conta inserido não pode utltrapassar 2 caracteres',
           'type.max' => 'O tamanho do campo Tipo inserido não pode utltrapassar 2 caracteres',
           'type_active.max' => 'O tamanho do campo Ativar Tipo inserido não pode utltrapassar 2 caracteres',
           'active.max' => 'O tamanho do campo Ativar Conta inserido não pode utltrapassar 2 caracteres'
        ];
    }
}
