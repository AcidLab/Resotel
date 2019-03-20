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
            @if(Session::get('failure'))
            <div class="alert alert-danger alert-with-icon" data-notify="container" style="width: 50%; margin:auto;margin-top : 10px;border-radius : 5px;">
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
            <div class="row">
                <div class="col-md-12">
                    <h4></h4>
                </div>
                <div class="col-md-12 ">
                

                    <h4 class="title"><small>Disponibilité</small></h4>
                    <form action="{{route('bookings.store')}}" method="POST">
                    {{csrf_field()}}
                    <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                
                                <th></th>
                                <th style="visibility : hidden;"> </th>
                                <th style="text-align : center;">Type de la  chambre</th>
                                <th style="text-align : center;">Arrangement</th>
                                <th style="text-align : center;">Nombre des chambres</th>
                                <th style="text-align : center;">Suppléments</th>
                                <th style="text-align : center ; ">Nombre d'adultes</th>
                                <th style="text-align : center ; ">Nombre d'enfants</th>
                                <th style="text-align : center ; ">Nombre de bébés</th>
                                <th style="text-align : center ; ">Date d'arrivée</th>
                                <th style="text-align : center ; ">Date de départ</th>
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($hotel->roomTypes as $key=>$row)
                            @if($row->availableRooms($row->hotel_id) > 0)
                            <tr>

                                
                                <td>
                                    <div class="checkbox">
                                    <input id="checkbox{{$row->id}}" name="type[]" value="{{$row->type->id}}" type="checkbox">
                                    <label for="checkbox{{$row->id}}"></label>
                                </div>
                                </td>
                                <td style="text-align : center;">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{$row->hotel_id}}" required name="hotel_id_for_{{$row->type->id}}" hidden />
                                    </div>
                                </td>
                                <td style="text-align : center;" data-toggle="tooltip" title="Minimum personnes : {{$row->min_persons}} Maximum personnes : {{$row->max_persons}}">{{$row->type->name}}</td>
                                <td style="text-align : center ; ">{{$row->arrangement->name}}</td>
                                <td style="text-align : center;">
                                    <div class="form-group">
                                        <select class="form-control" required name="rooms_number_for_{{$row->type->id}}">
                                            @for( $i =0 ; $i<$row->availableRooms($row->hotel_id);$i++)
                                                <option value="{{$i+1}}">{{$i+1}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </td>
                                <td style="text-align:center;">
                                    <div class="form-group">
                                        <select class="form-control" multiple name="supps_for_{{$row->type->id}}[]">
                                            @foreach($supplements as $supp)
                                                <option value="{{$supp->id}}">{{$supp->name}}</option>
                                            @endforeach
                                        </select>
                                    </div> 
                                </td>
                                <td style="text-align : center;">
                                    <div class="form-group">
                                        <input type="number" min="{{$row->min_major}}" max="{{$row->max_major}}" value="{{$row->min_major}}" required name="nb_majors_for_{{$row->type->id}}" class="form-control">
                                    </div>

                                </td>
                                <td style="text-align : center;">
                                    <div class="form-group">
                                    <input type="number" min="{{$row->min_children}}" max="{{$row->max_children}}" value="{{$row->min_children}}" required name="nb_childrens_for_{{$row->type->id}}" class="form-control">
                                    </div>
                                </td>
                                <td style="text-align : center;">
                                    <div class="form-group">
                                        <input type="number" value="0" min="0" max="{{$row->max_babies}}" required name="nb_babies_for_{{$row->type->id}}" class="form-control">
                                    </div>
                                </td>
                                <td style="text-align : center;">
                                    <div class="form-group">
                                        <input type="date" class="form-control" name="arrival_date_for_{{$row->type->id}}" required />
                                    </div>
                                </td>
                                <td style="text-align : center;">
                                    <div class="form-gorup">
                                        <input type="date" class="form-control" required name="departure_date_for_{{$row->type->id}}" />
                                    </div>
                                </td>
                                </tr>
                                @endif
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align : center;"><button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Commander</button></td>
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