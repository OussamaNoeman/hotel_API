<?php

namespace App\Http\Requests\Image;

use App\Requests\BaseRequestFormApi;
use Illuminate\Foundation\Http\FormRequest;

class ImageValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
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
            'photo_name'=>'required|mimes:jpg,jpeg,png',
        ];
    }
}
