<!DOCTYPE html>
<html lang="en"><!-- <![endif]--><!-- head -->
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Spa &amp; Clean</title>

<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta name="description" content="Spa CLean">
<meta name="keywords" content="car wash, car repair, auto wash, auto detail, auto detailing, car, cleaning, mechanic, repair, wash, car service, workshop">
<meta name="author" content="SpaClean Motor Spa">
<meta name="MobileOptimized" content="320">
<link 
  href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
  rel="stylesheet"  type='text/css'>

<link rel="icon" type="image/icon" href="http://files.spaclean.co.ke/logo.jpg"> <!-- favicon-icon -->
<!-- theme style -->
<link href="../home/homestyles/bootstrap.min.css" rel="stylesheet" type="text/css"> <!-- bootstrap css -->
<link href="../home/homestyles/font-awesome.min.css" rel="stylesheet" type="text/css"> <!-- fontawesome css -->
<link href="../home/homestyles/icon-font.css" rel="stylesheet" type="text/css"> <!-- icon-font css -->
<link href="../home/homestyles/css" rel="stylesheet"> <!-- google font -->
<link href="../home/homestyles/menumaker.css" rel="stylesheet" type="text/css"> <!-- menu css -->
<link href="../home/homestyles/owl.carousel.css" rel="stylesheet" type="text/css"> <!-- owl carousel css -->
<link href="../home/homestyles/magnific-popup.css" rel="stylesheet" type="text/css"> <!-- magnify popup css -->
<link href="../home/homestyles/datepicker.css" rel="stylesheet" type="text/css"> <!-- datepicker css -->
<link href="../home/homestyles/style.css" rel="stylesheet" type="text/css"> <!-- custom css -->
<!-- end theme style -->
<link href="../home/productdetails/bootstrap.min.css" rel="stylesheet" type="text/css"> <!-- bootstrap css -->
<link href="../home/productdetails/font-awesome.min.css" rel="stylesheet" type="text/css"> <!-- fontawesome css -->
<link href="../home/productdetails/icon-font.css" rel="stylesheet" type="text/css"> <!-- icon-font css -->
<link href="../home/productdetails/css" rel="stylesheet"> <!-- google font -->
<link href="../home/productdetails/menumaker.css" rel="stylesheet" type="text/css"> <!-- menu css -->
<link href="../home/productdetails/owl.carousel.css" rel="stylesheet" type="text/css"> <!-- owl carousel css -->
<link href="../home/productdetails/magnific-popup.css" rel="stylesheet" type="text/css"> <!-- magnify popup css -->
<link href="../home/productdetails/datepicker.css" rel="stylesheet" type="text/css"> <!-- datepicker css -->
<link href="../home/productdetails/style.css" rel="stylesheet" type="text/css"> <!-- custom css -->


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<!-- end head -->
<!--body start-->
<body>

<!--  top bar -->
  <div class="top-bar hidden-xs">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <div class="info-bar">
            <ul>
              <li><i class="fa fa-envelope" aria-hidden="true"></i> info@digitalworld.co.ke</li>
              <li>|</li>
              <li><i class="fa fa-phone" aria-hidden="true"></i>0717113834</li>
            </ul>
          </div>          
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="top-bar-right">
            <!-- <div class="top-menu hidden-sm">
              <ul>
                <li><a href="#">Schedule</a></li>
                <li>|</li>
                <li><a href="#">News</a></li>
                <li>|</li>
                <li><a href="#">Faq</a></li>
              </ul> -->
            </div>
            <div class="social-icon">
              <ul>
                <li><a href="#" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="#" target="_blank"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<body>
    <div id="app">
    <div class="nav-bar">
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <div class="logo">
            <a href="{{ route('/') }}"><img src="http://files.spaclean.co.ke/logo.jpg" style="height:70px; width:200px;" alt="logo"></a>
          </div>
          
        </div>
        
       
        <div class="col-sm-8">
          <div class="navigation">
            <div id="cssmenu">
              <ul id="ul">
                <li><a href="{{ route('/') }}">Home</a></li>   
                  
                                              
                    <!-- <li><a href="#pricing-plan">Car Wash</a></li>    -->
                    <li><a href="{{route('allcarbarzars')}}">Car Barzar</a></li>  
                    <li><a href="{{route('homecareallservices')}}">Home Care</a></li>   

         
                </li>

                <li><a href="{{ route('homecarsales') }}">Market</a></li>   
       
                <li><a href="{{route('networkconnect')}}">Network Connect</a></li>  
                <li><a href="#"> Account</a>
                  <ul>  
                  @if (Auth::guest())
                  <li><a href="{{ route('register') }}" >Register</a></li>   
                    <li><a href="{{ route('login') }}">Login</a></li>   
                  </ul> 
                  @else
                  <li class="nav-item dropdown">

                      {{ Auth::user()->name }}
                      <a href="{{ route('logout') }}">Logout</a>
                     
                  @endif
                    
            
            
                               
              </ul>
               <style>
            nav.sticky{
                position: fixed;
                top: 0;
                left: 0;
            }
        </style>
        
        <script>
            var cssmenu = document.getElementById("cssmenu");
            var ul = document.getElementById("ul");
            
            window.onscroll = function(){
                if(window.pageYOffset >= menu.offsetTop){
                    navbar.classlist.add("sticky");
                }else{
                    navbar.classlist.remove("sticky");

                }
            }
        </script>
            </div>
          </div>
        </div>        
      </div>
    </div>
  </div> 
