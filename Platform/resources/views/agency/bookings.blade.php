@extends('layouts.app')
@section('content')
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
	                    			<th style="text-align: center;">Numéro</th>
	                    			<th style="text-align: center;">Date d'arrivée</th>
	                    			<th style="text-align: center;">Date de départ</th>
	                    			<th style="text-align: center;">Hôtel</th>
                                    <th style="text-align: center;">Etat</th>
                                    <th style="text-align: center;">Actions</th>
	                    			
	                    		</tr>
                    		</thead>
                    		<tbody>
                    			@foreach($bookings as $row)
                    				<tr>
                    					<td style="text-align: center;">{{$row->id}}</td>
                    					<td style="text-align: center;">{{date('d-m-Y',strtotime($row->arrival_date))}}</td>
                    					<td style="text-align: center;">{{date('d-m-Y',strtotime($row->departure_date))}}</td>
                    					<td style="text-align: center;">{{$row->hotel->name}}</td>
                                        <td style="text-align: center;">
                                            @if($row->status == 0)
                                                En attente
                                            @elseif($row->status == 1)
                                                Validée
                                            @elseif($row->status == 2)
                                                Annulée
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
<center>Aucune commande </center>
@endif
@endsection