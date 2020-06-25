<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SorteioRequest extends FormRequest
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
            'year' => 'required|max:4',
            'description' => 'required',
            'data_sorteio' => 'required|max:10',
            'value' => 'required|max:10',
            'km' => 'required|max:10',
            'status' => 'required|max:30',
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
           'name.required' => 'O campo nome é requerido',
           'year.required' => 'O campo ano é requerido',
           'description.required' => 'O campo descrição é requerido',
           'data_sorteio.required' => 'O campo data do sorteio é requerido',
           'value.required' => 'O campo valor é requerido',
           'km.required' => 'O campo km é requerido',
           'status.required' => 'O campo status é requerido',
           'active.required' => 'O campo Ativar Sorteio é requerido',
           'name.max' => 'O tamanho da Nome do sorteio inserido no campo não pode utltrapassar 255 caracteres',
           'year.max' => 'O tamanho do Ano do sorteio inserido no campo não pode utltrapassar 4 caracteres',
           'data_sorteio.max' => 'O tamanho da Data do Sorteio inserido no campo não pode utltrapassar 10 caracteres',
           'value.max' => 'O tamanho do valor do sorteio inserido no campo não pode utltrapassar 10 caracteres',
           'km.max' => 'O tamanho do km do sorteio inserido no campo não pode utltrapassar 10 caracteres',
           'status.max' => 'O tamanho da status do sorteio inserido no campo não pode utltrapassar 30 caracteres',
           'active.max' => 'O tamanho do campo Ativar Conta inserido não pode utltrapassar 2 caracteres',
        ];
    }
}
