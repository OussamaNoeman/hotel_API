<?php

namespace App\Http\Requests\Room;

use App\Requests\BaseRequestFormApi;
use Illuminate\Foundation\Http\FormRequest;

class RoomValidator extends FormRequest
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
            'type'=>'required|in:single_room,double_room,brital_suite,duplex_suite',
            'main_photo'=>'required',
            'description'=>'required',
            'count'=>'required|numeric|min:1|max:1000',
            'price'=>'required|numeric|min:1|max:1000'
        ];
    }
}