<!--  page banner -->
  <div id="page-banner" class="page-banner-main" style="background-image: url('images/bg/page-banner.jpg')">
    <div class="container">
      <div class="page-banner-block">
        <div class="section">
          <h3 class="section-heading">Product Details</h3>
        </div>
        <ol class="breadcrumb">
          <li><a href="{{route('/')}}">Home</a></li>
          <li><a href="{{route('carbazar')}}">Car Bazar</a></li>
          <li class="active"><a>Car Details</a></li>
        </ol>
      </div>
    </div>
  </div>
<!--  end page banner  -->
<!-- single product -->
  <div id="single-product" class="shop-page single-product-main-block">
    <div class="container">
      <div class="row">
        <div class="col-sm-4">

          <div id="slideshow" class="col-sm-4">
            <div class="slide-wrapper">
              <div class="slide"><img src="/storage/images/{{$data->cover_image}}" alt="" ></div>
              <div class="slide"><img src="/storage/images/{{$data->cover_image2}}" alt=""></div>
              <div class="slide"><img src="/storage/images/{{$data->cover_image3}}" alt=""></div>
              <!-- <div class="slide"><h1 class="slide-number">4</h1></div>
              <div class="slide"><h1 class="slide-number">5</h1></div> -->
            </div>
          </div>   
          <div id="gallery-01" class="product-gallery">  
            <div class="product-gallery-thumb">
            <a href="/storage/images/{{$data->cover_image2}}" data-image="/storage/images/{{$data->cover_image2}}" data-enlargable src="/storage/images/{{$data->cover_image2}}">
                <img src="/storage/images/{{$data->cover_image2}}" class="img-responsive" alt="product-thumb-2"><div class="product-gallery-overlay">
                  <span><i class="fa fa-search-plus" aria-hidden="true"></i></span></div>
                </a>
                
            </div>               
            <div class="product-gallery-thumb">
              <a href="/storage/images/{{$data->cover_image3}}" data-image="/storage/images/{{$data->cover_image3}}" data-enlargable src="/storage/images/{{$data->cover_image3}}">
                <img src="/storage/images/{{$data->cover_image3}}" class="img-responsive" alt="product-thumb-2"><div class="product-gallery-overlay">
                  <span><i class="fa fa-search-plus" aria-hidden="true"></i></span></div>
                </a>
            </div>             
            <div class="product-gallery-thumb">
              <a href="/storage/images/{{$data->cover_image}}" data-image="/storage/images/{{$data->cover_image}}" data-enlargable src="/storage/images/{{$data->cover_image}}">
                <img src="/storage/images/{{$data->cover_image}}" class="img-responsive" alt="product-thumb-3">
                <div class="product-gallery-overlay"><span><i class="fa fa-search-plus" aria-hidden="true"></i></span>
              </div></a>
            </div>
          </div>
        </div>   
           
            
        <style>
          

          #slideshow {
            overflow: hidden;
            height: 310px;
            width: 380px;
            margin: 0 auto;
          }

          .slide-wrapper {
            width: 2912px;
            -webkit-animation: slide 18s ease infinite;
          }

          .slide {
            float: left;
            height: 510px;
            width: 728px;
          }

          .slide-number {
            color: #000;
            text-align: center;
            font-size: 10em;
          }

          @-webkit-keyframes slide {
            20% {margin-left: 0px;}
            30% {margin-left: -728px;}
            50% {margin-left: -728px;}
            60% {margin-left: -1456px;}
            70% {margin-left: -1456px;}
            80% {margin-left: -2184px;}
            90% {margin-left: -2184px;}
          }

        </style> 

        <div class="col-sm-8">
          <div class="single-product-dtl">
            <div class="shop-dtl">
              <a ><h6 class="product-name">{{$data->brand}} | {{$data->model}}</h6></a>
              
              <div class="shop-price">
                <p>Price: Ksh {{$data->price}} </p>
              </div>           
            </div>
            <p>Car Description: {{$data->description}} </p>                               
            <!-- <a href="#" class="btn btn-default"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Buy Now</a>             -->
          </div>  
          
          <strong>Car Details</strong>
              <div class="key-features">
                                    <div class="boxicon">
                    <a data-toggle="tooltip" data-placement="bottom" title="Engine Type">
                        <i class="fa fa-gas"></i><p> Fuel Type : {{$data->Fuel}}</p>
                    </a>
                </div>
                                        <div class="boxicon">
                    <a data-toggle="tooltip" data-placement="bottom" title="Mileage" >
                        <i class="flaticon-dashboard-1 kilo-meter"></i>  <p> Mileage : {{$data->Mileage}}</p>
                    </a>
                </div>
                                        <div class="boxicon">
                    <a data-toggle="tooltip" data-placement="bottom" title="Engine Capacity" >
                        <i class="flaticon-tool engile-capacity"></i> <p>Engine Capacity : {{$data->CC}} cc</p>
                    </a>
                </div>
                                        <div class="boxicon">
                    <a data-toggle="tooltip" data-placement="bottom" title="Year">
                        <i class="flaticon-calendar reg-year"></i><p>Model Year : {{$data->modelyear}}</p>
                    </a>
                </div>
                                        <div class="boxicon">
                    <a data-toggle="tooltip" data-placement="bottom" title="Transmission Type" >
                        <i class="flaticon-gearshift transmission"></i> <p>Transmission : {{$data->Gear}}</p>
                    </a>
                </div>
                                        <div class="boxicon">
                    <a data-toggle="tooltip" data-placement="bottom" title="Body Type">
                        <i class="flaticon-transport-1 body-type"></i> <p>Price Type : {{$data->price_type}}</p>
                    </a>
                </div>
                                        <div class="boxicon">
                    <a data-toggle="tooltip" data-placement="bottom" title="Color Family">
                        <i class="flaticon-cogwheel-outline car-color"></i> <p>Colour : {{$data->Colour}}</p>
                    </a>
                </div>
                        </div>

        
        </div>
        <div class="col-sm-12">
          <div class="product-dtl-tab">
            <ul class="nav nav-tabs" role="tablist">
                            @php
                            $mid = $data->user_id;
                            $comm = \DB::table('users')->where('id', $mid)->pluck('phone');
                            foreach($comm as $com)
                            
                            @endphp
              <li role="presentation" class="active"><a href="tel: @php echo $com; @endphp" aria-controls="description">Buy from Seller</a></li>
              <form action="{{route('carinquirypost')}}" method="post">
                  @csrf

                <input type="hidden" name="car_id" value="{{$data->id}}" class="form-control">
                <button class="btn btn-success" type="submit">Buy from SpaClean</button>

              </form>
              <!-- <li role="presentation"><a type="submit aria-controls="use" >Buy from SpaClean</a></li>              -->
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane active" id="description">
              <h4>More of the same</h4>
         </div>
              
    <!-- shop -->        
    <div id="shop-products" class="shop-main-block">
      <div class="container">  
        <div class="row">

        @foreach($more as $data)
          <div class="col-md-3 col-sm-6">      
            <div class="shop-block">      
              <div class="shop-img text-center">
                <img src="/storage/images/{{$data->cover_image}}" class="img-responsive" alt="product-1"> 
                <div class="overlay-bg"></div>
                 <a href="{{route('bazardetails', $data->id)}}" class="btn btn-default"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Buy Now</a>            
              </div>
              <div class="shop-dtl text-center">
                <a href="{{route('bazardetails', $data->id)}}"><h6 class="product-name">{{$data->brand}} | {{$data->model}}</h6></a>
                <div class="shop-price">
                <i class="fa fa-map-marker" aria-hidden="true"></i> : {{$data->Location}}
              </div> 

            

              <div class="shop-price">
              <i class="fa fa-truck" aria-hidden="true"></i> {{$data->Fuel}},  <i class="fa fa-tachometer" aria-hidden="true"></i>  {{$data->Mileage}} km, </i> {{$data->CC}} CC

              </div> 
              <div class="shop-price">
               {{$data->Gear}},  {{$data->Colour}}

              </div> 
                <div class="shop-price">
                  <p>{{$data->price}}</p>
                </div>           
              </div>
            </div>
          </div>
        @endforeach
        </div>
      </div>
    </div>
  </div>
