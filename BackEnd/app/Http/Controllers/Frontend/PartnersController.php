<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Partner;
use View;
use Redirect;
use Session;


class PartnersController extends Controller
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
        $partners = Partner::all();
        $view = View::make('partners.index');
        $view->partners = $partners;
        return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = View::make('partners.create');
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
        $partner = new Partner;
        $partner->name = $request->input('name');
        if($request->input('description')){
            $partner->description = $request->input('description');
        }
        if($request->file('picture_path')){

            $file = $request->file('picture_path');
            $filename = $file->store(config('files.partners_path'),'public');
            $partner->picture_path = asset($filename);  
        }
        $partner->save();
        $request->session()->flash('success','Partenaire ajouté avec succés ! ');
        return Redirect::to(route('partners.index'));
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
        $view = View::make('partners.edit');
        $partner = Partner::find($id);
        $view->partner = $partner;
        return $view;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePartner(Request $request, $id)
    {
        $partner = Partner::find($id);
        $partner->name = $request->input('name');
        if($request->input('description')){
            $partner->description = $request->input('description');
        }
        if($request->file('picture_path')){

            $file = $request->file('picture_path');
            $filename = $file->store(config('files.partners_path'),'public');
            $partner->picture_path = asset($filename);  
        }
        $partner->save();
        $request->session()->flash('success','Partenaire mis à jour avec succés !');
        return Redirect::to(route('partners.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletePartner(Request $request , $id)
    {
        $partner = Partner::find($id);
        $partner->delete();
        $request->session()->flash('success','Partenaire supprimé avec succés ! ');
        return Redirect::to(route('partners.index'));
    }
}
