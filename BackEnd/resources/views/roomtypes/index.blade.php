@extends('layouts.app')
@section('title')
Types des chambres
@endsection
@section('css-includes')
@endsection
@section('row-title')
Gestion des types des chambres
@endsection
@section('add-button')
<a  class="btn btn-info d-none d-lg-block m-l-15" href="{{route('roomtypes.create')}}"><i class="fa fa-plus-circle"></i> Créer </a>
@endsection
@section('content')
<div class="table-responsive">
<div class="">
                                    <table class="table full-color-table full-info-table hover-table">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center;">Numéro</th>
                                                <th style="text-align:center;">Label</th>
                                                <th style="text-align:center;">Nom</th>
                                                <th style="text-align:center;">Date de création</th>
                                                <th style="text-align:center;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($roomtypes as $row)
                                                <tr>
                                                    <td style="text-align:center;">{{$row->id}}</td>
                                                    <td style="text-align:center;">{{$row->label}}</td>
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

<!--Modals-->
@foreach($roomtypes as $row)
<div class="modal fade" id="delete_modal_for_{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel1">Confirmation</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                               <h4>Etes-vous sur de supprimer ce type ?</h4> 
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                                <a href="{{route('roomtype.remove',$row->id)}}"  class="btn btn-danger">Supprimer</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
@endforeach
@foreach($roomtypes as $row)
<div class="modal fade" id="edit_modal_for_{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    								<form action ="{{route('roomtype.set',$row->id)}}" method="POST" >
    									{{csrf_field()}}
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel1">Mise à jour d'un type</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                            <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h4 class="card-title">Label : </h4>
                                                            <input type="text" required value="{{$row->label}}" name="label"  class="form-control" placeholder="Label" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h4 class="card-title">Nom : </h4>
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
<!---->

@endsection
@section('js-includes')
@endsection