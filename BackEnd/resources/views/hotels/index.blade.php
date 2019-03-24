@extends('layouts.app')
@section('title')
Hôtels
@endsection
@section('css-includes')
@endsection
@section('row-title')
Gestion des hôtels
@endsection
@section('add-button')
<a  class="btn btn-info d-none d-lg-block m-l-15" href="{{route('hotel.createPage')}}"><i class="fa fa-plus-circle"></i> Créer </a>
@endsection
@section('content')
<div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Numéro</th>
                                                <th>Nom</th>
                                                <th>Ville</th>
                                                <th>Addresse</th>
                                                <th>Nombre de lits</th>
                                                
                                                <th>Nombre des saisons du contrat</th>
                                                <th>Actions</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($hotels as $row)
                                                <tr>
                                                   <td style="text-align:center;">{{$row->id}}</td>
                                                   <td style="text-align:center;">{{$row->name}}</td>
                                                   <td style="text-align:center;">{{$row->city->label}}</td>
                                                   <td style="text-align:center;">{{$row->address}}</td>
                                                   <td style="text-align:center;">{{$row->beds_number}}</td>
                                                   
                                                   <td style="text-align:center;">{{count($row->contracts[0]->seasons)}}</td>
                                                   <td style="text-align:center;">
                                                   <a href="{{route('hotel.affectServicesPage',$row->id)}}" class="btn btn-info btn-circle" ><i class="fa fa-edit" ></i> </a>
                                                   
                                                   </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

@endsection
@section('js-includes')
@endsection