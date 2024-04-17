<!DOCTYPE html>
<html lang="en">
<head>
<title>SpaClean - Home</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="Spaclean AutoCar Cleaning Solutions." />
<meta name="keywords" content="spaclean, maridady motors">
<meta name="author" content="Digital Africa" />

<link rel="icon" href="../logo.jpg" type="image/x-icon">


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">


<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="../test/bootstrap.min.css">

<link rel="stylesheet" href="../test/waves.min.css" type="text/css" media="all">

<link rel="stylesheet" type="text/css" href="../test/feather.css">

<link rel="stylesheet" type="text/css" href="../test/font-awesome-n.min.css">

<link rel="stylesheet" href="../test/chartist.css" type="text/css" media="all">

<link rel="stylesheet" type="text/css" href="../test/style.css">
<link rel="stylesheet" type="text/css" href="../test/widget.css">
<link rel="stylesheet" type="text/css" href="../test/pages.css">
<link rel="stylesheet" type="text/css" href="../test/component.css">
<link rel="stylesheet" type="text/css" href="../test/sweetalert.css">
<link rel="stylesheet" type="text/css" href="../test/themify-icons.css">


<!-- Added to show -->
<!-- feather Awesome -->
<link rel="stylesheet" type="text/css" href="..\files\assets\icon\feather\css\feather.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

 <!-- Style.css -->
               


</head>
<body>

<div class="loader-bg">
<div class="loader-bar"></div>
</div>

<div id="pcoded" class="pcoded">
<div class="pcoded-overlay-box"></div>
<div class="pcoded-container navbar-wrapper">

<nav class="navbar header-navbar pcoded-header">
<div class="navbar-wrapper">
<div class="navbar-logo">
<a href="">
<img class="img-fluid" style="width: 190px; height:52px;" src="..\files\assets\images\auth\logo.jpg" alt="Logo" />
</a>
<a class="mobile-menu" id="mobile-collapse" href="!">
<i class="feather icon-menu"></i>
</a>
<a class="mobile-options waves-effect waves-light">
<i class="feather icon-more-horizontal"></i>
</a>
</div>
<div class="navbar-container container-fluid">
<ul class="nav-left">
<li class="header-search">
<div class="main-search morphsearch-search">
<div class="input-group">
<span class="input-group-prepend search-close">
<i class="feather icon-x input-group-text"></i>
</span>
<input type="text" class="form-control" placeholder="Enter Keyword">
<span class="input-group-append search-btn">
<i class="feather icon-search input-group-text"></i>
</span>
</div>
</div>
</li>
<li>
<a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
<i class="full-screen feather icon-maximize"></i>
</a>
</li>
</ul>

<ul class="nav-right">

<!-- <li class="header-notification">
<div class="dropdown-primary dropdown">
<div class="displayChatbox dropdown-toggle" data-toggle="dropdown">
<i class="feather icon-message-square"></i>
<span class="badge bg-c-green">3</span>
</div>
</div>
</li> -->

<li class="user-profile header-notification">
<div class="dropdown-primary dropdown">
<div class="dropdown-toggle" data-toggle="dropdown">
<img src="../images/noprofile.png" class="img-radius" alt="User-Profile-Image">
<span>{{Auth::user()->name}}</span>
<?php
$user = Auth::user();
Session::put('unique_id', $user->unique_id);
$user=Session::get('unique_id');

 ?>             
<i class="feather icon-chevron-down"></i>
</div>
<ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
<li>
<a href="{{route('mybazar')}}">
<i class="fa fa-bus"></i> My Car Bazar
</a>
</li>
<li>
<a href="{{route('network')}}">
<i class="feather icon-mail"></i> My Messages
</a>
</li>

<li>
<a href="{{route('myprofile')}}">
<i class="feather icon-user"></i> Profile
</a>
</li>
<li>
<a href="{{route('profile.edit')}}">
<i class="feather icon-user"></i> Change Password
</a>
</li>



<li>
<a href="{{route('logout')}}">
<i class="feather icon-log-out"></i> Logout
</a>
</li>
</ul>
</div>
</li>
</ul>
</div>
</div>
</nav>


