@extends('layouts.app')
@section('content')
<div class="page-header page-header-xs" style="background-image: url('https://www.tunisienumerique.com/wp-content/uploads/2018/02/banquie.jpg')">
        <div class="filter"></div>
    </div>
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
	                    			<th style="text-align: center;"><h6 class="media-heading">Numéro</h6></th>
	                    			<th style="text-align: center;"><h6 class="media-heading">Date d'arrivée</h6></th>
	                    			<th style="text-align: center;"><h6 class="media-heading">Date de départ</h6></th>
	                    			<th style="text-align: center;"><h6 class="media-heading">Hôtel</h6></th>
	                    			
	                    		</tr>
                    		</thead>
                    		<tbody>
                    			@foreach($drafts as $row)
                    				<tr>
                    					<td style="text-align: center;"><h6 class="media-heading">{{$row->id}}</h6></td>
                    					<td style="text-align: center;">
                                            <h6 class="media-heading">{{date('d-m-Y',strtotime($row->arrival_date))}}</h6></td>
                    					<td style="text-align: center;">
                                            <h6 class="media-heading">{{date('d-m-Y',strtotime($row->departure_date))}}</h6></td>
                    					<td style="text-align: center;">
                                            <h6 class="media-heading">{{$row->hotel->name}}</h6></td>
                    					
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
                            <h1 class="media-heading">Aucune commande en brouillon</h1>
                        </div>
                   
                </div>
            </div>
        </div>
    </div>
</div> 

@endif
@endsection