@extends('layouts.app')
@section('content')

            
            <div class="section landing-section register" id="result">
                <div class="" style="padding-left: 150px;padding-right: 150px;">
                <div class="container">
			<div class="row" >
				<div class="col-md-6">
					<div class="card card-raised page-carousel" >
						<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						    <ol class="carousel-indicators">
                                @foreach($hotel->pictures as $key=>$row)
							    <li data-target="#carouselExampleIndicators" data-slide-to="{{$key}}" class="{{$key==0 ? 'active' : ''}}"></li>
							    
                                @endforeach
						    </ol>
                            <div class="carousel-inner" role="listbox" >
                                @foreach($hotel->pictures as $key=>$row)
                                <div class="carousel-item {{$key==0 ? 'active' : ''}}">
                                    <img class="d-block img-fluid" src="{{$row->path}}" alt="{{$key}} slide">
                                	<div class="carousel-caption d-none d-md-block">
                                        <p></p>
                                    </div>
                                </div>
                                @endforeach
                                
                                
                            </div>

                            <a class="left carousel-control carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="fa fa-angle-left"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="fa fa-angle-right"></span>
                                <span class="sr-only">Next</span>
                            </a>
						</div>
					</div>
				</div>
                <div class="col-md-6">
                <div class="card card-pricing" data-background="image" style="background-image: url({{$hotel->pictures[0]->path}});height:400px;">
							<div class="card-block">
								
								<div class="row">
                                    <div class="col-md-6">
                                    <h6 class="card-category">Services</h6>
                                    <ul>
									@foreach($hotel->services() as $row)
                                        <li>{{$row->label}}</li>
                                    @endforeach
								</ul>
                                    </div>
                                    <div class="col-md-6">
                                    <h6 class="card-category">Equipements</h6>
                                    <ul>
									@foreach($hotel->equipements() as $row)
                                        <li>{{$row->label}}</li>
                                    @endforeach
								    </ul>
                                    </div>
                                </div>
								
								
							</div>
						</div>
                </div>
			</div>
            @if(Session::get('failure'))
            <div class="alert alert-danger alert-with-icon" data-notify="container" style="width: 80%; margin:auto;margin-top : 10px;border-radius : 5px;">
                <div class="container">
                    <div class="alert-wrapper">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                        </button>
                        <div class="message" style="text-align:center;"><i class="nc-icon nc-bell-55"></i> &nbsp;&nbsp; {{Session::get('failure')}}</div>
                    </div>
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <h4></h4>
                </div>
                <div class="col-md-12 ">
                
                    <h4 class="title"><small>Disponibilité</small></h4>
                    <form action="{{route('bookings.store')}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group" hidden>
                        <input type="text" required class="form-control" name="hotel_id" hidden value="{{$hotel->id}}" />
                    </div>
                    <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align : center;"><label class="control-label">Date d'arrivée : </label></td>
                                <td style="text-align : center;">
                                    <div class="form-group">
                                        <input type="date" style="border-color : gray;" required value="{{$arrival_date}}" readonly  class="form-control" name="arrival_date"  />
                                    </div>
                                </td>
                                <td style="text-align : center;"><label class="control-label">Date de départ : </label></td>
                                <td style="text-align:center;">
                                <div class="form-group">
                                <input type="date" style="border-color : gray;" required value="{{$departure_date}}" readonly  class="form-control" name="departure_date"  />
                                    </div>
                                </td>
                                
                            </tr>
                            <tr>
                                
                                <th></th>
                                <th style="text-align : center;">Type de la chambre</th>
                                <th style="text-align : center;">Arrangement</th>
                                <th style="text-align : center;">Suppléments</th>
                                <th style="text-align : center ; ">Nombre d'adultes</th>
                                <th style="text-align : center ; ">Nombre d'enfants</th>
                                <th style="text-align : center ; ">Nombre de bébés</th>
                                
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($hotel->roomTypes as $key=>$row)
                            @if($row->availableRooms($row->hotel_id,$arrival_date,$departure_date) > 0)
                            @for($i = 0 ;$i<$row->availableRooms($row->hotel_id,$arrival_date,$departure_date);$i++)
                            <tr>

                                
                                <td>
                                    <div class="checkbox">
                                    <input forclick="{{$row->type->id}}{{$key}}{{$i}}" id="checkbox{{$row->id}}_{{$i}}" name="type_{{$key}}[]" value="{{$row->type->id}}" type="checkbox">
                                    <label for="checkbox{{$row->id}}_{{$i}}"></label>
                                </div>
                                </td>
                                
                                <td style="text-align : center;" data-toggle="tooltip" title="Minimum personnes : {{$row->min_persons}} Maximum personnes : {{$row->max_persons}}">{{$row->type->name}}</td>
                                <td style="text-align : center ; ">{{$row->arrangement->name}}</td>
                                <td style="text-align:center;">
                                    <div class="form-group">
                                        <select style="border-color : gray;" class="form-control" multiple name="supps_for_{{$row->type->id}}_{{$i}}[]">
                                            @foreach($supplements as $supp)
                                                <option value="{{$supp->id}}">{{$supp->name}}</option>
                                            @endforeach
                                        </select>
                                    </div> 
                                </td>
                                <td style="text-align : center;">
                                    <div class="form-group">
                                        <input type="number" style="border-color : gray ;" id="majors_{{$row->type->id}}{{$key}}{{$i}}" min="{{$row->min_major}}" max="{{$row->max_major}}" value="{{$row->min_major}}"  name="nb_majors_for_{{$row->type->id}}_{{$i}}" class="form-control">
                                    </div>

                                </td>
                                <td style="text-align : center;">
                                    <div class="form-group">
                                    <input type="number" style="border-color : gray ;" id="childrens_{{$row->type->id}}{{$key}}{{$i}}" min="{{$row->min_children}}" max="{{$row->max_children}}" value="{{$row->min_children}}"  name="nb_childrens_for_{{$row->type->id}}_{{$i}}" class="form-control">
                                    </div>
                                </td>
                                <td style="text-align : center;">
                                    <div class="form-group">
                                        <input type="number" style="border-color : gray ;" id="babies_{{$row->type->id}}{{$key}}{{$i}}" value="0" min="0" max="{{$row->max_babies}}"  name="nb_babies_for_{{$row->type->id}}_{{$i}}" class="form-control">
                                    </div>
                                </td>
                                
                                </tr>
                                @endfor
                                @endif
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align : center;">
                                    
                                </td>
                                
                                <td style="text-align : center;"></td>
                                <td style="text-align : center;">
                                    
                                </td>
                                
                                <td style="text-align : center;">
                                <div class="form-group">
                                <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Commander</button>
                                </div>
                                </td>
                            </tr>
                           
                        </tbody>
                    </table>
                    </div>
                    </form>

                </div>
            </div>
		</div>
                </div>
            </div>
@endsection
@section('js')
<script>
$('input[type="checkbox"]').change(function(){

        var forclick = $(this).attr('forclick');
        var majors_input = $('#majors_'+forclick);
        var childrens_input = $('#childrens_'+forclick);
        var babies_input = $('#babies_'+forclick);
        
    if(this.checked){
        
        
        majors_input.prop('required',true);
        childrens_input.prop('required',true);
        babies_input.prop('required',true);
        

    }
    else {

        
        majors_input.prop('required',false);
        childrens_input.prop('required',false);
        babies_input.prop('required',false);
        
        
    }
});
</script>
@endsection