<div class="pcoded-main-container">
<div class="pcoded-wrapper">

<nav class="pcoded-navbar">
<div class="nav-list">
<div class="pcoded-inner-navbar main-menu">
<div class="pcoded-navigation-label">Navigation</div>

<ul class="pcoded-item pcoded-left-item">

<li class="{{ (request()->segment(1) == 'dashboard') ? 'active' : '' }}">
<a href="{{route('dashboard')}}" class="waves-effect waves-dark">
<span class="pcoded-micon"><i class="feather icon-home"></i></span>
<span class="pcoded-mtext">Dashboard</span>
</a>
</li>

<!-- 
<li class="{{ (request()->segment(1) == 'carbookings') ? 'active' : '' }}">
<a href="{{route('carbookings')}}" class="waves-effect waves-dark">
<span class="pcoded-micon">
<i class="feather icon-aperture rotate-refresh"></i></span>
<span class="pcoded-mtext">Car Bookings</span>
</a>
</li> -->

<li class="pcoded-hasmenu {{ (request()->segment(1) == 'carbookings') ? 'active' : '' }}" dropdown-icon="style1" subitem-icon="style1">
                                  <a href="javascript:void(0)">
                                  <span class="pcoded-micon"><i class="feather  icon-aperture rotate-refresh"></i></span>
                                      <span class="pcoded-mtext">Car Bookings</span>
                                  </a>
                                  <ul class="pcoded-submenu">
                                  <li class="{{ (request()->segment(1) == 'carbookings') ? 'active' : '' }}">
                                          <a href="{{route('carbookings')}}">
                                              <span class="pcoded-mtext">Book Now</span>
                                          </a>
                                      </li>
                                      <li class="{{ (request()->segment(1) == 'mycarbookings') ? 'active' : '' }}">
                                          <a href="{{route('mycarbookings')}}">
                                              <span class="pcoded-mtext">My Car Bookings</span>
                                              <!-- <span class="pcoded-badge label label-info">NEW</span> -->
                                          </a>
                                      </li>
                                  
                                  </ul>
                              </li>


                              <li class="pcoded-hasmenu {{ (request()->segment(1) == 'homecare') ? 'active' : '' }}" dropdown-icon="style1" subitem-icon="style1">
                                  <a href="javascript:void(0)">
                                  <span class="pcoded-micon"><i class="feather icon-airplay"></i></span>
                                      <span class="pcoded-mtext">HomeCare Bookings</span>
                                  </a>
                                  <ul class="pcoded-submenu">
                                  <li class="{{ (request()->segment(1) == 'homecare') ? 'active' : '' }}">
                                          <a href="{{route('homecare')}}">
                                              <span class="pcoded-mtext">Book Now</span>
                                          </a>
                                      </li>
                                      <li class="{{ (request()->segment(1) == 'myhomebookings') ? 'active' : '' }}">
                                          <a href="{{route('myhomebookings')}}">
                                              <span class="pcoded-mtext">My Bookings</span>
                                              <!-- <span class="pcoded-badge label label-info">NEW</span> -->
                                          </a>
                                      </li>
                                  
                                  </ul>
                              </li>


<!-- <li class="{{ (request()->segment(1) == 'homecare') ? 'active' : '' }}">
<a href="{{route('homecare')}}" class="waves-effect waves-dark">
<span class="pcoded-micon">
<i class="feather icon-airplay"></i></span>
<span class="pcoded-mtext">HomeCare Bookings</span>
</a>
</li> -->

