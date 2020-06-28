<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
                    "name" => "bail|required|string",
                    "username" => "bail|required|string|unique:users,id,:id",
                    "email" => "bail|required|email|unique:users,id,:id",
                    "mobile" => "bail|required|max:11",
                    "slug" => "unique:users,id,:id",
                ];
                break;
            default:
                $rules = [
                    "name" => "bail|required|string",
                    "username" => "bail|required|string|unique:users",
                    "email" => "bail|required|email|unique:users",
                    "mobile" => "bail|required|max:11",
                    "slug" => "unique:users",
                ];
                break;
        }
        return $rules;
    }
}
