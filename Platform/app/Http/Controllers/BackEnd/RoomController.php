<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Room;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
     public function addRoom (Request $request)
    {
    	$beds_number = $request->input('beds_number');
    	$type = $request->input('type');
    	$hotel_id = $request->input('hotel_id');
    	


    	$room = new Room;
    	$room->beds_number=$beds_number;
    	$room->type=$type;
    	$room->hotel_id=$hotel_id;
    	

    	
    	$room->save();

    	return $room;
 	}

    public function deleteRoom(Request $request)
    {
        $id = $request->input('id');

        $room = Room::find($id);
        $room->delete();

        return 'ok';
    }


 	
}
