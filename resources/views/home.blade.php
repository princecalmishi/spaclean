@extends('layouts.home')
@section('content')

<div class="pcoded-content">

        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                        <div class="d-inline">
                        <h5>Dashboard</h5>
                        <!-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> -->
                        </div>
                    </div>
                </div>
                <center> @include('inc.messages')</center>

            <div class="col-lg-4">
            <!-- <div class="page-header-breadcrumb">
            <ul class=" breadcrumb breadcrumb-title">
            <li class="breadcrumb-item">
            <a href="../index.html"><i class="feather icon-home"></i></a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Dashboard CRM</a> </li>
            </ul>
            </div> -->
        </div>
    </div>
</div>

<div class="pcoded-inner-content">
<div class="main-body">
<div class="page-wrapper">
<div class="page-body">

<div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card prod-p-card card-red">
                <a href="{{route('carbookings')}}">
                <div class="card-body">
                    <div class="row align-items-center m-b-30">
                        <div class="col">
                        <h6 class="m-b-5 text-white">Car Bookings</h6>
                        <h3 class="m-b-0 f-w-700 text-white">{{$carbookingscount}}</h3>
                        </div>
                    <div class="col-auto">
                    <i class="fas fa-list-alt text-c-red f-18"></i>
                    </div>
                </div></a>
                <p class="m-b-0 text-white"><span class="label label-danger m-r-10"></span>Number of Car Orders</p>
                </div>
            </div>
        </div>

    <div class="col-xl-3 col-md-6">
        <div class="card prod-p-card card-blue">
        <a href="{{route('homecare')}}">
            <div class="card-body">
                <div class="row align-items-center m-b-30">
                    <div class="col">
                    <h6 class="m-b-5 text-white"> Homecare Orders</h6>
                    <h3 class="m-b-0 f-w-700 text-white">{{$homecarebookingscount}}</h3>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-database text-c-blue f-18"></i>
                    </div>
                </div>
            <p class="m-b-0 text-white"><span class="label label-primary m-r-10"></span>Total Homecare orders</p>
            </div>
        </div></a>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card prod-p-card card-green">
        <a href="{{route('market')}}">
            <div class="card-body">
                <div class="row align-items-center m-b-30">
                    <div class="col">
                        <h6 class="m-b-5 text-white">Market Listings</h6>
                        <h3 class="m-b-0 f-w-700 text-white">{{$carcount}}</h3>
                    </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign text-c-green f-18"></i>
                        </div>
                    </div>
                    <p class="m-b-0 text-white"><span class="label label-success m-r-10"></span>Your Listed Cars</p>
                </div>
        </div>
</a>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card prod-p-card card-yellow">
        <a href="{{route('managenetwork')}}">

            <div class="card-body">
                <div class="row align-items-center m-b-30">
                    <div class="col">
                        <h6 class="m-b-5 text-white">Connections</h6>
                        <h3 class="m-b-0 f-w-700 text-white">{{$conn}}</h3>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-tags text-c-yellow f-18"></i>
                    </div>
                </div>
                <p class="m-b-0 text-white"><span class="label label-warning m-r-10"></span>Your network connections</p>
                </div>
        </div></a>
    </div>


<!-- new in the market -->

<div class="row">
<div class="col-sm-12">

<div class="card">
<div class="card-header">
<h5>New in the Market</h5>
</div>
<div class="card-block">
<div class="row ui-sortable" id="draggablePanelList">
    @foreach($newmarkdatax as $newmarkdata)

<div class="col-lg-12 col-xl-3 ui-sortable-handle" style="position: relative; left: 0px; top: 0px;">
<center>
<div class="card-sub">
<center><img style="height:150px; width:150px;" class="card-img-top img-fluid mt-2" src="/storage/images/{{$newmarkdata->cover_image}}" alt="image"></center>
<div class="card-block">
<h5 class="card-title">{{$newmarkdata->model}} | {{$newmarkdata->brand}}</h5>
<p class="card-text">KES. {{$newmarkdata->price}}</p>
<hr>
  <a class="btn btn-primary btn-sm" href="{{route('cardetail',$newmarkdata->id)}}">View Car</a>
</div>
</div></center>
</div>

@endforeach

<hr>
<center class="mb-4 mt-5">{{$newmarkdatax->links()}}</center>  
                                            <style>
                                                .w-5{
                                                display: none;
                                                }
                                            </style>

</div>
</div>
</div>

</div>
</div>

<!-- Network connect -->


<div class="row">
<div class="col-sm-12">

<div class="card">
<div class="card-header">
<h5>Network Connect Suggestions</h5>
</div>
<div class="card-block">
<div class="row ui-sortable" id="draggablePanelList">
    @if($datacount >= 1)
    @foreach($netsuggestx as $netsuggest)

<div class="col-lg-12 col-xl-3 ui-sortable-handle" style="position: relative; left: 0px; top: 0px;">
<div class="card-sub">
<img style="height:150px; width:150px;" class="card-img-top img-fluid" src="/storage/images/{{$netsuggest->Profile_image}}" alt="image cap">
<div class="card-block"><center>
<h5 class="card-title">{{$netsuggest->Name}}</h5>
<p class="card-text">{{$netsuggest->Profession}}</p>
<p class="card-text">{{$netsuggest->Location}}</p>
   <center> <a href="{{route('connect',$netsuggest->user_id)}}" class="btn btn-success btn-sm">Connect</a></center>
</div></center>
</div>
</div>

@endforeach

<center class="mb-4 mt-5">{{$netsuggestx->links()}}</center>  
                                            <style>
                                                .w-5{
                                                display: none;
                                                }
                                            </style>
@else

<center><h5>No Connections to make </h5></center><br><hr>
@endif

<hr>


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

<div id="styleSelector">
</div>

</div>
</div>
</div>
</div>


@endsection