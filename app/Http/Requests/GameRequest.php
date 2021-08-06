<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
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
            'name'      => [
                'required',
                Rule::unique('games', 'name_game')->ignore($this->gameId, 'id')
            ],    
            'url'           => 'required|url',
            'description'   => 'present', 
            'urlImage'      => 'required|url',
            'statusId'      => 'required'
        ];
    }

    /**
     * attributes names
     * @return array
     */
    public function attributes()
    {
        return [
            'name'        => 'nombre del juego',
            'url'         => 'url del juego',
            'description' => 'descripción del juego',
            'urlImage'    => 'url imagen',
            'statusId'    => 'estatus del juego' 
        ];
    }    

    /**
     * messages description valid
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'     => 'El :attribute es obligatorio.',
            'name.unique'       => 'El :attribute se encuentra registrado.',
            'url.required'      => 'La :attribute es obligatoria.',
            'url.url'           => 'La :attribute no válida.',
            'urlImage.required' => 'La :attribute es obligatoria.',
            'urlImage.url'      => 'La :attribute no válida.',     
            'statusId.required' => 'El :attribute es obligatorio.'       
        ];
    }

}
