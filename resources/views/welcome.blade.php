@extends('layouts.myapp')


@section('content')
 
<div id="home-slider" class="home-slider">
@foreach($dataslides as $slides)
    <div class="item home-slider-bg" style="background-image: url('/storage/images/{{$slides->image}}')"> 
      <div class="container">
        <div class="slider-dtl">
          <h4 class="slider-sub-heading">{{$slides->heading}}</h4>
          <h1 class="slider-heading">{{$slides->subheading}}</h1>
          <p>{{$slides->desc}}</p>          
          <div class="slider-btn">
            <a href="#" class="btn btn-orange">Read More</a>
            <a href="#" class="btn btn-default">Contact Us</a>
          </div>
        </div>  
      </div>     
    </div>
@endforeach
   
  </div>
    

  <div id="services" class="services-main-block">
    <div class="container">
      <div class="section text-center">
        <h3 class="section-heading">Our Services</h3>
        <p class="sub-heading">Here is a list of the services we offer at SpaClean Motor Spa</p>
      </div>
      <div class="row">
        @foreach($data as $data)
        <div class="col-md-3 col-sm-6">
          <div class="service-block text-center">
            <div class="service-icon">
              <a href="#"><img style="height:100px; width:150px;" src="/storage/images/{{$data->featured_image}}" class="img-responsive" alt="service-01"></a>
            </div>
            <div class="service-dtl">
              <a href="#"><h5 class="service-heading">{{$data->name}}</h5></a>
              <p>{{$data->service_desc}}</p>
            </div>
          </div>
        </div>

        @endforeach

      </div>
    </div>
  </div>

<!--  plans -->
  <div id="pricing-plan" class="pricing-plan-main-block">
    <div class="container">
      <div class="section text-center">
        <h3 class="section-heading">Cleaning Plans</h3>
        <p class="sub-heading">Below is a table of our pricing plans for different services</p>
      </div>
     
      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="plan-1">
          <div class="row">
            <div class="col-md-3 col-sm-6">
              <div class="pricing-block text-center">
                <h6 class="pricing-heding">BRONZE</h6>
                <div class="pricing-price-block">
                  <h5 class="pricing-price">KSHS :Saloon Car {{$bronzepricesaloon}}, <br> SUV : KSH {{$bronzepricesuv}}</h5>
                  <div class="pricing-duration">30 Mins</div>
                </div>
                <div class="pricing-dtl">
                @foreach($datax as $datax)
                  <ul>

                    <li>{{$datax->service_name}}</li>

                  </ul>
                  @endforeach
                  <a href="#" data-toggle="modal" data-target="#modal-default" class="btn btn-default">Book Now</a>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="pricing-block text-center">
                <h6 class="pricing-heding">SILVER</h6>
                <div class="pricing-price-block">
                  <h5 class="pricing-price">KSH : Saloon Car:{{$silverpricesaloon}}, <br> SUV car:KSH {{$silverpricesuv}}</h5>
                  <div class="pricing-duration">45 Mins</div>
                </div>
                <div class="pricing-dtl">
                @foreach($datasilver as $datasilver)
                  <ul>

                    <li>{{$datasilver->service_name}}</li>
                  </ul>
                  @endforeach
                  <a href="#" data-toggle="modal" data-target="#modal-default" class="btn btn-default">Book Now</a>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="pricing-block text-center">
                <h6 class="pricing-heding">GOLD</h6>
                <div class="pricing-price-block">
                  <h5 class="pricing-price">KSH : Saloon Car: {{$goldpricesaloon}}, <br> SUV Car:KSH {{$goldpricesuv}}</h5>
                  <div class="pricing-duration">60 Mins</div>
                </div>
                <div class="pricing-dtl">
                @foreach($datagold as $datagold)
                  <ul>

                    <li>{{$datagold->service_name}}</li>
                  </ul>
                  @endforeach
                  <a href="#" data-toggle="modal" data-target="#modal-default" class="btn btn-default">Book Now</a>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="pricing-block text-center">
                <h6 class="pricing-heding">PLATINUM</h6>
                <div class="pricing-price-block">
                  <h5 class="pricing-price">KSH : Saloon Car:{{$platzpricesaloon}},<br> SUV Car:KSH {{$platzpricesuv}}</h5>
                  <div class="pricing-duration">120 Mins</div>
                </div>
                <div class="pricing-dtl">
                  @foreach($dataplatz as $dataplatz)
                    <ul>

                      <li>{{$dataplatz->service_name}}</li>
                    </ul>
                    @endforeach
                  <a href="#" data-toggle="modal" data-target="#modal-default" class="btn btn-default">Book Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>

      
       
       
       
      </div>

      <center><a href="{{route('mypackages')}}" class="btn btn-primary btn-lg"> Create My Cleaning Plan</a></center>
    </div>
  </div>
