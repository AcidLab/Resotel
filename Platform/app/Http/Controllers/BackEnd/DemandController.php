<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Demand;
use App\User;
use App\Agencie;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class DemandController extends Controller
{
    public function addDemand (Request $request)
    {

        $rules = array('password' => 'required|string|min:6','email' => 'required|string|email|max:255|unique:demands');
        $v = Validator::make($request->all(),$rules);

        if ($v->fails()) {

            return '$v'; //Redirect::back()->withInput()->withErrors($v);
            
        }
        else {


    	$name = $request->input('name');
    	$email = $request->input('email');
    	$password = $request->input('password');
        $address = $request->input('address');
    	$social_reason = $request->input('social_reason');
    	$phone = $request->input('phone');
    	$trade_register = $request->input('trade_register');
    	$license_number = $request->input('license_number');


    	$demand = new Demand;
    	$demand->name=$name;
    	$demand->password=Hash::make($password);
       	$demand->social_reason=$social_reason;
    	$demand->email=$email;
        $demand->address=$address;
    	$demand->phone=$phone;
    	$demand->trade_register=$trade_register;
    	$demand->license_number=$license_number;

    	
    	$demand->save();

    	return $demand;

         }
 	}


    public function showAllDemands()
    {
        return Demand::all();
    }

    public function showDemandDetails(Request $request)
    {
        $id = $request->input('id');
        $demand = Demand::find($id);
        return $demand;

    }

    public function deleteDemand(Request $request)
    {
        $id = $request->input('id');

        $demand = Demand::find($id);
        $demand->delete();

        return 'ok';
    }


    public function acceptDemand(Request $request)
    {
        $id = $request->input('id');

        $demand = Demand::find($id);

        $agencie = new agencie;

        $agencie->name=$demand->name;
        $agencie->social_reason=$demand->social_reason;
        $agencie->email=$demand->email;
        $agencie->address=$demand->address;
        $agencie->phone=$demand->phone;
        $agencie->trade_register=$demand->trade_register;
        $agencie->license_number=$demand->license_number;

        $agencie->save();

            while(!$agencie){

            }

        $user = new User;

        $user->name=$demand->name;
        $user->password=$demand->password;
        $user->email=$demand->email;
        $user->agency_id=$agencie->id;

        $user->save();





        return 'accepter';

    }
}
