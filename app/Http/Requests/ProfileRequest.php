<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|between:4,100',
            'email' => 'email|required',
            'password' => 'required|min:8|max:32|confirmed',
            'bio' => 'required',
            'image'=>'required|image|mimes:png,jpg,svg,jpeg|max:10240'
        ];
    }
}
