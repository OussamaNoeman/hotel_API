<?php

namespace App\Http\Requests\User;

use App\Requests\BaseRequestFormApi;
use Illuminate\Foundation\Http\FormRequest;

class LoginUserValidator extends BaseRequestFormApi
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorized()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email'=>[
                'required',
                'min:5',
                'max:50',
                'email',
                ],
            'password'=>[
                'required',
                'min:6'
                ]
        ];
    }
}
