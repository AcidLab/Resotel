<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Booking;
use App\Models\Bookingtype;
use App\Models\Roomtype;
use App\Models\Room;
use Redirect;
use View;
use Session;
use Auth;
use App\Models\Arrangement;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $_POST['type_1'][0];
        //return $request->input('supps_for_'.$_POST['type_0'][0].'_0');
        $num = count(Hotel::find($request->input('hotel_id'))->roomTypes);
        $test = 0;
        $supps = "";
        
        for($j=0;$j<$num;$j++){
            if(isset($_POST['type_'.$j])){
                $test ++;
            }
            
        }
        if($test == 0 ){
            $request->session()->flash('failure','Veuillez séléctionner au moins une chambre pour passer la commande');
                return Redirect::back();
        }
        else {
            
            for($key = 0 ; $key < $num; $key ++){
                if(isset($_POST['type_'.$key])){
                for($i = 0 ; $i < count($_POST['type_'.$key]);$i++){
                    $room = Room::where([['hotel_id','=',$request->input('hotel_id')],['type_id','=',$_POST['type_'.$key][$i]]])->get()[0];
                    $validate_min_max = $request->input('nb_majors_for_'.$_POST['type_'.$key][$i].'_'.$i) + $request->input('nb_childrens_for_'.$_POST['type_'.$key][$i].'_'.$i) + $request->input('nb_babies_for_'.$_POST['type_'.$key][$i].'_'.$i);
                        if($validate_min_max > $room->max_persons || $validate_min_max < $room->min_persons ){
                            $request->session()->flash('failure','Vous n\'avez pas respecté le nombre des personnes permis pour la chambre '. ($i+1) .' de type '.$room->type->name);
                            return Redirect::back();
                        }
                }
            }
            }
                            $booking = new Booking ; 
                            $booking->arrival_date = $request->input('arrival_date');
                            $booking->departure_date = $request->input('departure_date');
                            $booking->hotel_id = $request->input('hotel_id');
                            $booking->status = 0;
                            $booking->agency_id = Auth::user()->id;
                            $booking->save();
                            while(!$booking){
                                // Do nothing
                            }
                            

                for($key = 0 ; $key < $num; $key ++){
                    if(isset($_POST['type_'.$key])){
    
                    for($i = 0 ; $i < count($_POST['type_'.$key]);$i++){
                        

                            
                            $bookingType = new Bookingtype ;
                            $bookingType->booking_id = $booking->id;
                            $bookingType->room_type = $_POST['type_'.$key][$i];
                            $bookingType->hotel_id = $request->input('hotel_id');
                            $bookingType->majors_number = $request->input('nb_majors_for_'.$_POST['type_'.$key][$i].'_'.$i);
                            $bookingType->childrens_number = $request->input('nb_childrens_for_'.$_POST['type_'.$key][$i].'_'.$i);
                            $bookingType->babies_number = $request->input('nb_babies_for_'.$_POST['type_'.$key][$i].'_'.$i);
                            if($request->input('supps_for_'.$_POST['type_'.$key][$i].'_'.$i)){
                            if(count($request->input('supps_for_'.$_POST['type_'.$key][$i].'_'.$i))>0){
                                for($l=0;$l<count($request->input('supps_for_'.$_POST['type_'.$key][$i].'_'.$i));$l++){
                                     $supps = $supps . $request->input('supps_for_'.$_POST['type_'.$key][$i].'_'.$i)[$l].';';
                                }
                                $bookingType->supplements = $supps;
                                $supps = "";
                            }
                        }
                            $bookingType->save();
                            


                        
                    }
            }
        }
                            //$request->session()->flash('success','Commande passé ! ');
                            //return Redirect::back();
                            return Redirect::to(route('bookings.show',$booking->id));
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $view = View::make('hotels.recap');
        $booking = Booking::find($id);
        $supplements = $booking->hotel->supplements();
        $view->booking = $booking ; 
        $view->supplements = $supplements ; 
        return $view ; 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
