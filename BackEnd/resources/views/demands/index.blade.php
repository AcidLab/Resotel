@extends('layouts.app')
@section('title')
Demandes d'adhésion
@endsection
@section('css-includes')
@endsection
@section('row-title')
Demandes d'adhésion
@endsection
@section('add-button')
@endsection
@section('content')
@if(count($demands) > 0)
<div class="table-responsive">
                                    <table class="table color-table info-table">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">Numéro de la demande</th>
                                                <th style="text-align: center;">Nom d'agence</th>
                                                <th style="text-align: center;">Email</th>
                                                <th style="text-align: center;">Adresse</th>
                                                <th style="text-align: center;">N° SIRET</th>
                                                <th style="text-align: center;">Date de la demande</th>
                                                <th style="text-align: center;">Actions</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                           	@foreach($demands as $row)
                                           		<td style="text-align: center;">{{$row->id}}</td>
                                           		<td style="text-align: center;">{{$row->name}}</td>
                                           		<td style="text-align: center;">{{$row->email}}</td>
                                              <td style="text-align: center;">{{$row->address}}</td>
                                              <td style="text-align: center;">{{$row->siret}}</td>
                                              
                                           		<td style="text-align: center;">{{date('d-m-Y',strtotime($row->created_at))}}</td>
                                           		<td style="text-align: center;">
                                           				
                                           			<a class="btn btn-circle btn-success" href="{{route('demand.accept',$row->id)}}" ><i class="icon-check" style="color:white;"></i></a>
                                           		</td>
                                           	@endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                                @else 
                                Aucune demande d'adhésion 
                                @endif
@endsection
@section('js-includes')
@endsection