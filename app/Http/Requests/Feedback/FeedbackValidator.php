<?php

namespace App\Http\Requests\Feedback;

use App\Requests\BaseRequestFormApi;
use Illuminate\Foundation\Http\FormRequest;

class FeedbackValidator extends BaseRequestFormApi
{

    public function authorized(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'fullName'=>'required|min:3|max:50',
            'email'=>'required|min:5|max:50|email',
            'suggesting'=>'required|string'
        ];
    }
}
