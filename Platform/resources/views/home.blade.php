
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.ico')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Resotel</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/paper-kit.css?v=2.0.1')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css/demo.css')}}" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{asset('assets/css/nucleo-icons.css')}}" rel="stylesheet">

</head>
<body>
	<nav class="navbar navbar-toggleable-md fixed-top bg-info navbar-transparent" color-on-scroll="200">
        <div class="container">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-bar"></span>
				<span class="navbar-toggler-bar"></span>
				<span class="navbar-toggler-bar"></span>
            </button>
            <a class="navbar-brand" href="">Resotel</a>
			<div class="collapse navbar-collapse">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="index.html" data-scroll="true" href="javascript:void(0)">Demo</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="index.html" data-scroll="true" href="javascript:void(0)">Nos partenaires</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="index.html" data-scroll="true" href="javascript:void(0)">Contact</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="index.html" data-scroll="true" href="javascript:void(0)">Inscription</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" data-scroll="true" data-toggle="modal" data-target="#loginModal" href="#">S'identifier</a>
					</li>
				</ul>
			</div>
		</div>
    </nav>



    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="false">
                                <div class="modal-dialog modal-register">
                                    <div class="modal-content">
                                        <div class="modal-header no-border-header text-center">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h6 class="text-muted">Bienvenue</h6>
                                            <h3 class="modal-title text-center">Resotel</h3>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Email</label>
                                	        	<input type="text" value="" placeholder="Email" class="form-control" />
                                        	</div>
                                    	    <div class="form-group">
                                                <label>Mot de passe</label>
                            	        	    <input type="password" value="" placeholder="Mot de passe" class="form-control" />
                                    	    </div>
                                            <button class="btn btn-block btn-round btn-info">Connexion</button>
                                            <center style="margin-top: 20px;">
                                            	<a href="#paper-kit" class="text-center"> Mot de passe oublié ?</a>
                                            </center>
                                            
                                        </div>
                                        <div class="modal-footer no-border-footer">


                                            <span class="text-muted  text-center">Vous n'avez pas de compte ?<a href="#paper-kit"> Inscrivez-vous</a> </span>
                                        </div>
                                    </div>
                                </div>
                            </div>



    <div class="wrapper">

    		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="height: 85vh;">
                    <ol class="carousel-indicators" style="margin-top: -140px !important;display: none;">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <div class="page-header" style="background-image: url('https://www.tunisienumerique.com/wp-content/uploads/2018/02/banquie.jpg');">
                                <div class="filter"></div>
                                <div class="content-center">
                                                <h1 class="title">Decouvrez Nos offres Incroyables en </h1>
                                                <h1 style = "font-family:georgia,garamond,serif;font-size:100px;font-style:italic;">Tunisie</h1>
                                                <br>
                                                <form action="" method="post">
                                                <div class="row">
                                                   <div class="col-md-4 col-sm-4">
                                                   <label for="act">Qu'est ce que vous aimerez faire? </label>
                                                   </div>
                                                   <div class="col-md-4 col-sm-4">
                                                   <label for="dist">Ou voulez vous aller? </label>
                                                   </div>
                                                 </div>
                                                <div class="row">
                                                <div class="col-md-4 col-sm-4">
                                                <input type="text" id="act" name="activity" style="background-color:transparent;border-left-color:transparent;border-top-color:transparent;border-right-color:transparent">
                                                </div>
                                                <div class="col-md-4 col-sm-4">
                                                 <input type="text" id="dist" name="distination" style="background-color:transparent;border-left-color:transparent;border-top-color:transparent;border-right-color:transparent">
                                                </div>
                                                </div>
                                                <div class="row">
                                                <div class="col-md-4 col-sm-4">
                                                <label for="dep">Départ</label>
                                                </div>
                                                <div class="col-md-4 col-sm-4">
                                                <label for="dur">Durée </label>
                                                </div>
                                                <div class="col-md-4 col-sm-4">
                                                <label for="voy">Voyageurs </label>
                                                 </div>
                                                 </div>
                                                 <div>
                                                 <div class="row">
                                                 <div class="col-md-4 col-sm-4">
                                                 <input type="text" id="dep" name="depart" style="background-color:transparent;border-left-color:transparent;border-top-color:transparent;border-right-color:transparent">
                                                 </div>
                                                 <div class="col-md-4 col-sm-4">
                                                 <input type="text" id="dur" name="duree " style="background-color:transparent;border-left-color:transparent;border-top-color:transparent;border-right-color:transparent">
                                                 </div>
                                                 <div class="col-md-4 col-sm-4">
                                                 <input type="text" id="voy" name="voyageurs" style="background-color:transparent;border-left-color:transparent;border-top-color:transparent;border-right-color:transparent">
                                                 </div>
                                                 </div>
                                                 <br />
                                                 <div>
                                                 <button type="button" class="btn btn-info">Recherche</button>
                                                 </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        


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
													<h5 class="card-title">Hotel el Mouradi Monastir </h5>
													<p class="card-description">110 $</p>
												</div>
												<div class="price">
													<h5>prix</h5>
                                                    <a href="#" class="btn btn-info">Découvrir</a>
												</div>
											</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-16">
									<div class="card card-product card-plain">
										<div class="card-image">
											<a href="#paper-kit">
												<img src="{{asset('assets\img\zodiac.jpg')}}" alt="Rounded Image" class="img-rounded img-responsive">
											</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-16">
											<div class="card-block">
												<div class="card-description">
													<h5 class="card-title">Hotel Zodiac Hammamet</h5>
													<p class="card-description">100 $</p>
												</div>
												<div class="price">
													<h5>prix</h5>
                                                    <a href="#" class="btn btn-info">Découvrir</a>
												</div>
											</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-16">
									<div class="card card-product card-plain">
										<div class="card-image">
											<a href="#paper-kit">
												<img src="{{asset('assets\img\badira.jpg')}}" alt="Rounded Image" class="img-rounded img-responsive">
											</a>
											
										</div>
									</div>
                                </div>
                                <div class="col-md-4 col-sm-16">
                                 <div class="card-block">
												<div class="card-description">
													<h5 class="card-title">Hotel Badira Hammamet</h5>
													<p class="card-description">100 $</p>
												</div>
												<div class="price">
													<h5>prix</h5>
                                                    <a href="#" class="btn btn-info">Découvrir</a>
												</div>
							    </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-16">
									<div class="card card-product card-plain">
										<div class="card-image">
											<a href="#paper-kit">
												<img src="{{asset('assets\img\lella.jpg')}}" alt="Rounded Image" class="img-rounded img-responsive">
											</a>
										</div>
									</div>
                                </div>
                                <div class="col-md-4 col-sm-16">
                                   <div class="card-block">
												<div class="card-description">
													<h5 class="card-title">Hotel Lella Baya and Thalasso</h5>
													<p class="card-description">100 $</p>
												</div>
												<div class="price">
													<h5>prix</h5>
                                                    <a href="#" class="btn btn-info">Découvrir</a>
												</div>
								    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-16">
									<div class="card card-product card-plain">
										<div class="card-image">
											<a href="#paper-kit">
												<img src="{{asset('assets\img\moven.jpg')}}" alt="Rounded Image" class="img-rounded img-responsive">
											</a>
										</div>
									</div>
                                </div>
                                <div class="col-md-4 col-sm-16">
                                            <div class="card-block">
												<div class="card-description">
													<h5 class="card-title">Hotel Movenpick Resort</h5>
													<p class="card-description">100 $</p>
												</div>
												<div class="price">
													<h5>prix</h5>
                                                    <a href="#" class="btn btn-info">Découvrir</a>
												</div>
											</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-16">
									<div class="card card-product card-plain">
										<div class="card-image">
											<a href="#paper-kit">
												<img src="{{asset('assets\img\garden.jpg')}}" alt="Rounded Image" class="img-rounded img-responsive">
											</a>
										</div>
									</div>
                                </div>
                                <div class="col-md-4 col-sm-16">
                                           <div class="card-block">
												<div class="card-description">
													<h5 class="card-title">Hotel Royel Garden</h5>
													<p class="card-description">100 $</p>
												</div>
												<div class="price">
													<h5>prix</h5>
                                                    <a href="#" class="btn btn-info">Découvrir</a>
												</div>
											</div>
                                </div>
                            </div>
                                
                                 <div class="col-md-3 offset-md-4">
                                      <button rel="tooltip" title="This is a morphing button" class="btn btn-round btn-outline-default" id="successBtn" data-toggle="morphing" data-rotation-color="gray">Load more...</button>
                                 </div>
                            </div>
                        </div>
                    </div>
               </div>
           </div>

				
        </div>                               

				
    </div>
	<footer class="footer footer-black footer-big">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 text-center col-sm-3 col-xs-12">
                        <h4>Resotel</h4>
                        
                    </div>
                    <div class="col-md-9 offset-md-1 col-sm-9 col-xs-12">
                        <div class="row">
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <div class="links">
                                    <ul class="uppercase-links stacked-links">
                                        <li>
                                            <a href="#paper-kit">
                                                Company
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#paper-kit">
                                                About
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#paper-kit">
                                                Team
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#paper-kit">
                                                Privacy Policy
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#paper-kit">
                                               careers
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <div class="links">
                                    <ul class="uppercase-links stacked-links">
                                        <li>
                                            <a href="#paper-kit">
                                              Locations
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#paper-kit">
                                               Osaka
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#paper-kit">
                                               Tokyo
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#paper-kit">
                                               kyoto
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#paper-kit">
                                               hokkaido
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <div class="links">
                                    <ul class="uppercase-links stacked-links">
                                        <li>
                                            <a href="#paper-kit">
                                               Social Media
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#paper-kit">
                                               Instagram
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#paper-kit">
                                               twitter
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#paper-kit">
                                               Facebook
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#paper-kit">
                                               Youtube
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="copyright">
                            <div class="pull-left">
                                © <script>document.write(new Date().getFullYear())</script> Acid Labs, made with love
                            </div>
                            <div class="links pull-right">
                                <ul>
                                    <li>
                                        <a href="#paper-kit">
                                            Company Policy
                                        </a>
                                    </li>
                                    |
                                    <li>
                                        <a href="#paper-kit">
                                            Terms
                                        </a>
                                    </li>
                                    |
                                    <li>
                                        <a href="#paper-kit">
                                            Privacy
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </footer>
</body>

<!-- Core JS Files -->
<script src="{{asset('assets/js/jquery-3.2.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/jquery-ui-1.12.1.custom.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/tether.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>

<!-- Control Center for Paper Kit: parallax effects, scripts for the example pages etc -->
<script src="{{asset('assets/js/paper-kit.js?v=2.0.1')}}"></script>

</html>
