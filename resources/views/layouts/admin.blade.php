<!DOCTYPE html>
<html lang="en">
<head>
<title>SpaClean - Admin</title>

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
<span>Admin - {{Auth::user()->name}}</span>
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

<div id="sidebar" class="users p-chat-user showChat">
<div class="had-container">
<div class="p-fixed users-main">
<div class="user-box">
<div class="chat-search-box">
<a class="back_friendlist">
<i class="feather icon-x"></i>
</a>
<div class="right-icon-control">
<div class="input-group input-group-button">
<input type="text" id="search-friends" name="footer-email" class="form-control" placeholder="Search Friend">
<div class="input-group-append">
<button class="btn btn-primary waves-effect waves-light" type="button"><i class="feather icon-search"></i></button>
</div>
</div>
</div>
</div>

<div class="main-friend-list">
    <div class="media userlist-box waves-effect waves-light" data-id="1" data-status="online" data-username="Josephin Doe">
    <a class="media-left" href="#!">
    <img class="media-object img-radius img-radius" src="../files/assets/images/avatar-3.jpg" alt="Generic placeholder image ">
        <div class="live-status bg-success">
            
        </div>
        </a>
        <div class="media-body">
            <div class="chat-header">Josephin Doe</div>
            </div>
        </div>

                </div>
            </div>
        </div>
    </div>
</div>


<div class="showChat_inner">
<div class="media chat-inner-header">
<a class="back_chatBox">
<i class="feather icon-x"></i> Josephin Doe
</a>
</div>

<div class="main-friend-chat">
<div class="media chat-messages">
<a class="media-left photo-table" href="#!">
<img class="media-object img-radius img-radius m-t-5" src="../files/assets/images/avatar-2.jpg" alt="Generic placeholder image">
</a>
<div class="media-body chat-menu-content">
<div class>
<p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
</div>
<p class="chat-time">8:20 a.m.</p>
</div>
</div>
<div class="media chat-messages">
<div class="media-body chat-menu-reply">
<div class>
<p class="chat-cont">Ohh! very nice</p>
</div>
<p class="chat-time">8:22 a.m.</p>
</div>
</div>
<div class="media chat-messages">
<a class="media-left photo-table" href="#!">
<img class="media-object img-radius img-radius m-t-5" src="../files/assets/images/avatar-2.jpg" alt="Generic placeholder image">
</a>
<div class="media-body chat-menu-content">
<div class>
<p class="chat-cont">can you come with me?</p>
</div>
<p class="chat-time">8:20 a.m.</p>
</div>
</div>
</div>

<div class="chat-reply-box">
<div class="right-icon-control">
<div class="input-group input-group-button">
<input type="text" class="form-control" placeholder="Write hear . . ">
<div class="input-group-append">
<button class="btn btn-primary waves-effect waves-light" type="button"><i class="feather icon-message-circle"></i></button>
</div>
</div>
</div>
</div>
</div>

<div class="pcoded-main-container">
<div class="pcoded-wrapper">

<nav class="pcoded-navbar">
<div class="nav-list">
<div class="pcoded-inner-navbar main-menu">
<div class="pcoded-navigation-label">Admin Navigation</div>

<ul class="pcoded-item pcoded-left-item">

<li class="{{ (request()->segment(1) == 'admin') ? 'active' : '' }}">
<a href="{{route('admin')}}" class="waves-effect waves-dark">
<span class="pcoded-micon"><i class="feather icon-home"></i></span>
<span class="pcoded-mtext">Admin Dashboard</span>
</a>
</li>


<li class="{{ (request()->segment(1) == 'users') ? 'active' : '' }}">
<a href="{{route('users')}}" class="waves-effect waves-dark">
<span class="pcoded-micon">
<i class="nav-icon fas fa-user"></i></span>
<span class="pcoded-mtext">All Users</span>
</a>
</li>

<!-- <li class="{{ (request()->segment(1) == 'staff') ? 'active' : '' }}">
<a href="{{route('staff')}}" class="waves-effect waves-dark">
<span class="pcoded-micon">
<i class="nav-icon fas fa-user-circle"></i></span>
<span class="pcoded-mtext">Staff</span>
</a>
</li> -->

