<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reservation\ReservationValidator;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ResrvationController extends BaseController
{
    public function create(ReservationValidator $resrvationController)
    {
        if(!empty($resrvationController->getErrors())){
            return response()->json($resrvationController->getErrors());
        }
        $request = $resrvationController->request();
        if($request){
            $reservation = new Reservation();
            $reservation->name = $request->name;
            $reservation->email = $request->email;
            $reservation->phone_number = $request->phone_number;
            $reservation->check_in = $request->check_in;
            $reservation->check_out = $request->check_out;
            $reservation->room_type = $request->room_type;

            $reservation->save();
            $success['Result']='Reservation Successfully';

            return $this->sendResponse($success);
        }
        $success['Result']='Something Has Wrong';
        return $this->sendResponse($success);
    }
}
