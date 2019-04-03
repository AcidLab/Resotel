<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Agencytoadd;
use View;
use Session ;
use Redirect ;  

class SubcontractingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agencies = Agencytoadd::all();
        $view = View::make('subcontractings.index');
        $view->agencies = $agencies;
        return $view ; 
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
        $agency = new Agencytoadd ; 
        $agency->name = $request->input('name');
        $agency->save();
        $request->session()->flash('success','Agence crée avec succés ! ');
        return Redirect::to(route('subcontractings.index'));

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
        $agency = Agencytoadd::find($id);
        $agency->name= $request->input('name');
        $agency->save();
        $request->session()->flash('success','Agence mise à jour avec succés ! ');
        return Redirect::to(route('subcontractings.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $agency = Agencytoadd::find($id);
        $agency->delete();
        $request->session()->flash('success','Agence supprimée avec succés ! ');
        return Redirect::to(route('subcontractings.index'));
    }
}
