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
								<div class="card-header card-collapse" role="tab" id="priceRanger">
										<h5 class="mb-0 panel-title">
											<a class="" data-toggle="collapse" data-parent="#accordion" href="#priceRange" aria-expanded="true" aria-controls="collapseOne">
												Prix
												<i class="nc-icon nc-minimal-down"></i>
											</a>
										</h5>
								</div>
								<div  class="collapse " id="priceRange" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true">
									<div class="card-block">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<input type="number" class="form-control border-input" placeholder="Min" min="0" />
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
												<input type="number" class="form-control border-input" placeholder="Max" min="0" />
												</div>
											</div>
										</div>
									</div>
								</div>
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
										<div class="checkbox">
											<input id="checkbox1" type="checkbox" >
											<label for="checkbox1">
												Blazers
											</label>
										</div>
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
	  <script>
                            var min = 10;
                            var max = 150;
                            $( function() {
    $("#sliderDouble").slider({
      range: true,
      min: min,
      max: max,
      values: [ min, max ],
      slide: function( event, ui ) {
       window.alert('rrr');
      }
    });
    $( "#amount2" ).val( "$" + $( "#sliderDouble" ).slider( "values", 0 ) +
      " - $" + $( "#sliderDouble" ).slider( "values", 1 ) );

    $( "#amount2" ).val( "" + $( "#sliderDouble" ).slider( "values", 0 ) +
      ";" + $( "#sliderDouble" ).slider( "values", 1 ) );
    
  } );
  </script>  
	@endsection

