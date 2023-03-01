<?php

use App\Http\Controllers\Api\FeedbackController;
use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\ResrvationController;
use App\Http\Controllers\Api\RoomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login',[RegisterController::class,'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    //Feedback Routes
    Route::get('/feedbacks',[FeedbackController::class,'index']);
    Route::post('/addFeedback',[FeedbackController::class,'add']); 

    //Reservation Routes
    Route::post('/addRes',[ResrvationController::class,'create']);

    //Room Routes
    Route::get('/rooms',[RoomController::class,'index']);
    Route::get('/room/{type}',[RoomController::class,'getRoomByType']);
    Route::get('/room/{id}',[RoomController::class,'getRoomById']);
    Route::post('/addRoom',[RoomController::class,'newRoom']);
    Route::post('updateRoom/{id}',[RoomController::class,'update']);
    //Room Images Routes
    Route::get('/images/{id}',[ImageController::class,'index']);
    Route::post('/addImage/{id}',[ImageController::class,'newImage']);
    Route::delete('/deleteImage/{id}',[ImageController::class,'deleteImage']);
    });



Route::get('/datatest',function(){
    return response()->json(['Result'=>'success']);
})->middleware('auth:sanctum');
