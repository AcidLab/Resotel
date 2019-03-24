@extends('layouts.app')
@section('title')
Détails d'une commande
@endsection
@section('css-includes')

@endsection
@section('row-title')
@endsection
@section('add-button')
@endsection
@section('content')
<div class="container" id="div_to_print">
  <div class="card">
<div class="card-header">
Date facture 
<strong>{{date('d-m-Y',strtotime($booking->updated_at))}}</strong> 

  <span class="float-right"> <strong>Numéro:</strong> &nbsp; 
  	<script>document.write(new Date().getFullYear())</script>/{{str_pad($booking->id, 6, '0' , STR_PAD_LEFT)}}
  </span>

</div>
<div class="card-body">
<div class="row mb-4">
<div class="col-sm-6">
<h6 class="mb-3">De :</h6>
<div>
<strong>RESOTEL</strong>
</div>
<div></div>
<div></div>
<div></div>
<div></div>
</div>

<div class="col-sm-6">
<h6 class="mb-3">A :</h6>
<div>
<strong>{{$booking->agency->name}}</strong>
</div>
<div>Email: {{$booking->agency->email}}</div>
<div></div>
<div></div>
<div></div>
</div>



</div>

<div class="table-responsive-sm">
<table class="table table-striped">
<thead>

 <tr>
                                
                                <td style="text-align : center;">Hôtel</td>
                                <td style="text-align : center;">{{$booking->hotel->name}}</td>
                                <td style="text-align: center;">
                                	@if($booking->status == 0)
                                		<span class="badge badge-pill badge-warning" style="color:white !important;">
                                			En attente
                                		</span>
                                	@elseif($booking->status == 1)
                                		<span class="badge badge-pill badge-success" style="color:white !important;">
                                			Validée
                                		</span>
                                	@elseif($booking->status == 2)
                                		<span class="badge badge-pill badge-danger" style="color:white !important;">
                                			Annulée
                                		</span>
                                	@endif
                                </td>
                                <td style="text-align : center;"><label class="control-label">Date d'arrivée : </label></td>
                                <td style="text-align : center;">
                                    {{date('d-m-Y',strtotime($booking->arrival_date))}}
                                </td>
                                <td style="text-align : center;"><label class="control-label">Date de départ : </label></td>
                                <td style="text-align:center;">
                                {{date('d-m-Y',strtotime($booking->departure_date))}}
                                </td>
                                
                            </tr>
                            <tr>
                            	
                                
                                
                                <th style="text-align : center;">Type de la chambre</th>
                                <th style="text-align : center;">Arrangement</th>
                                <th style="text-align : center;">Suppléments</th>
                                <th style="text-align : center ; ">Nombre d'adultes</th>
                                <th style="text-align : center ; ">Nombre d'enfants</th>
                                <th style="text-align : center ; ">Nombre de bébés</th>
                                <th style="text-align : center ; ">Prix</th>
                                
                                
                                
                            
                            </tr>

</thead>
<tbody>
@foreach($booking->bookingDetails as $key=>$row)
<tr>
	<td style="text-align : center;">{{$row->roomType->name}}</td>
	<td style="text-align:center;">{{$booking->hotel->rooms[0]->arrangement->name}}</td>
	<td style="text-align : center;">
			@if($row->supplements)
                                            <?php
                                                $supps = explode(';',$row->supplements); 
                                            ?>
                                            
                                                @foreach($booking->hotel->supplements() as $supp)
                                                    @for($i=0;$i<count($supps);$i++)
                                                        @if($supps[$i] && $supp->id == $supps[$i])
                                                            {{$supp->name}} <br/>
                                                        @endif
                                                    @endfor
                                                @endforeach
                                            
                                        @else
                                            Pas de suppléments sur cette chambre
                                        @endif

	</td>
	<td style="text-align : center;">{{$row->majors_number}}</td>
	<td style="text-align : center;">{{$row->childrens_number}}</td>
	<td style="text-align:center;">{{$row->babies_number}}</td>
	<td style="text-align : center">
        {{$row->roomPriceInSeason()}} Euros
    </td>
    
</tr>
@endforeach
<tr>
	
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align : center;">Prix Total</td>
                                <td style="text-align : center ; ">
                                    <?php
                                        $total = 0;
                                        foreach($booking->bookingDetails as $key=>$row){
                                            $total += $row->roomPriceInSeason();
                                        } 
                                    ?>
                                    {{$total}} Euros
                                </td>
                            
</tr>
<tr>
								<td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align: center;">
                                	@if($booking->status == 0)
                                		<a  class="btn btn-success" href="{{route('booking.validate',$booking->id)}}" style="color:white;"> <i class="fa fa-check"></i> Valider</a>
                                	@endif
                                </td>
                                <td style="text-align: center;">
                                	<button type="button" class="btn btn-info" id="print_button"> <i class="fa fa-print"></i> Imprimer</button>
                                </td>
</tr>
</tbody>
</table>
</div>
<div class="row">
<div class="col-lg-4 col-sm-5">

</div>

<div class="col-lg-4 col-sm-5 ml-auto">


</div>

</div>

</div>
</div>
</div>
@endsection
@section('js-includes')
<script>
$('#print_button').click(function(){
var prtContent = document.getElementById("div_to_print");
/*var style_one = "{{asset('assets/node_modules/morrisjs/morris.css')}}" ;
var style_two = "{{asset('assets/node_modules/toast-master/css/jquery.toast.css')}}";
var style_three = "{{asset('assets/dist/css/style.min.css')}}";
var style_four = "{{asset('assets/dist/css/pages/dashboard1.css')}}";*/
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
//WinPrint.document.write('<html><head><title></title>');
/*WinPrint.document.write('<link href="'+style_one+'" rel="stylesheet">');
WinPrint.document.write('<link href="'+style_two+'" rel="stylesheet">');
WinPrint.document.write('<link href="'+style_three+'" rel="stylesheet">');
WinPrint.document.write('<link href="'+style_four+'" rel="stylesheet">');
WinPrint.document.write('</head><body>');*/
WinPrint.document.write(prtContent.innerHTML);
//WinPrint.document.write('</body></html>');
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close();

});

</script>
@endsection