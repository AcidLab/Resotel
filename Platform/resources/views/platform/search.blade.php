@extends('layouts.app')
@section('content')

<div class="page-header" style="background-image: url({{$sliders[$random]->picture_path}})">
                <div class="filter"></div>
                <div class="content-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 offset-md-1 text-center">
                                <h1 class="title"> Découvrez nos offres en tunisie</h1>
                                <h5>La Tunisie, le plus petit des États du Maghreb, se situe au nord du continent africain. Il est séparé de l'Europe par une distance de 140 kilomètres au niveau du canal de Sicile.</h5>
                                <br>
                                
                            </div>
                            <div class="col-md-10 offset-md-1"> 
                                <div class=" card-raised card-form-horizontal no-transition">
                                    <div class="card-block">
                                        <form method="GET" action="{{route('hotel.search')}}">
                                             
                                        <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="text" name="word" value="" placeholder="Recherche" class="form-control" style="height:47px;"/>
                                                    </div>
                                                </div>


                                            </div>


                                            <div class="row" style="margin-top:20px;">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="date" name="arrival_date" value="" placeholder="Date d'arrivée" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="date" name="check_out_date" value="" placeholder="Date de départ" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row" style="margin-top:20px;">
                                                
                                                <div class="col-md-3">
                                                <div class="form-group" style="width:100% !important;">
                                    <select class="selectpicker" data-style="btn btn-default btn-block btn-large">
                                        <option disabled selected> Chambre</option>
                                        <option value="1">1 </option>
                                        <option value="1">2 </option>
                                        <option value="1">3 </option>
                                        <option value="1">4 </option>
                                        <option value="1">5 </option>
                                   </select>
                                </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                    <select class="selectpicker" data-style="btn btn-default btn-block btn-large">
                                        <option disabled selected> Adulte</option>
                                        <option value="1">1 </option>
                                        <option value="1">2 </option>
                                        <option value="1">3 </option>
                                        <option value="1">4 </option>
                                        <option value="1">5 </option>
                                   </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                    <select class="selectpicker" data-style="btn btn-default btn-block btn-large">
                                        <option disabled selected> Enfant</option>
                                        <option value="1">1 </option>
                                        <option value="1">2 </option>
                                        <option value="1">3 </option>
                                        <option value="1">4 </option>
                                        <option value="1">5 </option>
                                   </select>
                                                    </div>
                                                </div>


                                                <div class="col-md-3">
                                                    <button type="submit" class="btn btn-info btn-block" ><i class="nc-icon nc-zoom-split"></i> &nbsp; Recherche</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <div class="">

    	 <div class="section landing-section register" id="result">
            <div class="" style="padding-left: 150px;padding-right: 150px;">

				<div class="row">
                <div class="container">
               <h3 class="section-title">Filtrer</h3>
               <div class="row">
                    <div class="col-md-3">
                        <div class="card card-refine">
                            <div class="panel-group" id="accordion" aria-multiselectable="true" aria-expanded="true">
							
								
								<div class="card-header card-collapse" role="tab" id="room_types">
									<h5 class="mb-0 panel-title">
										<a class="" data-toggle="collapse" data-parent="#accordion" href="#types" aria-expanded="true" aria-controls="collapseSecond">
											Types des chambres
											<i class="nc-icon nc-minimal-down"></i>
										</a>
									</h5>
								</div>
								<div id="types" class="collapse" role="tabpanel" aria-labelledby="headingOne">
									<div class="card-block">
                                        @foreach($roomtypes as $row)
										<div class="checkbox">
											<input id="{{$row->id}}" value="{{$row->id}}" class="classfortypes" type="checkbox" >
											<label for="{{$row->id}}">
												{{$row->name}}
											</label>
										</div>
                                        @endforeach
									</div>
                                    <input  id="types_input" hidden disabled  class="form-control" />
								</div>
                                <div class="card-header card-collapse" role="tab" id="hotel_supplements">
                                    <h5 class="mb-0 panel-title">
                                        <a class="" data-toggle="collapse" data-parent="#accordion" href="#supplements" aria-expanded="true" aria-controls="collapseSecond">
                                            Suppléments
                                            <i class="nc-icon nc-minimal-down"></i>
                                        </a>
                                    </h5>
                                </div>
                                <div id="supplements" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="card-block">
                                        @foreach($supplements as $row)
                                        <div class="checkbox">
                                            <input id="s{{$row->id}}" value="{{$row->id}}" class="classforsupplements" type="checkbox" >
                                            <label for="s{{$row->id}}">
                                                {{$row->name}}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                    <input  id="supplements_input" hidden disabled class="form-control" />

                                </div>
                                <div class="card-header card-collapse" role="tab" id="hotel_stars">
                                    <h5 class="mb-0 panel-title">
                                        <a class="" data-toggle="collapse" data-parent="#accordion" href="#stars" aria-expanded="true" aria-controls="collapseSecond">
                                            Nombre d'étoiles
                                            <i class="nc-icon nc-minimal-down"></i>
                                        </a>
                                    </h5>
                                </div>
                                <div id="stars" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="card-block">
                                        @for($i=0;$i<5;$i++)
                                        <div class="checkbox">
                                            <input id="st{{$i}}" class="classforstars" value="{{$i+1}}" type="checkbox" >
                                            <label for="st{{$i}}">
                                                {{($i+1)}} @if($i==0) étoile @else étoiles @endif
                                            </label>
                                        </div>
                                        @endfor
                                    </div>
                                    <input  disabled hidden  id="stars_input" class="form-control" />
                                </div>
                                <div class="card-header card-collapse" role="tab" id="hotel_services">
                                    <h5 class="mb-0 panel-title">
                                        <a class="" data-toggle="collapse" data-parent="#accordion" href="#services" aria-expanded="true" aria-controls="collapseSecond">
                                            Services
                                            <i class="nc-icon nc-minimal-down"></i>
                                        </a>
                                    </h5>
                                </div>
                                 <div id="services" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="card-block">
                                        @foreach($services as $row)
                                        <div class="checkbox">
                                            <input id="ser{{$row->id}}" class="classforservices" value="{{$row->id}}" type="checkbox" >
                                            <label for="ser{{$row->id}}">
                                                {{$row->label}}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                    <input disabled hidden id="services_input" class="form-control" />
                                </div>
                                <div class="card-header card-collapse" role="tab" id="hotel_equipements">
                                    <h5 class="mb-0 panel-title">
                                        <a class="" data-toggle="collapse" data-parent="#accordion" href="#equipements" aria-expanded="true" aria-controls="collapseSecond">
                                            Equipements
                                            <i class="nc-icon nc-minimal-down"></i>
                                        </a>
                                    </h5>
                                </div>
                                <div id="equipements" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="card-block">
                                        @foreach($equipements as $row)
                                        <div class="checkbox">
                                            <input class="classforequipements" value="{{$row->id}}" id="eq{{$row->id}}" type="checkbox" >
                                            <label for="eq{{$row->id}}">
                                                {{$row->label}}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                    <input disabled hidden id="equipements_input" class="form-control" />
                                </div>
                                <div class="row" style="margin-top: 30px;">
                                    <div class="col-md-12" style="text-align: center;">

                                        <button type="button" id="filter_button"  class="btn btn-info">Appliquer</button>

                                        

                                        
                                    </div>
                                </div>

							</div>	
	                    </div> <!-- end card -->
	                </div>

                    <div class="col-md-9">
                        <div class="Hotels">
							@foreach($all as $row)
                            <div class="row">
                                <div class="col-md-4 col-sm-16">
								<div class="card card-product card-plain">
										<div class="card-image">
											<a href="{{route('hotels.show',$row->id)}}">
												<img src="{{asset('assets\img\mouradi.jpg')}}" alt="Rounded Image" class="img-rounded img-responsive">
											</a>
											
										</div>
									</div>
                                </div>
                                <div class="col-md-4 col-sm-26">
                                            <div class="card-block">
                                                <a href="{{route('hotels.show',$row->id)}}">
                                                <div class="card-description">
													<h5 class="card-title">{{$row->name}} </h5>
													<p class="card-description"></p>
												</div>
                                                </a>
												
												<div class="price">
													<h5>Prix</h5>
                                                    <a href="{{route('hotel.showDetails',[$row->id,$arrival_date,$departure_date])}}" class="btn btn-info">Découvrir</a>
												</div>
											</div>
                                </div>
                            </div>
							@endforeach
                            
                            
                            
                            <div class="row">
                                
                            </div>
                            
                                
                                 <div class="col-md-3 offset-md-4">
                                      
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
	<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
  	<script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script> 
    <script >
        $('.classfortypes').change(function(){
            $('#types_input').val('') ;
            $('.classfortypes').each(function(){
                if(this.checked){
                    if($('#types_input').val() == "" ){
                        $('#types_input').val(this.value);
                    }
                    else {
                        $('#types_input').val($('#types_input').val()+';'+this.value);
                    }
                    
                }
            });
        });
        //----------------------------
        $('.classforsupplements').change(function(){
            $('#supplements_input').val('') ;
            $('.classforsupplements').each(function(){
                if(this.checked){
                    if($('#supplements_input').val() == "" ){
                        $('#supplements_input').val(this.value);
                    }
                    else {
                        $('#supplements_input').val($('#supplements_input').val()+';'+this.value);
                    }
                    
                }
            });
        });
        //---------------------------------
        $('.classforstars').change(function(){
            $('#stars_input').val('') ;
            $('.classforstars').each(function(){
                if(this.checked){
                    if($('#stars_input').val() == "" ){
                        $('#stars_input').val(this.value);
                    }
                    else {
                        $('#stars_input').val($('#stars_input').val()+';'+this.value);
                    }
                    
                }
            });
        });
        //--------------------------------
        $('.classforservices').change(function(){
            $('#services_input').val('') ;
            $('.classforservices').each(function(){
                if(this.checked){
                    if($('#services_input').val() == "" ){
                        $('#services_input').val(this.value);
                    }
                    else {
                        $('#services_input').val($('#services_input').val()+';'+this.value);
                    }
                    
                }
            });
        });
        //-------------------------------
        $('.classforequipements').change(function(){
            $('#equipements_input').val('') ;
            $('.classforequipements').each(function(){
                if(this.checked){
                    if($('#equipements_input').val() == "" ){
                        $('#equipements_input').val(this.value);
                    }
                    else {
                        $('#equipements_input').val($('#equipements_input').val()+';'+this.value);
                    }
                    
                }
            });
        });

        //------------------------------
        $('#filter_button').click(function(){
            $.ajax({

                url : "{{route('searchResults.filter')}}",
                type : "get",
                data : {
                    types : $('#types_input').val(),
                    supplements : $('#supplements_input').val(),
                    stars : $('#stars_input').val(),
                    services : $('#services_input').val(),
                    equipements : $('#equipements_input').val(),
                    arrival_date : "{{$arrival_date}}",
                    departure_date : "{{$departure_date}}",

                },
                success : function(result,status){

                    $('.Hotels').html(result);
                }
            });
        })


    </script>

	@endsection

