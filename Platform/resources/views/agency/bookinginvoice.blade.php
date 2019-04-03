@extends('layouts.app')
@section('content')
<div class="page-header page-header-xs" style="background-image: url('https://www.tunisienumerique.com/wp-content/uploads/2018/02/banquie.jpg')">
        <div class="filter"></div>
    </div>
<div class="section landing-section register" id="result">
    <div class="" style="padding-left: 150px;padding-right: 150px;">
        <div class="container">
        	<div class="row">
        		<div class="col-md-12">
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
    <br/>
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
    <br/>
<h6 class="mb-3">A :</h6>
<div>
<strong>{{Auth::user()->name}}</strong>
</div>
<div>Email: {{Auth::user()->email}}</div>
<div></div>
<div></div>
<div></div>
</div>



</div>

<div class="table-responsive-sm">
<table class="table table-striped">
<thead>

 <tr>
                                
                                <td style="text-align : center;"><h6 class="media-heading">Hôtel</h6></td>
                                <td style="text-align : center;"><h6 class="media-heading">{{$booking->hotel->name}}</h6></td>
                                <td style="text-align: center;">
                                	@if($booking->status == 0)
                                		<span class="label label-warning" style="color:white !important;">
                                			En attente
                                		</span>
                                	@elseif($booking->status == 1)
                                		<span class="label label-success" style="color:white !important;">
                                			Validée
                                		</span>
                                	@elseif($booking->status == 2)
                                		<span class="label label-danger" style="color:white !important;">
                                			Annulée
                                		</span>
                                	@endif
                                </td>
                                <td style="text-align : center;"><label class="control-label"><h6 class="media-heading">Date d'arrivée  </h6></label></td>
                                <td style="text-align : center;">
                                    <h6 class="media-heading">
                                    {{date('d-m-Y',strtotime($booking->arrival_date))}}
                                </h6>
                                </td>
                                <td style="text-align : center;"><label class="control-label"><h6 class="media-heading">Date de départ  </h6></label></td>
                                <td style="text-align:center;">
                                    <h6 class="media-heading">
                                {{date('d-m-Y',strtotime($booking->departure_date))}}
                                    </h6>
                                </td>
                                
                            </tr>
                            <tr>
                            	
                                
                                
                                <th style="text-align : center;"><h6 class="media-heading">Type de la chambre</h6></th>
                                <th style="text-align : center;"><h6 class="media-heading">Arrangement</h6></th>
                                <th style="text-align : center;"><h6 class="media-heading">Suppléments</h6></th>
                                <th style="text-align : center ; "><h6 class="media-heading">Nombre d'adultes</h6></th>
                                <th style="text-align : center ; "><h6 class="media-heading">Nombre d'enfants</h6></th>
                                <th style="text-align : center ; "><h6 class="media-heading">Nombre de bébés</h6></th>
                                <th style="text-align : center ; "><h6 class="media-heading">Prix</h6></th>
                                
                                
                                
                            
                            </tr>

</thead>
<tbody>
@foreach($booking->bookingType as $key=>$row)
<tr>
	<td style="text-align : center;">{{$row->roomType->name}}</td>
	<td style="text-align:center;">{{$booking->hotel->rooms[0]->arrangement->name}}</td>
	<td style="text-align : center;">
        <h6 class="media-heading">
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
                                    </h6>

	</td>
	<td style="text-align : center;"><h6 class="media-heading">{{$row->majors_number}}</h6></td>
	<td style="text-align : center;"><h6 class="media-heading">{{$row->childrens_number}}</h6></td>
	<td style="text-align:center;"><h6 class="media-heading">{{$row->babies_number}}</h6></td>
	<td style="text-align : center">
        <h6 class="media-heading">
        {{$row->roomPriceInSeason()}} Euros
    </h6>
    </td>
    
</tr>
@endforeach
<tr>
	
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align : center;">
                                    <h6 class="media-heading">Prix Total</h6></td>
                                <td style="text-align : center ; ">
                                    <?php
                                        $total = 0;
                                        foreach($booking->bookingType as $key=>$row){
                                            $total += $row->roomPriceInSeason();
                                        } 
                                    ?>
                                    <h6 class="media-heading">
                                    {{$total}} Euros
                                </h6>
                                </td>
                            
</tr>
<tr>
								<td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align: center;">
                                    
                                   
                                </td>
                                <td style="text-align: center;">
                                	
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
        		</div>
        		</div>
        	</div>
        </div>
    </div>

@endsection
@section('js')
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