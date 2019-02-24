<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Service;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
     public function addService (Request $request)
    {
    	$label = $request->input('label');
    	

    	$service = new Service;
    	$service->label=$label;
    	
    	$service->save();

    	return $service;
 	}


 	public function deleteService(Request $request)
 	{
 		$id = $request->input('id');

 		$service = Service::find($id);
 		$service->delete();
 		return 'ok';
 	}
}
