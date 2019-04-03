@extends('layouts.app')
@section('title')
Agences
@endsection
@section('css-includes')
@endsection
@section('row-title')
Gestion des agences
@endsection
@section('add-button')
<a  class="btn btn-info d-none d-lg-block m-l-15" href="#" data-toggle="modal" data-target="#create"><i class="fa fa-plus-circle"></i> Créer </a>
@endsection
@section('content')
<div class="table-responsive">
<div class="">
                                    <table class="table full-color-table full-info-table hover-table">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center;">Numéro</th>
                                                <th style="text-align:center;">Nom</th>
                                                <th style="text-align:center;">Date de création</th>
                                                <th style="text-align:center;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($agencies as $row)
                                                <tr>
                                                    <td style="text-align:center;">{{$row->id}}</td>
                                                    <td style="text-align:center;">{{$row->name}}</td>
                                                    <td style="text-align:center;">
                                                    <span class="badge badge-pill badge-success" style="color:white !important;">
                                                    {{date('d-m-Y',strtotime($row->created_at))}}
                                                    </span>
                                                    </td>
                                                    <td style="text-align:center;">
                                                    <button type="button" class="btn btn-circle btn-info" data-toggle="modal" data-target="#edit_modal_for_{{$row->id}}"><i class="fa fa-edit"></i></button>                                                   
                                                    <button type="button" class="btn btn-circle btn-danger" data-toggle="modal" data-target="#delete_modal_for_{{$row->id}}"><i class="mdi mdi-delete"></i></button>                                                   
                                                     </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
</div>

<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    								<form action ="{{route('subcontractings.store')}}" method="POST" >
    									{{csrf_field()}}
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel1">Création d'une agence</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                            <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <h4 class="card-title">Nom</h4>
                                                            <input type="text" required value="" name="name"  class="form-control" placeholder="Nom" >
                                                        </div>
                                                    </div>
                                            </div>
                                               
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                                <button type="submit"  class="btn btn-info">Ajouter</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                </div>

	@foreach($agencies as $row)
	<div class="modal fade" id="edit_modal_for_{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    								<form action ="{{route('subcontractings.update',$row->id)}}" method="POST" >
    									@csrf
    									<input type="text" hidden class="form-control" name="_method" value="PUT" />
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel1">Mise à jour  d'une agence</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                            <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <h4 class="card-title">Nom</h4>
                                                            <input type="text" required value="{{$row->name}}" name="name"  class="form-control" placeholder="Nom" >
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
	
	@foreach($agencies as $row)
<div class="modal fade" id="delete_modal_for_{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                    <div class="modal-dialog" role="document">
                                    	<form method="POST" action="{{route('subcontractings.destroy',$row->id)}}">
                                    		@csrf
                                    		<input type="text" hidden class="form-control" name="_method" value="DELETE" />
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel1">Confirmation</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                               <h4>Etes-vous sur de supprimer cette agence ?</h4> 
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                </div>
@endforeach
@endsection
@section('js-includes')
@endsection