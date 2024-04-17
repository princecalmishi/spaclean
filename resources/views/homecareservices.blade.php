
@extends('layouts.myapp')

@section('content')

<!--  page banner -->
<div id="page-banner" class="page-banner-main" style="background-image: url('/storage/images/page-banner.jpg')">
    <div class="container">
      <div class="page-banner-block">
        <div class="section">
          <h3 class="section-heading">Home Care Services</h3>
        </div>
        <ol class="breadcrumb">
          <li><a href="">Home</a></li>
          <li><a href="#">Services</a></li>
          <li class="active"><a>Home Care Services</a></li>
        </ol>
      </div>
    </div>
  </div>
<!--  end page banner  -->
<!-- services details -->    
  <div id="services-dtl-page" class="services-dtl-main-block">
    <div class="container">
      <div class="services-dtl-block">
        <div class="services-dtl-img">
          <img src="/storage/images/duve.jpg" class="img-responsive" alt="services-banner" style="width: 100%; height: 300px;">
        </div>
        <h4 class="services-heading">Home Care Services</h4>
            <p>Below is a list of our Homecare services</p>
          </div>    
      
    </div>
  </div>  
<!--  end services dtl -->
<!--  services -->
  <div id="services" class="services-main-block service-inner">
    <div class="container">
      <div class="row">
      @foreach($data as $data)
      <div class="col-md-3 col-sm-6">
          <div class="service-block text-center">
            <div class="service-icon">
              <a href="#"><img src="/storage/images/{{$data->image}}" class="img-responsive" alt="service-01"></a>
            </div>
            <div class="service-dtl">
              <a href="#"><h5 class="service-heading">{{$data->name}}</h5></a>
              <p>{{$data->desc}}</p>
            </div>
            <a href="{{route('homecare')}}" class="btn btn-info btn-sm">Book Service</a>
          </div>
        </div>

        @endforeach
        
        
      </div>
    </div>
  </div>
<!--  end services -->
<!--  end services -->
@endsection