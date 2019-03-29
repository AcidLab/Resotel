@extends('layouts.app')
@section('content')
@if(count($drafts)>0)
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
	                    			
	                    		</tr>
                    		</thead>
                    		<tbody>
                    			@foreach($drafts as $row)
                    				<tr>
                    					<td style="text-align: center;">{{$row->id}}</td>
                    					<td style="text-align: center;">{{date('d-m-Y',strtotime($row->arrival_date))}}</td>
                    					<td style="text-align: center;">{{date('d-m-Y',strtotime($row->departure_date))}}</td>
                    					<td style="text-align: center;">{{$row->hotel->name}}</td>
                    					
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
<center>Aucune commande en brouillon</center>
@endif
@endsection