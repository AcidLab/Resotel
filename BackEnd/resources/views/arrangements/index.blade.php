@extends('layouts.app')
@section('title')
Arrangements
@endsection
@section('css-includes')
@endsection
@section('row-title')
Gestion des arrangements
@endsection
@section('add-button')
<a  class="btn btn-info d-none d-lg-block m-l-15" href="{{route('arrangements.create')}}"><i class="fa fa-plus-circle"></i> Créer </a>
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
                                                <th style="text-align:center;">Type</th>
                                                <th style="text-align:center;">Date de création</th>
                                                <th style="text-align:center;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($arrangements as $row)
                                                <tr>
                                                    <td style="text-align:center;">{{$row->id}}</td>
                                                    <td style="text-align:center;">{{$row->label}}</td>
                                                    <td style="text-align:center;">{{$row->name}}</td>
                                                    <td style="text-align:center;">{{$row->type == 1 ? 'Principal' : 'Supplément'}}</td>
                                                    <td style="text-align:center;">
                                                    <span class="badge badge-pill badge-success" style="color:white !important;">
                                                    {{date('d-m-Y',strtotime($row->created_at))}}
                                                    </span>
                                                    </td>
                                                    <td style="text-align:center;">
                                                    <a  class="btn btn-circle btn-info" href="{{route('arrangements.edit',$row->id)}}"><i class="fa fa-edit"></i></a>                                                  
                                                    <button type="button" class="btn btn-circle btn-danger" data-toggle="modal" data-target="#delete_modal_for_{{$row->id}}"><i class="mdi mdi-delete"></i></button>                                                   
                                                     </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
</div>

<!--Modals-->
@foreach($arrangements as $row)
<div class="modal fade" id="delete_modal_for_{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel1">Confirmation</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                               <h4>Etes-vous sur de supprimer cet arrangement ?</h4> 
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                                <a href="{{route('arrangement.remove',$row->id)}}"  class="btn btn-danger">Supprimer</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
@endforeach
@endsection
@section('js-includes')
@endsection