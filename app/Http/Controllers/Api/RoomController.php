<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Room\RoomValidator;
use App\Models\Room;
use App\Services\RoomService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RoomController extends BaseController
{
    public function index()
    {
        $rooms = Room::all();
        return $this->sendResponse($rooms); ;
    }
    public function getRoomByType($type)
    {
        $room = Room::where('type',$type)->get();
        return $this->sendResponse($room);
    }
    public function getRoomById($id)
    {
        $room = Room::find($id);
        return $this->sendResponse($room);
    }
    // public function store(RoomValidator $roomValidator)
    // {
    //     $data = $roomValidator->validated();
    //     $room = new Room();
    //     $room->type= $data['type'];
    //     if($roomValidator->hasfile('main_photo')){
    //         $file = $roomValidator->file('main_photo');
    //         $filename = rand().'.'.$file->getClientOriginalExtension();
    //         $file->move(public_path('/uploads/room/main/'),$filename);
    //         $room->main_photo = $filename;
    //     }        
    //     $room->description = $data['description'];
    //     $room->count = $data['count'];
    //     $room->price = $data['price'];

    //     $room->save();
    //     return $this->sendResponse($room); 
    // }
    public function newRoom(RoomValidator $request)
    {
        $data = $request->validated();
            $room = new Room();
            $room->type= $data['type'];
            if($request->hasfile('main_photo')){
                $file = $request->file('main_photo');
                $filename = rand().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('/uploads/room/main/'),$filename);
                $room->main_photo = $filename;
            }        
            $room->description = $data['description'];
            $room->count = $data['count'];
            $room->price = $data['price'];
    
            $room->save();
            return $this->sendResponse($room); 

        
    }
    public function update(RoomValidator $request , $id)
    {
        $data = $request->validated();
        $room = Room::find($id);
        $room->type= $data['type'];
        if($request->hasfile('main_photo')){
            $destination = public_path('uploads/room/main/') . $room->main_photo;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
            $file = $request->file('main_photo');
            $filename = rand().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/room/main/'),$filename);
            $room->main_photo = $filename;
        }
        $room->description = $data['description'];
        $room->count = $data['count'];
        $room->price = $data['price'];

        $room->update();
        return $this->sendResponse($room);
    }
    
}
