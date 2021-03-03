<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetRequest extends FormRequest
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
            'name' => 'required',
			'specie' => 'required',
			'date_of_birth' =>'required',
			'allergies' => 'required',
			'chronic_condition' => 'required',
			'vaccination_date' => 'required',
			];
    }
	
	public function messages(){
		return [
			'name.required' => 'olvidaste introducir el nombre',
			'specie.required' => 'olvidaste introducir la especie',
			'date_of_birth.required' =>'olvidaste introducir la fecha de nacimiento',
			'allergies.required' => 'olvidaste introducir las alergias',
			'chronic_condition.required' => 'olvidaste introducir si tiene alguna condicion medica',
			'vaccination_date.required' => 'olvidaste introducir la proxima vacuna',
		];
	}
}



