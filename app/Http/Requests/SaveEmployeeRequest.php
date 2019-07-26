<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveEmployeeRequest extends FormRequest
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
        // dd($this->route('employee')['id']);
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'email|required|min:3|unique:employees,email,'.$this->route('employee')['id'],
            'phone' => 'required',
            'company_id' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            // 'company_id.required'       => ''
        ];
    }
}
