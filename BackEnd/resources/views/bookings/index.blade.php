@extends('layouts.app')
@section('title')
Commandes
@endsection
@section('css-includes')
@endsection
@section('row-title')
Gestion des commandes
@endsection
@section('add-button')
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
    <div class="card">
                            
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs customtab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home2" role="tab"><span class="hidden-sm-up"><i class="ti-check-box"></i></span> <span class="hidden-xs-down">Commandes validées</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile2" role="tab"><span class="hidden-sm-up"><i class="ti-time"></i></span> <span class="hidden-xs-down">Commandes en attentes</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages2" role="tab"><span class="hidden-sm-up"><i class=" ti-close"></i></span> <span class="hidden-xs-down">Commandes annulées</span></a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="home2" role="tabpanel">
                                    <div class="p-20">
                                       <div class="table-responsive">
                                    <table class="table color-table success-table">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">Numéro</th>
                                                <th style="text-align: center;">Date d'arrivée</th>
                                                <th style="text-align: center;">Date de départ</th>
                                                <th style="text-align: center;">Hôtel</th>
                                                <th style="text-align: center;">Agence</th>
                                                <th style="text-align: center;">Date de soumission</th>
                                                <th style="text-align: center;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($bookings as $row)
                                                @if($row->status == 1)
                                                    <tr>
                                                        <td style="text-align: center;">{{$row->id}}</td>
                                                        <td style="text-align: center;">{{date('d-m-Y',strtotime($row->arrival_date))}}</td>
                                                        <td style="text-align: center;">{{date('d-m-Y',strtotime($row->departure_date))}}</td>
                                                        <td style="text-align: center;">{{$row->hotel->name}}</td>
                                                        <td style="text-align: center;">{{$row->agency->name}}</td>
                                                        <td style="text-align: center;">{{date('d-m-Y',strtotime($row->created_at))}}</td>
                                                        <td style="text-align: center;">
                                                            <a class="btn btn-circle btn-success" href="{{route('bookings.show',$row->id)}}" ><i class="icon-eyeglass" style="color:white;"></i></a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                                    </div>
                                </div>
                                <div class="tab-pane  p-20" id="profile2" role="tabpanel">
                                    <div class="p-20">
                                       <div class="table-responsive">
                                    <table class="table color-table warning-table">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">Numéro</th>
                                                <th style="text-align: center;">Date d'arrivée</th>
                                                <th style="text-align: center;">Date de départ</th>
                                                <th style="text-align: center;">Hôtel</th>
                                                <th style="text-align: center;">Agence</th>
                                                <th style="text-align: center;">Date de soumission</th>
                                                <th style="text-align: center;">Détails</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($bookings as $row)
                                                @if($row->status == 0)
                                                    <tr>
                                                        <td style="text-align: center;">{{$row->id}}</td>
                                                        <td style="text-align: center;">{{date('d-m-Y',strtotime($row->arrival_date))}}</td>
                                                        <td style="text-align: center;">{{date('d-m-Y',strtotime($row->departure_date))}}</td>
                                                        <td style="text-align: center;">{{$row->hotel->name}}</td>
                                                        <td style="text-align: center;">{{$row->agency->name}}</td>
                                                        <td style="text-align: center;">{{date('d-m-Y',strtotime($row->created_at))}}</td>
                                                        <td style="text-align: center;">
                                                            <a class="btn btn-circle btn-warning" href="{{route('bookings.show',$row->id)}}" ><i class="icon-eyeglass" style="color:white;"></i></a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                                    </div>

                                </div>
                                <div class="tab-pane p-20" id="messages2" role="tabpanel">
                                    
                                    <div class="p-20">
                                       <div class="table-responsive">
                                    <table class="table color-table danger-table">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">Numéro</th>
                                                <th style="text-align: center;">Date d'arrivée</th>
                                                <th style="text-align: center;">Date de départ</th>
                                                <th style="text-align: center;">Hôtel</th>
                                                <th style="text-align: center;">Agence</th>
                                                <th style="text-align: center;">Date de soumission</th>
                                                <th style="text-align: center;">Détails</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($bookings as $row)
                                                @if($row->status == 2)
                                                    <tr>
                                                        <td style="text-align: center;">{{$row->id}}</td>
                                                        <td style="text-align: center;">{{date('d-m-Y',strtotime($row->arrival_date))}}</td>
                                                        <td style="text-align: center;">{{date('d-m-Y',strtotime($row->departure_date))}}</td>
                                                        <td style="text-align: center;">{{$row->hotel->name}}</td>
                                                        <td style="text-align: center;">{{$row->agency->name}}</td>
                                                        <td style="text-align: center;">{{date('d-m-Y',strtotime($row->created_at))}}</td>
                                                        <td style="text-align: center;">
                                                            <a class="btn btn-circle btn-danger" href="{{route('bookings.show',$row->id)}}" ><i class="icon-eyeglass" style="color:white;"></i></a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    </div>
</div>
@endsection
@section('js-includes')
@endsection