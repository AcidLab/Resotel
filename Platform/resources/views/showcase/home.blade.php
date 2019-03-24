@extends('layouts.app')
@section('content')
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="height: 85vh;">
            <ol class="carousel-indicators" style="margin-top: -140px !important; display : none !important;">
               @foreach($sliders as $key=>$row)
                  <li data-target="#carouselExampleIndicators" data-slide-to="{{$key}}" class="{{$key==0 ? 'active' : ''}}"></li>
               @endforeach
            </ol>
            <div class="carousel-inner" role="listbox">
            @foreach($sliders as $key=>$row)
               <div class="carousel-item {{$key== 0 ? 'active' : ''}}">
                  <div class="page-header" style="background-image: url({{$row->picture_path}})">
                     <div class="filter"></div>
                     <div class="content-center">
                        <div class="container">
                           <div class="row" style="margin-top: -280px;">
                              <div class="col-md-10 text-left">
                                 <h1 class="title">{{$row->title}}</h1>
                                 <h5 style="text-align : justify !important;">{{$row->description}}</h5>
                                 <br>
                              </div>
                           </div>
                        </div>
                     </div>
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
         <div class="section landing-section register">
            <div class="" style="padding-left: 150px;padding-right: 150px;">
               <div class="row">
                  <div class="col-md-12" style="margin-top: -200px;width: 100% !important;">
                     <div class="card">
                        <div class="container">
                           <h2 class="title" style="margin-top: 50px;margin-bottom: 100px;margin-left: 50px;">A propos de Resotel</h2>
                           <div class="row" style="margin-bottom: 100px;">
                           @foreach($abouts as $row)
                           <div class="col-md-4">
                                 <div class="info">
                                    <div class="icon icon-info">
                                       <i class="nc-icon {{$row->icon_class}}"></i>
                                    </div>
                                    <div class="description">
                                       <h4 class="info-title">{{$row->title}}</h4>
                                       <p class="description" style="text-align : justify !important;">{{$row->content}}</p>
                                    </div>
                                 </div>
                              </div>
                           @endforeach
                              
                              
                              
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12 ">
                     <h3 class="title"><strong><b>Inspirez-vous pour votre prochain voyage</b></strong></h3>
                     <div style="height: 1px;background-color: #006dfe;width: 200px;"></div>
                     <h5></h5>
                     <br />
                  </div>
               </div>
               <br /><br />
               
               <div class="row">
               @foreach($nexts as $key=>$row)
                  @if($key==0 || $key==1)
                     <div class="col-md-6">
                        <div class="card" data-background="image" style="background-image: url({{$row->picture_path}});height: 300px;">
                           <div class="card-block" style="margin-top: 20vh;">
                              <h3 class="card-title"><strong><b>{{$row->title}}</b></strong></h3>
                           </div>
                        </div>
                     </div>
                  @endif
               @endforeach
               </div>
               <div class="row">
               @foreach($nexts as $key=>$row)
                  @if($key!=0 && $key!=1)
                     <div class="col-md-4">
                        <div class="card" data-background="image" style="background-image: url({{$row->picture_path}});height: 300px;">
                           <div class="card-block" style="margin-top: 20vh;">
                              <h3 class="card-title"><strong><b>{{$row->title}}</b></strong></h3>
                           </div>
                        </div>
                     </div>
                  @endif
               @endforeach
               </div>
            </div>
         </div>
         <div class="section landing-section register" style="margin-top: -100px;">
            <div class="" style="padding-left: 150px;padding-right: 150px;">
               <div class="col-md-12 ">
                  <h3 class="title"><strong><b>Top endroit à visiter</b></strong></h3>
                  <div style="height: 1px;background-color: #006dfe;width: 200px;"></div>
                  <h5></h5>
                  <br />
               </div>
               <div class="row">
                  @foreach($places as $row)
                  <div class="col-md-4">
                     <div class="card card-blog">
                        <div class="card-image" >
                           <a href="#pablo">
                           <img class="img" src="{{$row->picture_path}}" style="height : 300px !important; width : 100% !important;">
                           </a>
                        </div>
                        <div class="card-block">
                           <h4 class="card-title">
                              {{$row->title}}
                           </h4>
                           <div class="card-description" style="text-align : justify !important;">
                              {{$row->description}}
                           </div>
                           <div class="card-footer">
                              <a href="#pablo" class="btn btn-info btn-round">Voir plus</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endforeach
                  
               </div>
            </div>
         </div>
         <div class="section landing-section register" style="margin-top: -100px;">
            <div class="" style="padding-left: 150px;padding-right: 150px;">
               <div class="col-md-12 ">
                  <h3 class="title"><strong><b>Nos partenaires</b></strong></h3>
                  <div style="height: 1px;background-color: #006dfe;width: 200px;"></div>
                  <h5></h5>
                  <br />
               </div>
               <div class="row">
               @foreach($partners as $row)
                  <div class="col-xs-6  col-sm-3 col-md-2">
                     <img src="{{$row->picture_path}}" class="img-thumbnail img-responsive" alt="Rounded Image" style="border-color: #ffffff; width: 100% !important; height : 120px !important;">
                     <p class="text-center">{{$row->name}}</p>
                  </div>
               @endforeach
               </div>
            </div>
         </div>
         <div class="page-header page-header-xs" style="height: 600px !important; background-image: url('https://images.unsplash.com/photo-1498063401574-13cbee350467?dpr=2&amp;auto=format&amp;fit=crop&amp;w=1500&amp;h=1000&amp;q=80&amp;cs=tinysrgb&amp;crop=');">
            <div class="filter"></div>
            <div class="container">
               <div class="row">
                  <div class="col-md-8 offset-md-2">
                     <h2 class="text-center">Contactez-nous</h2>
                     <form class="contact-form" method="POST" action="{{route('message.send')}}">
                        @csrf
                        <div class="row">
                           <div class="col-md-6">
                              <label>Nom</label>
                              <input class="form-control" placeholder="Nom" required name="name">
                           </div>
                           <div class="col-md-6">
                              <label>Email</label>
                              <input type="email" class="form-control" placeholder="Email" required name="email">
                           </div>
                           <div class="col-md-6">
                              <label>Nom de l'agence</label>
                              <input class="form-control" placeholder="Nom de l'agence" required name="agency_name">
                           </div>
                           <div class="col-md-6">
                              <label>Téléphone</label>
                              <input class="form-control" placeholder="Téléphone" type="number" required name="phone">
                           </div>
                        </div>
                        <label>Message</label>
                        <textarea class="form-control" rows="4" placeholder="Racontez-nous vos pensées et vos sentiments ..." required name="message"></textarea>
                        <div class="row">
                           <div class="col-md-4 offset-md-4">
                              <button class="btn btn-info btn-lg btn-fill">Envoyez</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
@endsection