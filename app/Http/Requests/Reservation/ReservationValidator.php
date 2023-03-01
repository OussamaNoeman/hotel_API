<?php

namespace App\Http\Requests\Reservation;

use App\Requests\BaseRequestFormApi;
use Illuminate\Foundation\Http\FormRequest;

class ReservationValidator extends BaseRequestFormApi
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorized(): bool
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
            'name'=>'required|min:5|max:50',
            'email'=>'required|min:5|max:50|email',
            'phone_number'=>'required|numeric',
            'check_in'=>'required|date|after_or_equal:'.date(today()),
            'check_out'=>'required|date|after:'.date(today()),
            'room_type'=>'required|in:single room,double room,bridal suite,duplex suite'
        ];
    }
}
