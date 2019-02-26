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
                                        <option value="1">Tunis </option>
                                        <option value="1">Hammamet</option>
                                        <option value="1">Sousse</option>
                                        <option value="1">Monastir</option>
                                        <option value="1">Bizerte </option>
                                        <option value="1">Tozeur</option>
                                        <option value="1">Zarzis </option>
                                        <option value="1">Ong jmal</option>
                                        <option value="1">Tatouine</option>
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
                                                    <a class="btn btn-info btn-block" href="{{route('search')}}#result"><i class="nc-icon nc-zoom-split"></i> &nbsp; Recherche</a>
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
                              <a href="#pablo" class="btn btn-info btn-round">View plus</a>
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