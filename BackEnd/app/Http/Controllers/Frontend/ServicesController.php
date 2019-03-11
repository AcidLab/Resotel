<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
use View;
use Redirect;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        $view = View::make('services.index');
        $view->services = $services;
        return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = View::make('services.create');
        return $view;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = new Service;
        $service->label = $request->input('label');
        $service->save();
        $request->session()->flash('success','Service ajouté avec succés !');
        return Redirect::to(route('services.index'));
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
    public function updateService(Request $request, $id)
    {
        $service = Service::find($id);
        $service->label = $request->input('label');
        $service->save();
        $request->session()->flash('success','Service mis à jour avec succés ! ');
        return Redirect::to(route('services.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteService(Request $request,$id)
    {
        $service = Service::find($id);
        $service->delete();
        $request->session()->flash('success','Service supprimé avec succés ! ');
        return Redirect::to(route('services.index'));
    }
}
