<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use View; 
use Auth;
use Redirect;
use Validator;
use Hash;

class UsersController extends Controller
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
        $users = User::where('id','<>',Auth::user()->id)->get();
        $view = View::make('users.index');
        $view->users = $users;
        return $view; 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = View::make('users.create');
        return $view ; 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array('password' => 'required|string|min:6|confirmed','email' => 'required|string|email|max:255|unique:admin');
        $v = Validator::make($request->all(),$rules);

        if ($v->fails()) {

            return Redirect::back()->withInput()->withErrors($v);
            
        }
        else {
            $user = new User ; 
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->type = $request->input('type');
            if($request->input('type') == 2){

                $user->agency_id = $request->input('agency_id');
            }
            else {

                $user->agency_id = 0 ;
            }
            $user->password = Hash::make($request->input('password'));
            $user->save();
            $request->session()->flash('success','Utilisateur crée avec succés ! ');
            return Redirect::to(route('users.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $rules = array('email' => 'required|string|email|max:255');
        $v = Validator::make($request->all(),$rules);

        if ($v->fails()) {

            return Redirect::back()->withInput()->withErrors($v);
            
        }
        else {
            $user = User::find($id) ; 
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->type = $request->input('type');
            if($request->input('type') == 2){
                
                $user->agency_id = $request->input('agency_id');
            }
            else {

                $user->agency_id = 0 ;
            }
            $user->save();
            $request->session()->flash('success','Utilisateur modifié avec succés ! ');
            return Redirect::to(route('users.index'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $view = View::make('users.edit');
        $user = User::find($id);
        $view->user = $user;
        return $view ; 
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
        $rules = array('password' => 'required|string|min:6|confirmed','email' => 'required|string|email|max:255|unique:admin');
        $v = Validator::make($request->all(),$rules);

        if ($v->fails()) {

            return Redirect::back()->withInput()->withErrors($v);
            
        }
        else {
            $user = User::find($id) ; 
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->type = $request->input('type');
            $user->save();
            $request->session()->flash('success','Utilisateur modifié avec succés ! ');
            return Redirect::to(route('users.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