<!--  end plans -->

@endsection

 <!-- modals 1 -->
   <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">	
		<link rel="stylesheet" href="loginfile/css/ionicons.min.css">
		<link rel="stylesheet" href="loginfile/css/style.css">

 <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true" class="ion-ios-close"></span>
		        </button>
		      </div>
		      <div class="modal-body p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="ion-ios-person"></span>
		      	</div>
		      	<h5 class="text-center mb-4">Sign In to Book our services</h5><br><hr>
            <form method="POST" action="{{ route('login') }}">
                        @csrf
		      		<div class="form-group">
		      			<input type="text" class="form-control rounded-left @error('email') is-invalid @enderror" required placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus" placeholder="Email">
                   @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="background-color:green; color: white;">{{ $message }}</strong>
                                    </span>
                                @enderror
              </div>
	            <div class="form-group d-flex">
	              <input type="password" class="form-control rounded-leftpassword @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">
                  
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="background-color:green; color: white;">{{ $message }}</strong>
                                    </span>
                                @enderror
              </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Login</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="form-check w-50">
		            	<label class="custom-control fill-checkbox">
										<input type="checkbox" class="fill-control-input">
										<span class="fill-control-indicator"></span>
										<span class="fill-control-description ml-3">Remember Me</span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#">Forgot Password</a>
								</div>
	            </div>
	          </form>
		      </div>
		      <div class="modal-footer justify-content-center">
		      	<p>Not a member? <a href="#" data-toggle="modal" data-target="#regmodal" data-dismiss="modal">Create an account</a></p>
		      </div>
		    </div>
		  </div>
		</div>

    <script src="loginfile/js/jquery.min.js"></script>
    <script src="loginfile/js/popper.js"></script>
    <script src="loginfile/js/bootstrap.min.js"></script>
    <script src="loginfile/js/main.js"></script>


<!-- register modal 2 -->
<div class="modal fade" id="regmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true" class="ion-ios-close"></span>
		        </button>
		      </div>
		      <div class="modal-body p-4 py-5 p-md-5">
		      	<h5 class="text-center mb-3">Create Your Account</h5>
		      	<!-- <ul class="ftco-footer-social p-0 text-center">
              <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><span class="ion-logo-twitter"></span></a></li>
              <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><span class="ion-logo-facebook"></span></a></li>
              <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><span class="ion-logo-instagram"></span></a></li>
            </ul> -->
		      	<form method="POST" action="{{ route('register') }}">
                        @csrf
		      		<div class="form-group mb-2">
		      			<label for="name">Full Name</label>
		      			<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                 @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
              </div>
		      		<div class="form-group mb-2">
		      			<label for="email">Email Address</label>
		      			<input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
              </div>
	            <div class="form-group mb-2">
	            	<label for="password">Password</label>
	              <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
              </div>
              <div class="form-group mb-2">
	            	<label for="password">Confirm Password</label>
	              <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
	            </div>
              <hr>
	            <div class="form-group mb-2">
	            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign Up</button>
	            </div>
	            <div class="form-group d-md-flex">
								<div class="w-100 text-center">
									<a href="#" class="forgot" data-toggle="modal" data-target="#modal-default" data-dismiss="modal">I'm already a member</a>
								</div>
	            </div>
	          </form>
		      </div>
		    </div>
		  </div>
		</div>