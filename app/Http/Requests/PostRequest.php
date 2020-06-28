<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            case "PUT":
                $rules = [
                    'title' => 'required',
                    'image' => 'bail|required,:id|image',
                    'categories' => 'required',
                    'tags' => 'required',
                    'body' => 'required',
                ];
                break;
            default:
                $rules = [
                    'title' => 'required',
                    'image' => 'bail|required|image',
                    'categories' => 'required',
                    'tags' => 'required',
                    'body' => 'required',
                ];
                break;
        }
        return $rules;
    }
}
