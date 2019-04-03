@extends('layouts.app')
@section('content')
<div class="page-header page-header-xs" style="background-image: url('https://www.tunisienumerique.com/wp-content/uploads/2018/02/banquie.jpg')">
        <div class="filter"></div>
    </div>
@if(count($bookings)>0)


<div class="section landing-section register" id="result">
    <div class="" style="padding-left: 150px;padding-right: 150px;">
        <div class="container">
        	<div class="row">
        		<div class="col-md-12">
        			<div class="table-responsive">
                    	<table class="table table-striped">
                    		<thead>
                    			<tr>
	                    			<th style="text-align: center;" ><h6 class="media-heading">Numéro</h6></th>
	                    			<th style="text-align: center;"><h6 class="media-heading">Date d'arrivée</h6></th>
	                    			<th style="text-align: center;"><h6 class="media-heading">Date de départ</h6></th>
	                    			<th style="text-align: center;"><h6 class="media-heading">Hôtel</h6></th>
                                    <th style="text-align: center;"><h6 class="media-heading">Etat</h6></th>
                                    <th style="text-align: center;"><h6 class="media-heading">Actions</h6></th>
	                    			
	                    		</tr>
                    		</thead>
                    		<tbody>
                    			@foreach($bookings as $row)
                    				<tr>
                    					<td style="text-align: center;"><h6 class="media-heading">{{$row->id}}</h6></td>
                    					<td style="text-align: center;">
                                            <h6 class="media-heading">{{date('d-m-Y',strtotime($row->arrival_date))}}</h6></td>
                    					<td style="text-align: center;">
                                            <h6 class="media-heading">{{date('d-m-Y',strtotime($row->departure_date))}}</h6></td>
                    					<td style="text-align: center;">
                                            <h6 class="media-heading">{{$row->hotel->name}}</h6></td>
                                        <td style="text-align: center;">
                                            @if($row->status == 0)
                                            <span class="label label-warning">
                                                En attente
                                            </span>
                                            @elseif($row->status == 1)
                                            <span class="label label-success">
                                                Validée
                                            </span>
                                            @elseif($row->status == 2)
                                            <span class="label label-danger">
                                                Annulée
                                            </span>
                                            @endif
                                        </td>
                                        <td style="text-align: center;">
                                            <div class="form-group">
                                                <a class="btn btn-info" href="{{route('booking.showInvoice',$row->id)}}"> Facture</a>
                                            </div>
                                        </td>
                    					
                    				</tr>
                    			@endforeach
                    		</tbody>
                    	</table>
                    </div>
        		</div>
        	</div>
        </div>
    </div>
</div>
@else 
<div class="section landing-section register" id="result">
    <div class="" style="padding-left: 150px;padding-right: 150px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    
                        <div class="typography-line">
                            <h1 class="media-heading">Aucune commande</h1>
                        </div>
                   
                </div>
            </div>
        </div>
    </div>
</div> 
@endif
@endsection