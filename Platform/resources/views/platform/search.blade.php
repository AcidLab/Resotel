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
                                        <form method="" action="">

                                        <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="text" value="" placeholder="Recherche" class="form-control" style="height:47px;"/>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                <div class="form-group" style="width:100% !important;">
                                    <select class="selectpicker" data-style="btn btn-default btn-block btn-large">
                                        <option disabled selected> Ou ?</option>
                                        @foreach($cities as $row)
										<option value="{{$row->id}}">{{$row->label}}</option>
										@endforeach
                                   </select>
                                </div>
                                                </div>

                                            </div>


                                            <div class="row" style="margin-top:20px;">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="date" value="" placeholder="Date d'arrivée" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="date" value="" placeholder="Date de départ" class="form-control" />
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
                                                    <button type="button" class="btn btn-info btn-block"><i class="nc-icon nc-zoom-split"></i> &nbsp; Recherche</a>
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
								<div id="prix" class="collapse show" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true" style="">
									<div class="card-block">
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
                                        window.alert('slider prix');
                                             }
                                 });
                                     $("#amount2" ).val( "$" + $( "#sliderDouble" ).slider( "values", 0 ) + " - $" + $( "#sliderDouble" ).slider( "values", 1 ) );

                                    $("#amount2" ).val( "" + $( "#sliderDouble" ).slider( "values", 0 ) + ";" + $( "#sliderDouble" ).slider( "values", 1 ) );
    
                              } );
                                     </script>  
										<div id="sliderDouble" class="slider slider-info noUi-target noUi-ltr noUi-horizontal noUi-background ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"><div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;"></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;"></span><div class="noUi-base"><div class="noUi-origin" style="left: 23.6364%;"><div class="noUi-handle noUi-handle-lower" data-handle="0" style="z-index: 5;"></div></div><div class="noUi-connect" style="left: 23.6364%; right: 20%;"></div><div class="noUi-origin" style="left: 80%;"><div class="noUi-handle noUi-handle-upper" data-handle="1" style="z-index: 4;"></div></div></div></div>
									</div>
								</div>
								<div class="card-header card-collapse" role="tab" id="evaluation">
									<h5 class="mb-0 panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#etoile" aria-expanded="false" aria-controls="collapseSecond">
											Evaluation étoilée
											<i class="nc-icon nc-minimal-down"></i>
										</a>
									</h5>
								</div>
                                <div id="etoile" class="collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="">
									<div class="card-block">
										<div class="checkbox">
											<input id="checkbox1" type="checkbox" checked="">
											<label for="checkbox1">
											2 étoiles
											</label>
										</div>

										<div class="checkbox">
											<input id="checkbox2" type="checkbox" checked="">
											<label for="checkbox2">
											3 étoiles
											</label>
										</div>
				
										<div class="checkbox">
											<input id="checkbox3" type="checkbox" checked="">
											<label for="checkbox3">
											4 étoiles
											</label>
										</div>
								
										<div class="checkbox">
											<input id="checkbox4" type="checkbox" checked="">
											<label for="checkbox4">
											5 étoiles 
											</label>
										</div>
									</div>
								</div>
								<div class="card-header card-collapse" role="tab" id="promo">
									<h5 class="mb-0 panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#promotion" aria-expanded="false" aria-controls="collapseThree">
											Promotions
											<i class="nc-icon nc-minimal-down"></i>
										</a>
									</h5>
								</div>
								<div id="promotion" class="collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">
									<div class="card-block">
										<div class="checkbox">
											<input id="checkbox5" type="checkbox" checked="">
											<label for="checkbox5">
												jusqu'a 20%
											</label>
										</div>
				
										<div class="checkbox">
											<input id="checkbox6" type="checkbox" checked="">
											<label for="checkbox6">
                                            Entre 20% et 30%
											</label>
										</div>
								
										<div class="checkbox">
											<input id="checkbox7" type="checkbox" checked="">
											<label for="checkbox7">
                                            Entre 30% et 40%
											</label>
										</div>
                                   
										<div class="checkbox">
											<input id="checkbox8" type="checkbox" checked="">
											<label for="checkbox8">
												Entre 40% et 50%
											</label>
										</div>
									</div>
								</div>
                                
                                <div class="card-header card-collapse" role="tab" id="dist">
									<h5 class="mb-0 panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#distance" aria-expanded="false" aria-controls="collapseThree">
											Distance hotel plage
											<i class="nc-icon nc-minimal-down"></i>
										</a>
									</h5>
								</div>
								<div id="distance" class="collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">
									<div class="card-block">
										<div class="checkbox">
											<input id="checkbox9" type="checkbox" checked="">
											<label for="checkbox9">
												les pieds dans l'eau
											</label>
										</div>
									
										<div class="checkbox">
											<input id="checkbox10" type="checkbox" checked="">
											<label for="checkbox10">
                                           moins de 500 m
											</label>
										</div>
									
										<div class="checkbox">
											<input id="checkbox11" type="checkbox" checked="">
											<label for="checkbox11">
                                            Entre 500 m et 1 km
											</label>
										</div>
									
										<div class="checkbox">
											<input id="checkbox12" type="checkbox" checked="">
											<label for="checkbox12">
												Plus de 1 km
											</label>
										</div>
									</div>
								</div>
                                
                                <div class="card-header card-collapse" role="tab" id="equ">
									<h5 class="mb-0 panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#eq" aria-expanded="false" aria-controls="collapseThree">
										Equipements
											<i class="nc-icon nc-minimal-down"></i>
										</a>
									</h5>
								</div>
								<div id="eq" class="collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">
									<div class="card-block">
										<div class="checkbox">
											<input id="checkbox13" type="checkbox" checked="">
											<label for="checkbox13">
											Animation
											</label>
										</div>
									
										<div class="checkbox">
											<input id="checkbox14" type="checkbox" checked="">
											<label for="checkbox14">
                                           Baby Sitting
											</label>
										</div>
									
										<div class="checkbox">
											<input id="checkbox15" type="checkbox" checked="">
											<label for="checkbox15">
                                            Discothèque
											</label>
										</div>
									
										<div class="checkbox">
											<input id="checkbox16" type="checkbox" checked="">
											<label for="checkbox16">
												Fitness
											</label>
										</div>
									
										<div class="checkbox">
											<input id="checkbox17" type="checkbox" checked="">
											<label for="checkbox17">
												Mini-Bar
											</label>
										</div>
								
										<div class="checkbox">
											<input id="checkbox18" type="checkbox" checked="">
											<label for="checkbox18">
                                           Parcs Aquatiques
											</label>
										</div>
									
										<div class="checkbox">
											<input id="checkbox19" type="checkbox" checked="">
											<label for="checkbox19">
                                            Parcours de Golf
											</label>
										</div>
								
										<div class="checkbox">
											<input id="checkbox20" type="checkbox" checked="">
											<label for="checkbox20">
												Piscines
											</label>
										</div>
									
										<div class="checkbox">
											<input id="checkbox21" type="checkbox" checked="">
											<label for="checkbox21">
                                            Piscines intérieures
											</label>
										</div>
									
										<div class="checkbox">
											<input id="checkbox21" type="checkbox" checked="">
											<label for="checkbox21">
                                           moins de 500 m
											</label>
										</div>
									
										<div class="checkbox">
											<input id="checkbox22" type="checkbox" checked="">
											<label for="checkbox22">
                                            Restauration
											</label>
										</div>
									
										<div class="checkbox">
											<input id="checkbox23" type="checkbox" checked="">
											<label for="checkbox23">
                                            Thalasso and Spa
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
											<a href="#paper-kit">
												<img src="{{asset('assets\img\mouradi.jpg')}}" alt="Rounded Image" class="img-rounded img-responsive">
											</a>
											
										</div>
									</div>
                                </div>
                                <div class="col-md-4 col-sm-26">
                                            <div class="card-block">
												<div class="card-description">
													<h5 class="card-title">{{$row->name}} </h5>
													<p class="card-description"></p>
												</div>
												<div class="price">
													<h5>prix</h5>
                                                    <a href="#" class="btn btn-info">Découvrir</a>
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

