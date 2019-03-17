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
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="text" name="word" value="" placeholder="Recherche" class="form-control" style="height:47px;"/>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                <div class="form-group" style="width:100% !important;">
                                    <select class="selectpicker" name="city" data-style="btn btn-default btn-block btn-large">
                                        <option disabled selected> Ou ?</option>
                                          @if(Auth::user())
                                             @foreach($cities as $row)
                                                <option value="{{$row->id}}">{{$row->label}}</option>
                                             @endforeach
                                          @endif
                                   </select>
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
								<h6 class="card-category">Services</h6>
								
								<ul>
									
								</ul>
								
							</div>
						</div>
                </div>
			</div>
		</div>
                </div>
            </div>
@endsection