<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Agencie;
use App\Models\Room;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BackEnd\HotelController;
use App\Models\Roomtype;
use View;
use Auth;
use App\Models\Hotel;


class ProfileController extends Controller
{

    public function index(Request $request){

        $view = View::make('settings');
        return $view ; 
        

    }

    public function update(Request $request,$id){

        $user = Auth::user();
        $user->siret = $request->input('siret');
        $user->address = $request->input('address');
        $user->name = $request->input('name');

        $user->save();

        return redirect()->back();

        

    }
    
}
