<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
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
        // dd($this->route('company')->id);
        return [
            'name' => 'required',
            'email' => 'email|required|min:3|unique:companies,email,'.$this->route('company')->id,
            'website' => '',
        ];
    }
}
