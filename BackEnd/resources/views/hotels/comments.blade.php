@extends('layouts.app')
@section('title')
{{$hotel->name}}
@endsection
@section('css-includes')
@endsection
@section('row-title')
Les commentaires de l'hôtel {{$hotel->name}}
@endsection
@section('add-button')
@endsection
@section('content')
@if(count($comments)>0)
<div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">Numéro</th>
                                                <th style="text-align: center;">Agence</th>
                                                <th style="text-align: center;">Date</th>
                                                <th style="text-align: center;">commentaire</th>
                                                <th style="text-align: center;">Actions</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($comments as $row)
                                                <tr>
                                                   <td style="text-align:center;">{{$row->id}}</td>
                                                   <td style="text-align:center;">{{$row->agency->name}}</td>
                                                   <td style="text-align:center;">{{date('d-m-Y',strtotime($row->created_at))}}</td>
                                                   <td style="text-align:center;" class="text-truncate">{{$row->content}}</td>
                                                   
                                                   <td style="text-align:center;">
                                                   <a href="{{route('hotel.deleteComment',$row->id)}}" class="btn btn-info btn-danger" ><i class="fa fa-close" ></i> </a>
                                                   </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
@else
<center>Cet hôtel n'a aucun commentaire</center> 
@endif
@endsection
@section('js-includes')
@endsection