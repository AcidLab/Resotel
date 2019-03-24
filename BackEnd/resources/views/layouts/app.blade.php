<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
    <title>@yield('title')</title>
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="{{asset('assets/node_modules/morrisjs/morris.css')}}" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="{{asset('assets/node_modules/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('assets/dist/css/style.min.css')}}" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="{{asset('assets/dist/css/pages/dashboard1.css')}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
@yield('css-includes')
</head>

<body class="skin-blue fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label"></p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="{{asset('assets/images/logo-icon.png')}}" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="{{asset('assets/images/logo-light-icon.png')}}" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         <!-- dark Logo text -->
                         <img src="{{asset('assets/images/logo-text.png')}}" alt="homepage" class="dark-logo" />
                         <!-- Light Logo text -->    
                         <img src="{{asset('assets/images/logo-light-text.png')}}" class="light-logo" alt="homepage" /></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler d-block d-sm-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item">
                            <form class="app-search d-none d-md-block d-lg-block">
                                <!--input type="text" class="form-control" placeholder="Search & enter"-->
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            
                            
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- mega menu -->
                        <!-- ============================================================== -->
                        
                        <!-- ============================================================== -->
                        <!-- End mega menu -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- User Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="hidden-md-down">{{Auth::user()->name}} &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                               
                                <!-- text-->
                                <a href="{{route('logout')}}" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                                <!-- text-->
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End User Profile -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                    <li> 
                       
                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                       
                        <i class="icon-book-open"></i>
                        <span class="hide-menu">Pages </span></a>
                        <ul aria-expanded="false" class="collapse">
                        <li class="element {{preg_match('/slider/',\Request::route()->getName()) ? 'active' : ''}}"> 
                            <a class=" waves-effect waves-dark {{preg_match('/slider/',\Request::route()->getName()) ? 'active' : ''}}" href="{{route('sliders.index')}}" aria-expanded="false">
                                <i class="ti-image"></i>
                                <span class="hide-menu">Carousel</span>
                            </a>     
                        </li>
                        <li class="element {{preg_match('/about/',\Request::route()->getName()) ? 'active' : ''}}"> 
                            <a class=" waves-effect waves-dark {{preg_match('/about/',\Request::route()->getName()) ? 'active' : ''}}" href="{{route('abouts.index')}}" aria-expanded="false">
                                <i class="ti-layout-cta-left"></i>
                                <span class="hide-menu">Liste à propos </span>
                            </a>     
                        </li>
                        <li class="element {{preg_match('/partner/',\Request::route()->getName()) ? 'active' : ''}}"> 
                            <a class=" waves-effect waves-dark {{preg_match('/partner/',\Request::route()->getName()) ? 'active' : ''}}" href="{{route('partners.index')}}" aria-expanded="false">
                                <i class="ti-home"></i>
                                <span class="hide-menu">Partenaires </span>
                            </a>     
                        </li>
                        <li class="element {{preg_match('/next/',\Request::route()->getName()) ? 'active' : ''}} "> 
                            <a class=" waves-effect waves-dark {{preg_match('/next/',\Request::route()->getName()) ? 'active' : ''}}" href="{{route('nexts.index')}}" aria-expanded="false">
                                <i class="ti-rocket"></i>
                                <span class="hide-menu"> Prochains voyages </span>
                            </a>     
                        </li>
                        <li class="element {{preg_match('/place/',\Request::route()->getName()) ? 'active' : ''}} "> 
                            <a class=" waves-effect waves-dark {{preg_match('/place/',\Request::route()->getName()) ? 'active' : ''}}" href="{{route('places.index')}}" aria-expanded="false">
                                <i class="ti-location-pin"></i>
                                <span class="hide-menu"> Places </span>
                            </a>     
                        </li>
                            
                        </ul>
                        
                    </li>
                    <li> 
                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="icon-settings"></i>
                        <span class="hide-menu">Paramétrage Hôtels </span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li class="element {{preg_match('/service/',\Request::route()->getName()) ? 'active' : ''}} "> 
                                <a class=" waves-effect waves-dark {{preg_match('/service/',\Request::route()->getName()) ? 'active' : ''}}" href="{{route('services.index')}}" aria-expanded="false">
                                    <i class="ti-rss-alt"></i>
                                    <span class="hide-menu"> Services </span>
                                </a>     
                            </li>
                            <li class="element {{preg_match('/equipement/',\Request::route()->getName()) ? 'active' : ''}} "> 
                            <a class=" waves-effect waves-dark {{preg_match('/equipement/',\Request::route()->getName()) ? 'active' : ''}}" href="{{route('equipements.index')}}" aria-expanded="false">
                                <i class="fa fa-life-saver"></i>
                                <span class="hide-menu"> Equipements </span>
                            </a>     
                        </li>

                        <li class="element {{preg_match('/roomtype/',\Request::route()->getName()) ? 'active' : ''}} "> 
                            <a class=" waves-effect waves-dark {{preg_match('/roomtype/',\Request::route()->getName()) ? 'active' : ''}}" href="{{route('roomtypes.index')}}" aria-expanded="false">
                                <i class="fa fa-navicon"></i>
                                <span class="hide-menu"> Types des chambres </span>
                            </a>     
                        </li>

                        <li class="element {{preg_match('/arrangement/',\Request::route()->getName()) ? 'active' : ''}} "> 
                            <a class=" waves-effect waves-dark {{preg_match('/arrangement/',\Request::route()->getName()) ? 'active' : ''}}" href="{{route('arrangements.index')}}" aria-expanded="false">
                                <i class="fa fa-wrench"></i>
                                <span class="hide-menu"> Arrangements </span>
                            </a>     
                        </li>


                        </ul>
                    </li>
                        

                        

                        

                        

                        

                        <li class="element {{preg_match('/hotel/',\Request::route()->getName()) ? 'active' : ''}} "> 
                            <a class=" waves-effect waves-dark {{preg_match('/hotel/',\Request::route()->getName()) ? 'active' : ''}}" href="{{route('hotels.index')}}" aria-expanded="false">
                                <i class="ti-home"></i>
                                <span class="hide-menu"> Hôtels </span>
                            </a>     
                        </li>

                        

                        
                        
                        <li class="element {{preg_match('/booking/',\Request::route()->getName()) ? 'active' : ''}} "> 
                            <a class=" waves-effect waves-dark {{preg_match('/booking/',\Request::route()->getName()) ? 'active' : ''}}" href="{{route('bookings.index')}}" aria-expanded="false">
                                <i class="fa  fa-sort-amount-asc"></i>
                                <span class="hide-menu"> Commandes </span>
                            </a>     
                        </li>

                        <li class="element {{preg_match('/contact/',\Request::route()->getName()) ? 'active' : ''}} "> 
                            <a class=" waves-effect waves-dark {{preg_match('/contact/',\Request::route()->getName()) ? 'active' : ''}}" href="{{route('contacts.index')}}" aria-expanded="false">
                                <i class="ti-email"></i>
                                <span class="hide-menu"> Contacts </span>
                            </a>     
                        </li>
                        <li class="element {{preg_match('/demand/',\Request::route()->getName()) ? 'active' : ''}} "> 
                            <a class=" waves-effect waves-dark {{preg_match('/demand/',\Request::route()->getName()) ? 'active' : ''}}" href="{{route('demands.index')}}" aria-expanded="false">
                                <i class="ti-user"></i>
                                <span class="hide-menu"> Demandes d'adhésion </span>
                            </a>     
                        </li>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">@yield('row-title')</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            @yield('add-button')
                        </div>
                    </div>
                </div>
                @yield('content')
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Info box -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- End Info box -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Over Visitor, Our income , slaes different and  sales prediction -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- Comment - table -->
                <!-- ============================================================== -->
               
                <!-- ============================================================== -->
                <!-- End Comment - chats -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Over Visitor, Our income , slaes different and  sales prediction -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- End Page Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Todo, chat, notification -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- End Page Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
        Copyright ©
            <script>document.write(new Date().getFullYear())</script>&nbsp;<a href="https://acidlabs.co" target="_blank" style="color:#03a9f3 !important;">Acidlabs.</a>
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{asset('assets/node_modules/jquery/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="{{asset('assets/node_modules/popper/popper.min.js')}}"></script>
    <script src="{{asset('assets/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('assets/dist/js/perfect-scrollbar.jquery.min.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('assets/dist/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('assets/dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('assets/dist/js/custom.min.js')}}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="{{asset('assets/node_modules/raphael/raphael-min.js')}}"></script>
    <script src="{{asset('assets/node_modules/morrisjs/morris.min.js')}}"></script>
    <script src="{{asset('assets/node_modules/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <!-- Popup message jquery -->
    <script src="{{asset('assets/node_modules/toast-master/js/jquery.toast.js')}}"></script>
    <!-- Chart JS -->
    <script src="{{asset('assets/dist/js/dashboard1.js')}}"></script>
    <script src="{{asset('assets/node_modules/toast-master/js/jquery.toast.js')}}"></script>
    @if(Session::get('success'))
        <script>
            $.toast({
            heading: 'Succés ! '
            , text: '{{Session::get("success")}}'
            , position: 'top-right'
            , loaderBg: '#00c292'
            , icon: 'info'
            , hideAfter: 3500
            , stack: 6
        });
        </script>
    @endif
    @yield('js-includes')
</body>

</html>