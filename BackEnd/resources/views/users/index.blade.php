@extends('layouts.app')
@section('title')
Utilisateurs
@endsection
@section('css-includes')
@endsection
@section('row-title')
Gestion des utilisateurs
@endsection
@section('add-button')
<a  class="btn btn-info d-none d-lg-block m-l-15" href="{{route('users.create')}}"><i class="fa fa-plus-circle"></i> Créer </a>
@endsection
@section('content')
@if(count($users)>0)
<div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">Numéro</th>
                                                <th style="text-align: center;">Nom</th>
                                                <th style="text-align: center;">Email</th>
                                                <th style="text-align: center;">Type</th>
                                                <th style="text-align: center;">Date de création</th>
                                                
                                                
                                                <th style="text-align: center;">Actions</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $row)
                                                <tr>
                                                   <td style="text-align:center;">{{$row->id}}</td>
                                                   <td style="text-align:center;">{{$row->name}}</td>
                                                   <td style="text-align:center;">{{$row->email}}</td>
                                                   <td style="text-align:center;">
                                                   	@if($row->type == 1 )
                                                   	Admin
                                                   	@elseif($row->type == 2) 
                                                   	Agence
                                                   	@endif
                                                   </td>
                                                   <td style="text-align:center;">{{date('d-m-Y',strtotime($row->created_at))}}</td>
                                                   
                                                   
                                                   <td style="text-align:center;">
                                                   <a href="#" class="btn btn-info btn-circle" ><i class="fa fa-edit" ></i> </a>
                                                   <a href="#" class="btn btn-warning btn-circle" ><i class="ti-lock" ></i> </a>
                                                   <a href="#" class="btn btn-danger btn-circle" ><i class="fa fa-close" ></i> </a>
                                                   
                                                   </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
@else
<center>Aucun utilisateur</center>
@endif
@endsection
@section('js-includes')
@endsection