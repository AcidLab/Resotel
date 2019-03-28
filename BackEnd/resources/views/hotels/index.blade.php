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
@if(count($hotels) > 0)
<div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">Numéro</th>
                                                <th style="text-align: center;">Nom</th>
                                                <th style="text-align: center;">Ville</th>
                                                <th style="text-align: center;">Addresse</th>
                                                <th style="text-align: center;">Nombre de lits</th>
                                                
                                                <th style="text-align: center;">Nombre des saisons du contrat</th>
                                                <th style="text-align: center;">Actions</th>
                                                
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
                                                   <a href="{{route('hotel.showComments',$row->id)}}" class="btn btn-info btn-circle" ><i class="fa fa-vcard-o" ></i> </a>
                                                   
                                                   </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @else
                                Aucun hôtel trouvé
                                @endif

@endsection
@section('js-includes')
@endsection