<!-- end single product shop -->


<!--  footer -->
<footer id="footer" class="footer-main-block">
    <div class="footer-block">
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-6">
            <div class="footer-about footer-widget">
              <h5 class="footer-heading">About Us</h5>
              <img src="http://files.spaclean.co.ke/logo.jpg" class="img-responsive" alt="logo">
                           
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="footer-services footer-widget">
              <h5 class="footer-heading">Our Services</h5>
              <ul>
                <li><a href="{{route('carbookings')}}"><i class="fa fa-caret-right" aria-hidden="true"></i>Car Wash</a></li>
                <li><a href="{{route('allcarbarzars')}}"><i class="fa fa-caret-right" aria-hidden="true"></i>Car Barzar</a></li>
                <li><a href="{{route('mybazar')}}"><i class="fa fa-caret-right" aria-hidden="true"></i>Sell Car</a></li>
                <li><a href="{{route('homecareallservices')}}"><i class="fa fa-caret-right" aria-hidden="true"></i>Home Care</a></li>
                <li><a href="{{route('networkconnect')}}"><i class="fa fa-caret-right" aria-hidden="true"></i>Network Connect</a></li>
                <li><a href="{{route('homecarsales')}}"><i class="fa fa-caret-right" aria-hidden="true"></i>Market</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="footer-opening footer-widget">
              <h5 class="footer-heading">Opening Hours</h5>
              <div class="row">
                <div class="col-xs-5">
                  <div class="opening-day">Monday</div>
                </div>
                <div class="col-xs-7">
                  <div class="opening-time">9:00 AM - 8:00 PM</div>
                </div>
                <div class="col-xs-5">
                  <div class="opening-day">Tuesday</div>
                </div>
                <div class="col-xs-7">
                  <div class="opening-time">9:00 AM - 8:00 PM</div>
                </div>
                <div class="col-xs-5">
                  <div class="opening-day">Wednesday</div>
                </div>
                <div class="col-xs-7">
                  <div class="opening-time">9:00 AM - 8:00 PM</div>
                </div>
                <div class="col-xs-5">
                  <div class="opening-day">Thursday</div>
                </div>
                <div class="col-xs-7">
                  <div class="opening-time">9:00 AM - 8:00 PM</div>
                </div>
                <div class="col-xs-5">
                  <div class="opening-day">Friday</div>
                </div>
                <div class="col-xs-7">
                  <div class="opening-time">9:00 AM - 8:00 PM</div>
                </div>
                <div class="col-xs-5">
                  <div class="opening-day">Saturday</div>
                </div>
                <div class="col-xs-7">
                  <div class="opening-time">9:00 AM - 1:00 PM</div>
                </div>
                <div class="col-xs-5">
                  <div class="opening-day">Sunday</div>
                </div>
                <div class="col-xs-7">
                  <div class="opening-time">Closed</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="footer-subscribe footer-widget">
              <h5 class="footer-heading">Subscribe Newsletter</h5>
              <p>Receive Real time notifications</p>
              <form id="subscribe-form" class="subscribe-form" novalidate="true">
                <div class="form-group">
                  <label class="sr-only">Your Email address</label>
                  <input type="email" class="form-control" id="mc-email" placeholder="Enter email address" name="EMAIL">
                </div>
                <button type="submit" class="btn btn-default"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                <label for="mc-email"></label>
              </form>
              <div class="social-icon">
                <span>Follow us on:</span>
                <ul>
                  <li><a href="#" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                  <li><a href="#" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                  <li><a href="#" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                  <li><a href="#" target="_blank"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>      
    </div>
    <hr>
    <div class="copyright">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="copyright-text text-center">
              <p>© Copyrights 2022 <a href="#">Digital World</a>. | All Rights Reserved.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
