@extends('layouts.app')
@section('content')
<div class="testimonials-2 section section-testimonials section-dark">
            <div class="container" style="margin-top: 150px;">
                <div class="row">
                    <div class="col-md-2">
                        <div class="testimonials-people">
                            
                        </div>
                    </div>

                    <div class="col-md-6 offset-1">
                        <div class="page-carousel">
                            <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    @foreach($partners as $key=>$row)
                                    <li data-target="#carouselExampleIndicators2" data-slide-to="{{$key}}" class="{{$key==0 ? 'active' : '' }}"></li>
                                    @endforeach
                                    
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    @foreach($partners as $key=>$row)
                                    <div class="carousel-item {{$key==0 ? 'active' : ''}}">
                                        <div class="card card-testimonial card-plain">
                                            <div class="card-avatar">
                                                <img class="img" src="{{$row->picture_path}}">
                                            </div>
                                            <div class="card-block">
                                                <h5 class="card-description" style="text-align : justify;">
                                                    {{$row->description}}
                                                </h5>
                                                <div class="card-footer">
                                                    <h4 class="card-title">{{$row->name}}</h4>
                                                    <h6 class="card-category"></h6>
                                                    <div class="card-stars">
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    @endforeach

                                    

                                    
                                </div>
                                <a class="left carousel-control carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                                    <span class="fa fa-angle-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                                    <span class="fa fa-angle-right"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 offset-1">
                        <div class="testimonials-people">
                            
                        </div>
                    </div>

                </div>

            </div>

      </div>
@endsection
@section('js')

@endsection