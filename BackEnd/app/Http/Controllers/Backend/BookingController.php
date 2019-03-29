<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Booking;
use App\Hotel;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{


	public function __construct()
    {
        $this->middleware(['admin','auth']);
	}
	
	
      public function addBooking (Request $request)
    {
    	$arrival_date = $request->input('arrival_date');
    	$departure_date = $request->input('departure_date');
    	$rooms_number = $request->input('rooms_number');
    	$hotel_id = $request->input('hotel_id');
    	$bill_id = $request->input('bill_id');
    	$agency_id = $request->input('agency_id');


    	$booking = new Booking;
    	$booking->arrival_date=$arrival_date;
    	$booking->departure_date=$departure_date;
    	$booking->rooms_number=$rooms_number;
    	$booking->hotel_id=$hotel_id;
    	$booking->bill_id=$bill_id;
    	$booking->agency_id=$agency_id;
    	
    	$booking->save();

    	return $booking;
 	}



 	public function deleteBooking(Request $request)
 	{
 		    	$id = $request->input('id');
 		    	$booking = Booking::find($id);
 		    	$booking-> delete();

 		    	return 'ok';

 	}


 	public function checkAvailability(Request $request)
 	{
 		$id = $request->input('id');
 		$hotel = Hotel::find($id);

 		if ($hotel)
 		return count($hotel->rooms);
 		else 
 		return 'No';
 	}


    public function showAllBookings ()
    {
        return Booking::all();
    }

    public function showBookingDetails(Request $request)
    {
        $id = $request->input('id');
        $booking = Booking::find($id);
        return $booking;
    }
}
