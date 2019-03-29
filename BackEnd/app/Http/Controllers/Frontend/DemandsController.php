<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Agency;
use View;
use Redirect;

class DemandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware(['admin','auth']);
    }

    
    public function index()
    {
        $view = View::make('demands.index2');
        $noAcceptedDemands= Agency::onlyTrashed()->get();
        $bannedDemands = Agency::onlyTrashed()->where('banned','=',1)->get();
        $inWait = Agency::onlyTrashed()->where('banned','=',null)->get();
        $acceptedDemands = Agency::all();
        $view->noAcceptedDemands = $inWait;
        $view->acceptedDemands = $acceptedDemands;
        $view->bannedDemands = $bannedDemands;
        return $view;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function acceptDemand (Request $request,$id){
        $agency = Agency::onlyTrashed()->where('id','=',$id)->get()[0];
        $agency->deleted_at = null;
        $agency->remember_token = null;
        if($request->input('transfer_option') != null && $request->input('transfer_option') != ""){
            $agency->transfer_option = $request->input('transfer_option');
        }
        else {
            $agency->transfer_option = 0;
        }
        $agency->save();
        $request->session()->flash('success','Demande acceptée avec succés ! ');
        return Redirect::to(route('demands.index'));
    }
    public function updateDemand(Request $request , $id){

        $agency = Agency::find($id);
        if($request->input('transfer_option') != null && $request->input('transfer_option') != ""){

            $agency->transfer_option = $request->input('transfer_option') ;
        }
        else {
            $agency->transfer_option = 0;
        }
        $agency->save();
        $request->session()->flash('success','Demande modifiée avec succés');
        return Redirect::to(route('demands.index'));
    }

    public function bannAgency (Request $request,$id){
        $agency = Agency::find($id);
        $agency->banned = 1 ;
        $agency->deleted_at = date('Y-m-d');
        //$agency->remember_token = null;
        $agency->save();
        $request->session()->flash('success','Agence bloquée avec succés ! ');
        return Redirect::to(route('demands.index'));
    }
    public function recoverAgency(Request $request , $id){
        $agency = Agency::onlyTrashed()->where('id','=',$id)->get()[0];
        $agency->banned = null;
        $agency->deleted_at = null;
        $agency->remember_token = null;
        $agency->save();
        $request->session()->flash('success','Agence récupérée avec succés ! ');
        return Redirect::to(route('demands.index'));
    }
}
