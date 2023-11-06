<?php

namespace app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonalUpdateRequest extends FormRequest
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
            'ci' => 'unique:personals,ci,'.$this->personal->id,
        ];
    }

    public function messages()
    {
        return [
            'ci.unique' => 'Ya hay alguien registrado con este número de C.I..',
        ];
    }
}