<li class="{{ (request()->segment(1) == 'market') ? 'active' : '' }}">
<a href="{{route('market')}}" class="waves-effect waves-dark">
<span class="pcoded-micon">
<i class="feather icon-command"></i></span>
<span class="pcoded-mtext">Market </span>
</a>
</li>


                                <li class="pcoded-hasmenu {{ (request()->segment(1) == 'networkconnect') ? 'active' : '' }}" dropdown-icon="style1" subitem-icon="style1">
                                  <a href="javascript:void(0)">
                                      <span class="pcoded-micon"><i class="feather icon-server"></i></span>
                                      <span class="pcoded-mtext">Network Connect</span>
                                  </a>
                                  <ul class="pcoded-submenu">
                                  <li class="{{ (request()->segment(1) == 'networkconnect') ? 'active' : '' }}">
                                          <a href="{{route('networkconnect')}}">
                                              <span class="pcoded-mtext">Network Connect</span>
                                          </a>
                                      </li>
                                      <li class="{{ (request()->segment(1) == 'managenetwork') ? 'active' : '' }}">
                                          <a href="{{route('managenetwork')}}">
                                              <span class="pcoded-mtext">Manage my Network</span>
                                              <!-- <span class="pcoded-badge label label-info">NEW</span> -->
                                          </a>
                                      </li>
                                      <li class="{{ (request()->segment(1) == 'invitations') ? 'active' : '' }}">
                                          <a href="{{route('invitations')}}">
                                              <span class="pcoded-mtext">Invitations</span>
                                              <!-- <span class="pcoded-badge label label-info">NEW</span> -->
                                          </a>
                                      </li>
                                  </ul>
                              </li>

<li class="{{ (request()->segment(1) == 'carbazar') ? 'active' : '' }}">
<a href="{{route('carbazar')}}" class="waves-effect waves-dark">
<span class="pcoded-micon">
<i class="feather icon-bookmark"></i>
</span>
<span class="pcoded-mtext">Car Bazar </span>
</a>
</li>

<li class="{{ (request()->segment(1) == 'contact') ? 'active' : '' }}">
<a href="{{route('contact')}}" class="waves-effect waves-dark">
<span class="pcoded-micon">
<i class="feather icon-mail"></i></span>
<span class="pcoded-mtext">Contact Us</span>
</a>
</li>

<li class="{{ (request()->segment(1) == 'myprofile') ? 'active' : '' }}">
<a href="{{route('myprofile')}}" class="waves-effect waves-dark">
<span class="pcoded-micon">
<i class="feather icon-settings"></i>
</span>
<span class="pcoded-mtext">My Profile </span>
</a>
</li>

<li class="{{ (request()->segment(1) == 'privacy') ? 'active' : '' }}">
<a href="{{route('privacy')}}" class="waves-effect waves-dark">
<span class="pcoded-micon">
<i class="feather icon-globe"></i>
</span>
<span class="pcoded-mtext">Privacy Policy </span>
</a>
</li>


<!-- <li class="{{ (request()->segment(1) == 'about') ? 'active' : '' }}">
<a href="{{route('about')}}" class="waves-effect waves-dark">
<span class="pcoded-micon">
<i class="feather icon-briefcase"></i>
</span>
<span class="pcoded-mtext">About Us </span>
</a>
</li> -->



<li class>
<a href="{{route('logout')}}" class="waves-effect waves-dark">
<span class="pcoded-micon">
<i class="feather icon-log-out"></i>
</span>
<span class="pcoded-mtext">Logout</span>
</a>
</li>


</ul>
</div>
</div>
</nav>



<main class="py-4">
            @yield('content')
    </main>




    <script type="text/javascript" src="../test/jquery.min.js"></script>
<script type="text/javascript" src="../test/jquery-ui.min.js"></script>
<script type="text/javascript" src="../test/popper.min.js"></script>
<script type="text/javascript" src="../test/bootstrap.min.js"></script>

<script src="../test/waves.min.js"></script>

<script type="text/javascript" src="../test/jquery.slimscroll.js"></script>

<script src="../test/jquery.flot.js"></script>
<script src="../test/jquery.flot.categories.js"></script>
<script src="../test/curvedLines.js"></script>
<script src="../test/jquery.flot.tooltip.min.js"></script>

<script src="../test/amcharts.js"></script>
<script src="../test/serial.js"></script>
<script src="../test/light.js"></script>

<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="../test/gmaps.js"></script>

<script src="../test/pcoded.min.js"></script>
<script src="../test/vertical-layout.min.js"></script>
<script type="text/javascript" src="../test/crm-dashboard.min.js"></script>
<script type="text/javascript" src="../test/script.min.js"></script>



<!-- other scripts -->
   


</body>
</html>

