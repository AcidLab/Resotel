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
            <a class="navbar-brand" href="{{route('home')}}">Resotel</a>
            <div class="collapse navbar-collapse">
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                     <a class="nav-link" data-scroll="true" href="{{route('partners')}}">Nos partenaires</a>
                  </li>
                  
                  <li class="nav-item">
                     <a class="nav-link" data-scroll="true" href="{{route('contact')}}">Contact</a>
                  </li>

                  @if (Auth::user())
                  <li class="nav-item">
                     <a class="nav-link" data-scroll="true" href="javascript:void(0)">{{Auth::user()->name}}</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" data-scroll="true"  href="{{route('logout')}}">Déconnexion</a>
                  </li>
                  @else
                  <li class="nav-item">
                     <a class="nav-link" data-scroll="true" href="{{route('register')}}">Inscription</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" data-scroll="true"  href="{{route('login')}}">S'identifier</a>
                  </li>
                  @endif
                  
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
         @yield('content')
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
                                 Acceuil
                                 </a>
                              </li>
                              <li>
                                 <a href="#paper-kit">
                                 Partenaires
                                 </a>
                              </li>
                              <li>
                                 <a href="#paper-kit">
                                 Contact
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
                                 Inscription
                                 </a>
                              </li>
                              <li>
                                 <a href="#paper-kit">
                                 Connextion
                                 </a>
                              </li>
                              <li>
                                 <a href="#paper-kit">
                                 Recrutement
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
                                 Portfolio
                                 </a>
                              </li>
                              <li>
                                 <a href="#paper-kit">
                                 How it works
                                 </a>
                              </li>
                              <li>
                                 <a href="#paper-kit">
                                 Testimonials
                                 </a>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="links">
                           <ul class="stacked-links">
                              <li>
                                 <a href="#paper-kit">
                                 Portfolio
                                 </a>
                              </li>
                              <li>
                                 <a href="#paper-kit">
                                 How it works
                                 </a>
                              </li>
                              <li>
                                 <a href="#paper-kit">
                                 Testimonials
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

<!-- Plugin for Switches -->
<script src="{{asset('assets/js/bootstrap-switch.min.js')}}"></script>

<!--  Plugins for Slider -->
<script src="{{asset('assets/js/nouislider.js')}}"></script>

<!--  Plugins for Select -->
<script src="{{asset('assets/js/bootstrap-select.js')}}"></script>

<!-- Control Center for Paper Kit: parallax effects, scripts for the example pages etc -->
<script src="{{asset('assets/js/paper-kit.js?v=2.0.1')}}"></script>
   @yield('js')
</html>