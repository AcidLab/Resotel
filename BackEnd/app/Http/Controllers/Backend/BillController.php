<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Bill;
use App\Http\Controllers\Controller;

class BillController extends Controller
{


    public function __construct()
    {
        $this->middleware(['admin','auth']);
    }

    
    public function showBills ()
    {
    	return Bill::all();
    }


    public function showBillById(Request $request)
    {	
    	$id = $request->input('id');

 		$bill = Bill::find($id);

 		return $bill;

    }

    public function deleteBill(Request $request)
    {
    	$id = $request->input('id');
    	$bill = Bill::find($id);
    	$bill->delete();
    	return 'ok';
    }
}
