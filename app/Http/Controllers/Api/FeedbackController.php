<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Feedback\FeedbackValidator;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends BaseController
{
    public function index()
    {
        return $this->sendResponse(Feedback::all());
    }

    public function add(FeedbackValidator $feedbackValidator)
    {
        if(!empty($feedbackValidator->getErrors())){
            return response()->json($feedbackValidator->getErrors());
        }
        $request = $feedbackValidator->request();
        if($request){
            $feedback = new Feedback();
            $feedback->fullName = $request->fullName;
            $feedback->email = $request->email;
            $feedback->suggesting = $request->suggesting;
            $feedback->save();
            $success['Result']='Feedback Sended';

            return $this->sendResponse($success);
        }
        $success['Result']='Something Has Wrong';
        return $this->sendResponse($success);
    }
}