<!-- <li class="{{ (request()->segment(1) == 'riders') ? 'active' : '' }}">
<a href="{{route('riders')}}" class="waves-effect waves-dark">
<span class="pcoded-micon">
<i class="nav-icon fas fa-motorcycle"></i></span>
<span class="pcoded-mtext">All Riders </span>
</a>
</li> -->

                            
                            <li class="pcoded-hasmenu {{ (request()->segment(1) == 'riders') ? 'active' : '' }}" dropdown-icon="style1" subitem-icon="style1">
                                  <a href="javascript:void(0)">
                                      <span class="pcoded-micon"><i class="nav-icon fas fa-motorcycle"></i></span>
                                      <span class="pcoded-mtext">All Riders</span>
                                  </a>
                                  <ul class="pcoded-submenu">
                                  <li class="{{ (request()->segment(1) == 'riders') ? 'active' : '' }}">
                                          <a href="{{route('riders')}}">
                                              <span class="pcoded-mtext">List of Riders</span>
                                          </a>
                                      </li>
                                      <li class="{{ (request()->segment(1) == 'riderreferees') ? 'active' : '' }}">
                                          <a href="{{route('riderreferees')}}">
                                              <span class="pcoded-mtext">Rider Referees</span>
                                              <!-- <span class="pcoded-badge label label-info">NEW</span> -->
                                          </a>
                                      </li>
                                      <li class="{{ (request()->segment(1) == 'riderwallets') ? 'active' : '' }}">
                                          <a href="{{route('riderwallets')}}">
                                              <span class="pcoded-mtext">Rider Wallets</span>
                                              <!-- <span class="pcoded-badge label label-info">NEW</span> -->
                                          </a>
                                      </li>

                                      <li class="{{ (request()->segment(1) == 'ridertrans') ? 'active' : '' }}">
                                          <a href="{{route('ridertrans')}}">
                                              <span class="pcoded-mtext">Rider Transactions</span>
                                              <!-- <span class="pcoded-badge label label-info">NEW</span> -->
                                          </a>
                                      </li>
                                      
                                  </ul>
                              </li>



                                <li class="pcoded-hasmenu {{ (request()->segment(1) == 'barzarslist') ? 'active' : '' }}" dropdown-icon="style1" subitem-icon="style1">
                                  <a href="javascript:void(0)">
                                      <span class="pcoded-micon"><i class="feather icon-server"></i></span>
                                      <span class="pcoded-mtext">Car Barzars</span>
                                  </a>
                                  <ul class="pcoded-submenu">
                                  <li class="{{ (request()->segment(1) == 'barzarslist') ? 'active' : '' }}">
                                          <a href="{{route('barzarslist')}}">
                                              <span class="pcoded-mtext">Approved Barzars</span>
                                          </a>
                                      </li>
                                      <li class="{{ (request()->segment(1) == 'pendingbarzars') ? 'active' : '' }}">
                                          <a href="{{route('pendingbarzars')}}">
                                              <span class="pcoded-mtext">Pending Barzars</span>
                                              <!-- <span class="pcoded-badge label label-info">NEW</span> -->
                                          </a>
                                      </li>
                                      <li class="{{ (request()->segment(1) == 'declinedbarzars') ? 'active' : '' }}">
                                          <a href="{{route('declinedbarzars')}}">
                                              <span class="pcoded-mtext">Declined Barzars</span>
                                              <!-- <span class="pcoded-badge label label-info">NEW</span> -->
                                          </a>
                                      </li>
                                      <li class="{{ (request()->segment(1) == 'bazarpackages') ? 'active' : '' }}">
                                          <a href="{{route('bazarpackages')}}">
                                              <span class="pcoded-mtext">Barzar Packages</span>
                                              <!-- <span class="pcoded-badge label label-info">NEW</span> -->
                                          </a>
                                      </li>
                                      <li class="{{ (request()->segment(1) == 'bazarsubscriptions') ? 'active' : '' }}">
                                          <a href="{{route('bazarsubscriptions')}}">
                                              <span class="pcoded-mtext">Barzars Subscriptions</span>
                                              <!-- <span class="pcoded-badge label label-info">NEW</span> -->
                                          </a>
                                      </li>
                                  </ul>
                              </li>


                              
                                <li class="pcoded-hasmenu {{ (request()->segment(1) == 'carwashpacks') ? 'active' : '' }}" dropdown-icon="style1" subitem-icon="style1">
                                  <a href="javascript:void(0)">
                                      <span class="pcoded-micon"><i class="fas fa-car"></i></span>
                                      <span class="pcoded-mtext">Car Wash Details</span>
                                  </a>
                                  <ul class="pcoded-submenu">
                                  <li class="{{ (request()->segment(1) == 'carwashlist') ? 'active' : '' }}">
                                          <a href="{{route('carwashlist')}}">
                                              <span class="pcoded-mtext">Car wash List</span>
                                          </a>
                                      </li>

                                  <li class="{{ (request()->segment(1) == 'carwashpacks') ? 'active' : '' }}">
                                          <a href="{{route('carwashpacks')}}">
                                              <span class="pcoded-mtext">Car wash packages</span>
                                          </a>
                                      </li>
                                    <li class="{{ (request()->segment(1) == 'carwashbranches') ? 'active' : '' }}">
                                          <a href="{{route('carwashbranches')}}">
                                              <span class="pcoded-mtext">Car wash branches</span>
                                          </a>
                                      </li>
                                      <li class="{{ (request()->segment(1) == 'carwashservices') ? 'active' : '' }}">
                                          <a href="{{route('carwashservices')}}">
                                              <span class="pcoded-mtext">Car wash services</span>
                                              <!-- <span class="pcoded-badge label label-info">NEW</span> -->
                                          </a>
                                      </li>

                                      <li class="{{ (request()->segment(1) == 'carwashpersonel') ? 'active' : '' }}">
                                          <a href="{{route('carwashpersonel')}}">
                                              <span class="pcoded-mtext">Car wash personel</span>
                                              <!-- <span class="pcoded-badge label label-info">NEW</span> -->
                                          </a>
                                      </li>
                                      
                                  </ul>
                              </li>


                              <li class="pcoded-hasmenu {{ (request()->segment(1) == 'bookings') ? 'active' : '' }}" dropdown-icon="style1" subitem-icon="style1">
                                  <a href="javascript:void(0)">
                                      <span class="pcoded-micon"><i class="fab fa-gg-circle"></i></span>
                                      <span class="pcoded-mtext">Car Wash Bookings</span>
                                  </a>
                                  <ul class="pcoded-submenu">
                                  <li class="{{ (request()->segment(1) == 'bookings') ? 'active' : '' }}">
                                          <a href="{{route('bookings')}}">
                                              <span class="pcoded-mtext">Approved Bookings</span>
                                          </a>
                                      </li>
                                      <li class="{{ (request()->segment(1) == 'pendingbookings') ? 'active' : '' }}">
                                          <a href="{{route('pendingbookings')}}">
                                              <span class="pcoded-mtext">Pending Bookings</span>
                                              <!-- <span class="pcoded-badge label label-info">NEW</span> -->
                                          </a>
                                      </li>
                                      
                                  </ul>
                              </li>

                              <li class="pcoded-hasmenu {{ (request()->segment(1) == 'homecareservices') ? 'active' : '' }}" dropdown-icon="style1" subitem-icon="style1">
                                  <a href="javascript:void(0)">
                                      <span class="pcoded-micon"><i class="feather icon-command"></i></span>
                                      <span class="pcoded-mtext">Homecare Details</span>
                                  </a>
                                  <ul class="pcoded-submenu">
                                  <li class="{{ (request()->segment(1) == 'homecareservices') ? 'active' : '' }}">
                                          <a href="{{route('homecareservices')}}">
                                              <span class="pcoded-mtext">Homecare Services</span>
                                          </a>
                                      </li>
                                      <li class="{{ (request()->segment(1) == 'homecarebookings') ? 'active' : '' }}">
                                          <a href="{{route('homecarebookings')}}">
                                              <span class="pcoded-mtext">Homecare Bookings</span>
                                              <!-- <span class="pcoded-badge label label-info">NEW</span> -->
                                          </a>
                                      </li>
                                      
                                  </ul>
                              </li>

                              <li class="pcoded-hasmenu {{ (request()->segment(1) == 'listedcars') ? 'active' : '' }}" dropdown-icon="style1" subitem-icon="style1">
                                  <a href="javascript:void(0)">
                                      <span class="pcoded-micon"><i class="feather icon-globe"></i></span>
                                      <span class="pcoded-mtext">Market Details</span>
                                  </a>
                                  <ul class="pcoded-submenu">
                                  <li class="{{ (request()->segment(1) == 'listedcars') ? 'active' : '' }}">
                                          <a href="{{route('listedcars')}}">
                                              <span class="pcoded-mtext">Listed Cars</span>
                                          </a>
                                      </li>
                                      <li class="{{ (request()->segment(1) == 'carinquiry') ? 'active' : '' }}">
                                          <a href="{{route('carinquiry')}}">
                                              <span class="pcoded-mtext">Car Inquiries</span>
                                              <!-- <span class="pcoded-badge label label-info">NEW</span> -->
                                          </a>
                                      </li>

                                      <li class="{{ (request()->segment(1) == 'vmakes') ? 'active' : '' }}">
                                          <a href="{{route('vmakes')}}">
                                              <span class="pcoded-mtext">Vehicle Makes</span>
                                          </a>
                                      </li>
                                      <li class="{{ (request()->segment(1) == 'vmodels') ? 'active' : '' }}">
                                          <a href="{{route('vmodels')}}">
                                              <span class="pcoded-mtext">Vehicle Models</span>
                                              <!-- <span class="pcoded-badge label label-info">NEW</span> -->
                                          </a>
                                      </li>
                                      
                                  </ul>
                              </li>


                              <li class="pcoded-hasmenu {{ (request()->segment(1) == 'hybridpacks') ? 'active' : '' }}" dropdown-icon="style1" subitem-icon="style1">
                                  <a href="javascript:void(0)">
                                      <span class="pcoded-micon"><i class="feather icon-briefcase"></i></span>
                                      <span class="pcoded-mtext">Hybrid Packages</span>
                                  </a>
                                  <ul class="pcoded-submenu">
                                  <li class="{{ (request()->segment(1) == 'hybridpacks') ? 'active' : '' }}">
                                          <a href="{{route('hybridpacks')}}">
                                              <span class="pcoded-mtext">Packages List</span>
                                          </a>
                                      </li>
                                      <li class="{{ (request()->segment(1) == 'hybridpackservices') ? 'active' : '' }}">
                                          <a href="{{route('hybridpackservices')}}">
                                              <span class="pcoded-mtext">Hybrid Services</span>
                                              <!-- <span class="pcoded-badge label label-info">NEW</span> -->
                                          </a>
                                      </li>
                                      
                                  </ul>
                              </li>




                              <li class="pcoded-hasmenu {{ (request()->segment(1) == 'networkprofiles') ? 'active' : '' }}" dropdown-icon="style1" subitem-icon="style1">
                                  <a href="javascript:void(0)">
                                      <span class="pcoded-micon"><i class="feather icon-user"></i></span>
                                      <span class="pcoded-mtext">Network Profiles</span>
                                  </a>
                                  <ul class="pcoded-submenu">
                                    <li class="{{ (request()->segment(1) == 'networkprofiles') ? 'active' : '' }}">
                                          <a href="{{route('networkprofiles')}}">
                                              <span class="pcoded-mtext">User Profiles</span>
                                          </a>
                                    </li>
                                    <li class="{{ (request()->segment(1) == 'connections') ? 'active' : '' }}">
                                          <a href="{{route('connections')}}">
                                              <span class="pcoded-mtext">Network Connections</span>
                                              <!-- <span class="pcoded-badge label label-info">NEW</span> -->
                                          </a>
                                    </li>

                                    <li class="{{ (request()->segment(1) == 'networkexperience') ? 'active' : '' }}">
                                          <a href="{{route('networkexperience')}}">
                                              <span class="pcoded-mtext">Network Experiences</span>
                                              <!-- <span class="pcoded-badge label label-info">NEW</span> -->
                                          </a>
                                    </li>
                                      
                                  </ul>
                              </li>




<li class="{{ (request()->segment(1) == 'product') ? 'active' : '' }}">
<a href="{{route('product')}}" class="waves-effect waves-dark">
<span class="pcoded-micon">
<i class="feather icon-bookmark"></i>
</span>
<span class="pcoded-mtext">Products </span>
</a>
</li>

<li class="{{ (request()->segment(1) == 'slides') ? 'active' : '' }}">
<a href="{{route('slides')}}" class="waves-effect waves-dark">
<span class="pcoded-micon">
<i class="feather icon-mail"></i></span>
<span class="pcoded-mtext">HomePage Slides</span>
</a>
</li>

<li class="{{ (request()->segment(1) == 'services') ? 'active' : '' }}">
<a href="{{route('services')}}" class="waves-effect waves-dark">
<span class="pcoded-micon">
<i class="feather icon-list"></i></span>
<span class="pcoded-mtext">Services</span>
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

<li class="{{ (request()->segment(1) == 'adminpolicy') ? 'active' : '' }}">
<a href="{{route('adminpolicy')}}" class="waves-effect waves-dark">
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
<center> @include('inc.messages')</center>

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

