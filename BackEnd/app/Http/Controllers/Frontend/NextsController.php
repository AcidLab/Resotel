<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Next;
use View;
use Redirect;
use Session;

class NextsController extends Controller
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
        $nexts = Next::all();
        $view = View::make('nexts.index');
        $view->nexts = $nexts;
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
        $view = View::make('nexts.edit');
        $next = Next::find($id);
        $view->next = $next;
        return $view;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateNext(Request $request, $id)
    {
        $next = Next::find($id);
        $next->title = $request->input('title');
        if($request->input('description')){
            $next->description = $request->input('description');
        }
        if($request->file('picture_path')){

            $file = $request->file('picture_path');
            $filename = $file->store(config('files.nexts_path'),'public');
            $next->picture_path = asset($filename);  
        }
        $next->save();
        $request->session()->flash('success','Elément mis à jour avec succés ! ');
        return Redirect::to(route('nexts.index'));
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
}
