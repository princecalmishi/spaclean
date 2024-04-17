@extends('layouts.myapp')
@section('content')

<!--  end navigation -->
<!--  page banner -->
  <div id="page-banner" class="page-banner-main" style="background-image: url('images/bg/page-banner.jpg')">
    <div class="container">
      <div class="page-banner-block">
        <div class="section">
          <h3 class="section-heading">Product Details</h3>
        </div>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>
          <li><a href="#">Shop</a></li>
          <li class="active"><a>Product Details</a></li>
        </ol>
      </div>
    </div>
  </div>
<!--  end page banner  -->
<!-- single product -->
  <div id="single-product" class="shop-page single-product-main-block">
    <div class="container">
      <div class="row">
        <!-- <div class="col-sm-4"> -->
          <!-- <div class="product-desc-img">
            <img id="zoom-01" src="/storage/servicepics/{{$data->cover_image}}" class="img-responsive" alt="product-desc-1" data-zoom-image="images/shop/product-full-01.jpg">
          </div>            -->
          
        <!-- </div>   -->
        <!-- car slider  -->
        

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

         <div class="col-sm-4">
         <div id="slideshow" class="col-sm-4">
          <div class="slide-wrapper">
            <div class="slide"><img src="/storage/servicepics/{{$data->cover_image}}" alt="" ></div>
            <div class="slide"><img src="/storage/servicepics/{{$data->cover_image2}}" alt=""></div>
            <div class="slide"><img src="/storage/servicepics/{{$data->cover_image3}}" alt=""></div>
            <!-- <div class="slide"><h1 class="slide-number">4</h1></div>
            <div class="slide"><h1 class="slide-number">5</h1></div> -->
          </div>
        </div>         
          <div id="gallery-01" class="product-gallery">  
            <div class="product-gallery-thumb">
            <a href="/storage/servicepics/{{$data->cover_image2}}" data-image="/storage/servicepics/{{$data->cover_image2}}" data-enlargable src="/storage/servicepics/{{$data->cover_image2}}">
                <img src="/storage/servicepics/{{$data->cover_image2}}" class="img-responsive" alt="product-thumb-2"><div class="product-gallery-overlay">
                  <span><i class="fa fa-search-plus" aria-hidden="true"></i></span></div>
                </a>
                
            </div>               
            <div class="product-gallery-thumb">
              <a href="/storage/servicepics/{{$data->cover_image3}}" data-image="/storage/servicepics/{{$data->cover_image3}}" data-enlargable src="/storage/servicepics/{{$data->cover_image3}}">
                <img src="/storage/servicepics/{{$data->cover_image3}}" class="img-responsive" alt="product-thumb-2"><div class="product-gallery-overlay">
                  <span><i class="fa fa-search-plus" aria-hidden="true"></i></span></div>
                </a>
            </div>             
            <div class="product-gallery-thumb">
              <a href="/storage/servicepics/{{$data->cover_image}}" data-image="/storage/servicepics/{{$data->cover_image}}" data-enlargable src="/storage/servicepics/{{$data->cover_image}}">
                <img src="/storage/servicepics/{{$data->cover_image}}" class="img-responsive" alt="product-thumb-3">
                <div class="product-gallery-overlay"><span><i class="fa fa-search-plus" aria-hidden="true"></i></span>
              </div></a>
            </div>
          </div> 
        </div> 
       
        <!-- car slider -->

        <div class="col-sm-8">
          <div class="single-product-dtl">
            <div class="shop-dtl">
              <a ><h6 class="product-name">{{$data->brand}} | {{$data->model}}</h6></a>
             
              <div class="shop-price">
                <p>KSH : {{$data->price}}</p>
              </div>           
            </div>
            <strong>Car Description : </strong><p>{{$data->description}}</p>
              
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
            <form action="{{route('carinquirypost')}}" method="post">
              @csrf

            <input type="hidden" name="car_id" value="{{$data->id}}" class="form-control">
           
                          @php
                            $mid = $data->user_id;
                            $comm = \DB::table('users')->where('id', $mid)->pluck('phone');
                            foreach($comm as $com)
                            
                            @endphp
            <button class="btn btn-success" type="submit">Buy from SpaClean</button>
            <!-- <a href="tel: @php echo $com; @endphp" class="btn btn-success ">Buy from Seller</a>            -->
            <a href="tel: @php echo $com; @endphp" class="btn btn-primary ">Buy from Seller</a>           

            </form>
             <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="description">
              <p>Related Products</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- shop -->        
    <div id="shop-products" class="shop-main-block">
      <div class="container">  
        <div class="row"> 
        @foreach($related as $rl)
          <div class="col-md-3 col-sm-6">      
            <div class="shop-block">      
              <div class="shop-img text-center">
                <img src="/storage/servicepics/{{$rl->cover_image}}" class="img-responsive" alt="product-1"> 
                <div class="overlay-bg"></div>
                 <a href="{{route('carinquirys',$rl->id)}}" class="btn btn-default"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Buy Now</a>            
              </div>
              <div class="shop-dtl text-center">
                <a href="product-details.html"><h6 class="product-name">{{$rl->brand}} | {{$rl->model}}</h6></a>
                <div class="shop-price">
                <i class="fa fa-map-marker" aria-hidden="true"></i> : {{$rl->Location}}
              </div> 

              <div class="shop-price">
              <i class="fa fa-truck" aria-hidden="true"></i> {{$rl->Fuel}},  <i class="fa fa-tachometer" aria-hidden="true"></i>  {{$rl->Mileage}} km, </i> {{$rl->CC}} CC

              </div> 
              <div class="shop-price">
               {{$rl->Gear}},  {{$rl->Colour}}

              </div> 
                <div class="shop-price">
                  <p>KSH : {{$rl->price}}</p>
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
@endsection