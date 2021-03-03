<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
			'first_surname' => 'required',
			'dni' => 'required',
			'date_of_birth' => 'required',
			'address' => 'required',
			'CP' => 'required',
			'mobile' => 'required',
			'email' => 'required',
			'specialization' => 'required',
			'department' => 'required',
        ];
    }
	
	public function messages(){
		return [
			'name.required' => 'olvidaste introducir el nombre',
			'first_surname.required' => 'olvidaste introducir el primer apellido',
			'dni.required' => 'olvidaste introducir el DNI',
			'date_of_birth.required' => 'olvidaste introducir la fecha de nacimiento',
			'address.required' => 'olvidaste introducir la dirección',
			'CP.required' => 'olvidaste introducir el código postal',
			'mobile.required' => 'olvidaste introducir el teléfono móvil',
			'email.required' => 'olvidaste introducir el email',
			'specialization.required' => 'debes introducir una especialización',
			'department.required' => 'debes introducir el departamento',
		];
		
	}
}
