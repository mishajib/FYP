<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
        switch ($this->method()) {
            case 'PUT':
                $rules = [
                    'name' => 'bail|required|string|min:4|unique:permissions,id,:id'
                ];
                break;

            default:
                $rules = [
                    'name' => 'bail|required|string|min:4|unique:permissions'
                ];
                break;
        }
        return $rules;
    }
}
