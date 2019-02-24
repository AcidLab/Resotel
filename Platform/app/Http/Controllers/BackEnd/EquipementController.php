<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Equipement;
use App\Http\Controllers\Controller;

class EquipementController extends Controller
{
     public function addEquipement (Request $request)
    {
    	$label = $request->input('label');
    	

    	$equipement = new Equipement;
    	$equipement->label=$label;
    	
    	$equipement->save();

    	return $equipement;
 	}


 	public function deleteEquipement(Request $request)
 	{
 		$id = $request->input('id');

 		$equipement = Equipement::find($id);
 		$equipement->delete();
 		return 'ok';
 	}
}
