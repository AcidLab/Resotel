@extends('layouts.app')
@section('title')
Liste à propos
@endsection
@section('css-includes')
<link rel="stylesheet" href="{{asset('assets/about_icons/css/nucleo-icons.css')}}">
<link rel="stylesheet" href="{{asset('assets/about_icons/css/demo.css')}}">
@endsection
@section('row-title')
Gestion de la liste à propos
@endsection
@section('add-button')
@endsection
@section('content')

		<div class="row" style="text-align : centre !important; margin-top : 50px !important;">
            @foreach($abouts as $row)
                <div class="col-md-4">
                    <p style="text-align : center !important;"> 
                    <i class="nc-icon {{$row->icon_class}}" style="font-size : 100px !important; color : #03a9f3 !important;"></i>
                    <br/> 
                    <br/>
                    <span class="font-normal">{{$row->title}}</span>
                    <br/>
                    <br/>
                    <button  class="btn btn-circle btn-success" data-toggle="modal" data-target="#edit_modal_for_{{$row->id}}"><i class="fa fa-edit"></i></button>
                    </p>
                    
                </div>
            @endforeach
        </div>
        <!--modals-->
        @foreach($abouts as $row)
        <div class="modal fade" id="edit_modal_for_{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    								<form action ="{{route('about.set',$row->id)}}" method="POST" >
    									{{csrf_field()}}
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel1">Mise à jour d'un élément</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                            <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <h4 class="card-title">Icône</h4>
                                                            <input type="text" required value="{{$row->icon_class}}" name="icon_class"  class="form-control" placeholder="Icône" >
                                                        </div>
                                                    </div>
                                               </div>
                                               <div class="row">
                                               		<div class="col-md-12">
                                            <div class="form-group">
                                                <h4 class="card-title">Titre</h4>
                                                
                                                <input type="text" required value="{{$row->title}}" name="title"  class="form-control" placeholder="Titre" >
                                               
                                            </div>

                                        </div>
                                        
                                               </div> 
                                               <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <h4 class="card-title">Contenu</h4>
                                                            <textarea name="content" required class="form-control" rows="9" placeholder="Contenu">{{$row->content}}</textarea> 
                                                        </div>
                                                    </div>
                                               </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                                <button type="submit"  class="btn btn-info">Mettre à jour</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                </div>
        @endforeach
        <!---->

@endsection
@section('js-includes')

@endsection