<!--  end footer -->
<!-- jquery -->
<script type="text/javascript" src="../home/homestyles/jquery.min.js.download"></script> <!-- jquery library js -->
<script type="text/javascript" src="../home/homestyles/bootstrap.min.js.download"></script> <!-- bootstrap js -->
<script type="text/javascript" src="../home/homestyles/owl.carousel.js.download"></script> <!-- owl carousel js -->
<script type="text/javascript" src="../home/homestyles/jquery.ajaxchimp.js.download"></script> <!-- mail chimp js -->
<script type="text/javascript" src="../home/homestyles/smooth-scroll.js.download"></script> <!-- smooth scroll js -->
<script type="text/javascript" src="../home/homestyles/jquery.magnific-popup.min.js.download"></script> <!-- magnify popup js --> 
<script type="text/javascript" src="../home/homestyles/waypoints.min.js.download"></script> <!-- facts count js required for jquery.counterup.js file -->
<script type="text/javascript" src="../home/homestyles/jquery.counterup.js.download"></script> <!-- facts count js-->
<script type="text/javascript" src="../home/homestyles/menumaker.js.download"></script> <!-- menu js--> 
<script type="text/javascript" src="../home/homestyles/jquery.appear.js.download"></script> <!-- progress bar js -->
<script type="text/javascript" src="../home/homestyles/jquery.countdown.js.download"></script>  <!-- event countdown js -->
<script type="text/javascript" src="../home/homestyles/price-slider.js.download"></script> <!-- price slider / filter js-->
<script type="text/javascript" src="../home/homestyles/bootstrap-datepicker.js.download"></script> <!-- bootstrap datepicker js--> 
<script type="text/javascript" src="../home/homestyles/jquery.elevatezoom.js.download"></script> <!-- image zoom js-->
<script type="text/javascript" src="../home/homestyles/theme.js.download"></script> <!-- custom js -->  


