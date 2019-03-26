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