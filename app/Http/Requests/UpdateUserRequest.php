<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'string',
            'phone' => 'string|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:users',
            'email' => 'max:255|email|unique:users',
            'photo' => 'image|mimes:jpeg,png,jpg,gif'
        ];
    }
}