<!-- jquery -->
<script data-cfasync="false" src="../home/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script type="text/javascript" src="js/jquery.min.js"></script> <!-- jquery library js -->
<script type="text/javascript" src="../home/productdetails/bootstrap.min.js"></script> <!-- bootstrap js -->
<script type="text/javascript" src="../home/productdetails/owl.carousel.js"></script> <!-- owl carousel js -->
<script type="text/javascript" src="../home/productdetails/jquery.ajaxchimp.js"></script> <!-- mail chimp js -->
<script type="text/javascript" src="../home/productdetails/smooth-scroll.js"></script> <!-- smooth scroll js -->
<script type="text/javascript" src="../home/productdetails/jquery.magnific-popup.min.js"></script> <!-- magnify popup js --> 
<script type="text/javascript" src="../home/productdetails/waypoints.min.js"></script> <!-- facts count js required for jquery.counterup.js file -->
<script type="text/javascript" src="../home/productdetails/jquery.counterup.js"></script> <!-- facts count js-->
<script type="text/javascript" src="../home/productdetails/menumaker.js"></script> <!-- menu js--> 
<script type="text/javascript" src="../home/productdetails/jquery.appear.js"></script> <!-- progress bar js -->
<script type="text/javascript" src="../home/productdetails/jquery.countdown.js"></script>  <!-- event countdown js -->
<script type="text/javascript" src="../home/productdetails/price-slider.js"></script> <!-- price slider / filter js-->
<script type="text/javascript" src="../home/productdetails/bootstrap-datepicker.js"></script> <!-- bootstrap datepicker js--> 
<script type="text/javascript" src="../home/productdetails/jquery.elevatezoom.js"></script> <!-- image zoom js-->
<script type="text/javascript" src="../home/productdetails/theme.js"></script> <!-- custom js --> 



<script src="./homestyles/js"></script></body><!--body end -->
</html>


