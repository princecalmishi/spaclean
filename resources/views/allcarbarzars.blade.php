
@extends('layouts.myapp')
@section('content')


<!--  page banner -->
  <div id="page-banner" class="page-banner-main" style="background-image: url('images/bg/page-banner.jpg')">
    <div class="container">
      <div class="page-banner-block">
        <div class="section">
          <h3 class="section-heading">Car Barzars</h3>
        </div>
        <ol class="breadcrumb">
          <li><a href="{{route('/')}}">Home</a></li>
          <li><a href="{{route('carbazar')}}">Car</a></li>
          <li class="active"><a>Barzars</a></li>
        </ol>
      </div>
    </div>
  </div>
<!--  end page banner  -->
<!-- shop -->        
  <div id="shop-four" class="shop-page shop-four-main-block">
    <div class="container">  
      <div class="row"> 
        @foreach($data as $data)
        <div class="col-md-3 col-sm-6">      
          <div class="shop-block">      
            <div class="shop-img text-center">
              <img src="/storage/images/{{$data->image}}" class="img-responsive" alt="product-1"> 
              <div class="overlay-bg"></div>
               <a href="{{route('viewbazar', $data->id)}}" class="btn btn-default"><i class="fa fa-shopping-cart" aria-hidden="true"></i> View Barzar</a>            
            </div>
            <div class="shop-dtl text-center">
              <a href="{{route('viewbazar', $data->id)}}"><h6 class="product-name">{{$data->Barzar_name}}</h6></a>
             
              <div class="shop-price">
                <p>Location: {{$data->location}}</p>
              </div>           
            </div>
          </div>
        </div>
        @endforeach
        

      </div>
    </div>
  </div>  
<!-- end shop -->

@endsection