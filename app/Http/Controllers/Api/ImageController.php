<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Image\ImageValidator;
use App\Models\Image;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageController extends BaseController
{
    public function index($id)
    {
        $room = Room::find($id);
        $images = $room->images;
        return $this->sendResponse($images);
    }
// public function add(ImageValidator $request,$id)
//     {
//         $room = Room::find($id);
//         //     if($request->hasfile('photo_name')){
//         //         $file = $request->file('photo_name');
//         //         $filename = rand().'.'.$file->getClientOriginalExtension();
//         //         $file->move(public_path('/uploads/room/photos/'),$filename);
//         //         $room->images->name = $filename;
//         //     }
//         // $room->images->room_id = $room->id;
//         // $room->save();
//         return $this->sendResponse($room); 
//     }
    public function newImage(ImageValidator $request, $id)
    {
        $room = Room::find($id);
        $image = new Image();
        if($request->hasfile('photo_name')){
            $file = $request->file('photo_name');
            $filename = rand().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/room/photos/'.$room->type.'/'),$filename);
            $image->photo_name = $filename;
        }
        $image->room_id = $id;
        $image->save();
        return $this->sendResponse($room->images);
    }
    public function deleteImage($id)
    {
        $image = Image::find($id);
        $room = $image->room;
        if($image->photo_name){
            $destination = public_path('/uploads/room/photos/'.$room->type.'/'.$image->photo_name);
            if(File::exists($destination)){
                File::delete($destination);
            }
        }
        $image->delete();    
        return $this->sendResponse($room);
    
    }
}
