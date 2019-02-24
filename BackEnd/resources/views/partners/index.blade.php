@extends('layouts.app')
@section('title')
Partenaires
@endsection
@section('css-includes')
@endsection
@section('row-title')
Gestion des partenaires
@endsection
@section('add-button')
<a  class="btn btn-info d-none d-lg-block m-l-15" href="{{route('partners.create')}}"><i class="fa fa-plus-circle"></i> Créer </a>
@endsection
@section('content')
<div class="row">
    @foreach($partners as $row)
            <div class="col-lg-4">
                    <div class="card">
                            <img class="card-img-top img-responsive" src="{{asset($row->picture_path)}}" style="height : 245px !important; "  alt="Card image cap">
                            <div class="card-body" >
                                <ul class="list-inline font-14">
                                    <li class="p-l-0">
                                        <span class="badge badge-pill badge-success" style="color:white !important;">
                                            Ajouté le : {{date('d-m-Y',strtotime($row->created_at))}}
                                        </span>
                                    </li>
                                </ul>
                                <h3 class="font-normal text-truncate">{{$row->name}}</h3>
                                
                                <p style="text-align:center !important;">
                                    <a  class="btn btn-circle btn-success" href="{{route('partners.edit',$row->id)}}" ><i class="fa fa-edit"></i></a>
                                    <button type="button" class="btn btn-circle btn-danger" data-toggle="modal" data-target="#delete_modal_for_{{$row->id}}"><i class="mdi mdi-delete"></i></button>
                                </p>
                            </div>
                    </div>
            </div>
    @endforeach
</div>

<!--modals-->
<!--Delete Modals-->
@foreach($partners as $row)
<div class="modal fade" id="delete_modal_for_{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel1">Confirmation</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                               <h4>Etes-vous sur de supprimer ce partenaire ?</h4> 
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                                <a href="{{route('partner.remove',$row->id)}}"  class="btn btn-danger">Supprimer</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
@endforeach
<!---->
@endsection
@section('js-includes')
@endsection