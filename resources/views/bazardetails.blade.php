@extends('layouts.home')
@section('content')

<div class="pcoded-content">
@foreach($data as $netsuggest)
        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                        <div class="d-inline">
                        <h5>My Car Barzar - {{$netsuggest->Barzar_name}} Bazar <a class="btn btn-danger" href="{{route('carsonmybazar',$id)}}">Cars Listed on the Bazar</a> </h5>
                        <!-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> -->
                        </div>
                    </div>
                </div>
            <div class="col-lg-4">
           
        </div>
    </div>
</div>

<div class="pcoded-inner-content">
<div class="main-body">
<div class="page-wrapper">
<div class="page-body">

<div class="row">
   



<div class="row">
<div class="col-sm-12">

<div class="card">
<div class="card-header">
<h5>Details on : {{$netsuggest->Barzar_name}} Bazar</h5>   <center> @include('inc.messages')</center> 

</div>
<div class="card-block">
<div class="row ui-sortable" id="draggablePanelList">


<div class="col-lg-12 col-xl-3" style="position: relative; left: 0px; top: 0px;">
    <a href="{{route('carbazarlist',$netsuggest->id)}}">
        <div class="card-sub">
            <img class="card-img-top img-fluid" src="/images/default.jpg" alt="Card image cap">
            <div class="card-block">
            <h5 class="card-title">Bazar Name: {{$netsuggest->Barzar_name}}</h5>
            <p class="card-text">Bazar Location: {{$netsuggest->location}}</p>
            <p class="card-text">Bazar Contact: {{$netsuggest->contact}}</p>
            </div>
            <a class="btn btn-primary btn-sm ml-3" href="{{route('addbazarpack',$id)}}">Add Subscription Now</a>   <br><br><hr>  
          </div>



    
</div>

<div class="col-lg-12 col-xl-6" style="position: relative; left: 0px; top: 0px;">
        <div class="card-sub">
            <center>
            <div class="card-block"> <strong><h5>CAR BAZAAR SUBSCRIPTION</h5></strong><hr><br>
            @if($bazsubscount >= 1)
                    @foreach($bazsubs as $bazsubs)              
                           

                            @php
                            $bazarpackname = App\Models\Bazaar_package::where('id',$bazsubs->bazaar_id)->pluck('name');
                            $bazarcars = App\Models\Bazaar_package::where('id',$bazsubs->bazaar_id)->pluck('number_of_cars');
                            $bazarperiod = App\Models\Bazaar_package::where('id',$bazsubs->bazaar_id)->pluck('period');
                            
                            $noofcarslisted = App\Models\Car_Sales::where('subscription_id',$bazsubs->id)->count();
                            

                            @endphp
                        <h5>{{$bazsubs->id}} :Subscription name:
                        @foreach($bazarpackname as $bazarpackname)
                    {{ $bazarpackname}} 
                      @endforeach  @if($bazsubs->status == 'unpaid')<span class="btn btn-danger btn-sm">{{$bazsubs->status}}</span>
                                        @else <span class="btn btn-primary btn-sm">{{$bazsubs->status}}</span>
                                        @endif <a href="{{route('deletepack',$bazsubs->id)}}"><i class="feather icon-trash close-card"></i></a>
                        </h5>
                        <br>

                        @php
                            $now = now();
                            // Convert the date strings to Carbon instances
                            $startDate = \Carbon\Carbon::parse($now);
                            $endDate = \Carbon\Carbon::parse($bazsubs->expiry_date);

                            // Calculate the difference in days, months, or any other unit you need
                            $differenceInDays = $endDate->diffInDays($startDate);
                            $differenceInMonths = $endDate->diffInMonths($startDate);
                            // You can use other methods like diffInYears, diffInSeconds, etc.


                        @endphp

                        <h5>Upload upto : @foreach($bazarcars as $bazarcars){{ $bazarcars}} @endforeach Cars. - <i class="fa fa-bus"></i> Uploaded {{ $noofcarslisted}} Cars</h5><br>
                        <h5>Valid period of  @foreach($bazarperiod as $bazarperiod){{ $bazarperiod}} @endforeach month(s) - {{$differenceInDays}} Days Rem.</h5>
                        <hr>
                        @if($bazsubs->status == 'active')
                            @if($noofcarslisted == $bazarcars)
                            <center><a href="#" class="btn btn-danger">Subscription Car Limit Reached</a></center>
                            <hr>
                            @else
                            <center><a href="{{route('adcartobazar',$bazsubs->id)}}" class="btn btn-success">Add car to Bazar Subscription</a></center>
                            <br><hr>
                            @endif
                        @endif
                        @endforeach
                    <br>
                    @else
                  <center>  <strong><h5>No subscriptions yet ! </h5> </strong></center><br>


                    @endif
          
            </div>
            </center>
        </div>
   
</div>



</div>
</div>
</div>

</div>
</div>


</div>
</div>
</div>

</div>
</div>

@endforeach

    









</div>
</div>
</div>
</div>
</div>

<div id="styleSelector">
</div>

</div>
</div>
</div>
</div>

<!-- add car modal -->















@endsection

