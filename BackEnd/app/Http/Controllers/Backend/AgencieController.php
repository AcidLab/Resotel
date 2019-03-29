<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Agencie;
use App\Http\Controllers\Controller;

class AgencieController extends Controller
{


	public function __construct()
    {
        $this->middleware(['admin','auth']);
	}
	

	
    public function addAgencie (Request $request)
    {
    	$name = $request->input('name');
    	$social_reason = $request->input('social_reason');
    	$address = $request->input('address');
    	$email = $request->input('email');
    	$phone = $request->input('phone');
    	$trade_register = $request->input('trade_register');
    	$license_number = $request->input('license_number');


    	$agencie = new Agencie;
    	$agencie->name=$name;
    	$agencie->social_reason=$social_reason;
    	$agencie->address=$address;
    	$agencie->email=$email;
    	$agencie->phone=$phone;
    	$agencie->trade_register=$trade_register;
    	$agencie->license_number=$license_number;

    	
    	$agencie->save();

    	return $agencie;
 	}


 	public function deleteAgencie(Request $request)
 	{
 		$id = $request->input('id');

 		$agencie = Agencie::find($id);
 		$agencie->delete();
 		return 'ok';
 	}


    public function updateAgencie(Request $request)
    {
        $id = $request->input('id');
       

        $agencie = Agencie::find($id);
        $agencie->name=$request->input('name');
        $agencie->social_reason=$request->input('social_reason');
        $agencie->address=$request->input('address');
        $agencie->email=$request->input('email');
        $agencie->phone=$request->input('phone');
        $agencie->trade_register=$request->input('trade_register');
        $agencie->license_number=$request->input('license_number');

        
        $agencie->save();

        return $agencie;
    }
}
