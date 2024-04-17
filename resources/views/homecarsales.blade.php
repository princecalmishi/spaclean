@extends('layouts.myapp')
@section('content')

<!--  navigation -->

<!--  page banner -->
  <div id="page-banner" class="page-banner-main" style="background-image: url('images/bg/page-banner.jpg')">
    <div class="container">
      <div class="page-banner-block">
        <div class="section">
          <h3 class="section-heading">Shop</h3>
        </div>
        <ol class="breadcrumb">
          <li><a href="{{route('/')}}">Home</a></li>
          <li class="active"><a href="#">Shop</a></li>
          <!-- <li ><a>Sell my car</a></li> -->
        </ol>
      </div>
    </div>
  </div>
<!--  end page banner  -->
<!-- shop -->        
  <div id="shop" class="shop-page shop-main-block">
    <div class="container">  
      <div class="row"> 
      @foreach($datar as $data)
        <div class="col-md-4 col-sm-6">      
          <div class="shop-block">      
            <div class="shop-img text-center">
              <img src="/storage/images/{{$data->cover_image}}" class="img-responsive" alt="product-1"> 
              <div class="overlay-bg"></div>
               <a href="{{route('carinquirys',$data->id)}}" class="btn btn-default"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Buy Now</a>            
            </div>
            <div class="shop-dtl text-center">
              <a><h6 class="product-name">{{$data->brand}}  {{$data->model}}</h6></a>
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
                <p> KSH : {{$data->price}}</p>
              </div>           
            </div>
          </div>
        </div>
      @endforeach

      <center class="mb-4 mt-3">{{$datar->links()}}</center>   

      <style>
            .w-5{
              display: none;
            }
          </style>

      </div>
    </div>
  </div>  
<!-- end shop -->

<!--  footer -->
@endsection
