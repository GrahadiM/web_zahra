<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required', 'string', 'max:255'
            ],
            'gender' => [
                'required', 'string', 'min:4'
            ],
            'phone' => [
                'required', 'numeric', 'min:8'
            ],
            'address' => [
                'required', 'string', 'max:255'
            ],
            // 'username' => [
            //     'required', 'string', 'max:255',
            //     Rule::unique('users', 'username')->ignore(Auth::user()->id)
            // ],
            // 'avatar' => [
            //     'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            // ],
            'email' => [
                'required', 'email', 'max:255',
                Rule::unique('users', 'email')->ignore(Auth::user()->id)
            ],
        ];
    }
}