@extends('layouts.admin')
@section('content')


<div class="pcoded-content">

        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                        <div class="d-inline">
                        <h5>Admin Dashboard</h5>
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
        <div class="col-xl-3 col-md-6">
            <div class="card prod-p-card card-red">
                <a href="{{route('carbookings')}}">
                <div class="card-body">
                    <div class="row align-items-center m-b-30">
                        <div class="col">
                        <h6 class="m-b-5 text-white">Total Users</h6>
                     <center>   <h3 class="m-b-0 f-w-700 text-white">{{$users}}</h3></center>
                        </div>
                   
                </div></a>
                <!-- <p class="m-b-0 text-white"><span class="label label-danger m-r-10"></span>Number of Car Orders</p> -->
                </div>
            </div>
        </div>

    <div class="col-xl-3 col-md-6">
        <div class="card prod-p-card card-blue">
        <a href="{{route('homecare')}}">
            <div class="card-body">
                <div class="row align-items-center m-b-30">
                    <div class="col">
                    <h6 class="m-b-5 text-white"> Total Bookings</h6>
                   <center> <h3 class="m-b-0 f-w-700 text-white">{{$books}}</h3></center>
                    </div>
                    
                </div>
            <!-- <p class="m-b-0 text-white"><span class="label label-primary m-r-10"></span>Total Homecare orders</p> -->
            </div>
        </div></a>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card prod-p-card card-green">
        <a href="{{route('market')}}">
            <div class="card-body">
                <div class="row align-items-center m-b-30">
                    <div class="col">
                        <h6 class="m-b-5 text-white">Completed Bookings</h6>
                       <center> <h3 class="m-b-0 f-w-700 text-white">{{$assignedbook}}</h3></center>
                    </div>
                       
                    </div>
                    <!-- <p class="m-b-0 text-white"><span class="label label-success m-r-10"></span>Your Listed Cars</p> -->
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
                        <h6 class="m-b-5 text-white">Riders</h6>
                       <center> <h3 class="m-b-0 f-w-700 text-white">{{$riders}}</h3></center>
                    </div>
                   
                </div>
                </div>
        </div></a>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card prod-p-card card-blue">
        <a href="{{route('managenetwork')}}">

            <div class="card-body">
                <div class="row align-items-center m-b-30">
                    <div class="col">
                        <h6 class="m-b-5 text-white">Total Services</h6>
                       <center> <h3 class="m-b-0 f-w-700 text-white">{{$servs}}</h3></center>
                    </div>
                   
                </div>
                <!-- <p class="m-b-0 text-white"><span class="label label-warning m-r-10"></span>Your network connections</p> -->
                </div>
        </div></a>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card prod-p-card card-green">
        <a href="{{route('managenetwork')}}">

            <div class="card-body">
                <div class="row align-items-center m-b-30">
                    <div class="col">
                        <h6 class="m-b-5 text-white">Pending Bookings</h6>
                       <center> <h3 class="m-b-0 f-w-700 text-white">{{$pendingbook}}</h3></center>
                    </div>
                   
                </div>
                <!-- <p class="m-b-0 text-white"><span class="label label-warning m-r-10"></span>Your network connections</p> -->
                </div>
        </div></a>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card prod-p-card card-yellow">
        <a href="{{route('managenetwork')}}">

            <div class="card-body">
                <div class="row align-items-center m-b-30">
                    <div class="col">
                        <h6 class="m-b-5 text-white">Total Barzars</h6>
                    <center>   <h3 class="m-b-0 f-w-700 text-white">{{$bazars}}</h3></center> 
                    </div>
                    
                </div>
                <!-- <p class="m-b-0 text-white"><span class="label label-warning m-r-10"></span>Your network connections</p> -->
                </div>
        </div></a>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card prod-p-card card-red">
        <a href="{{route('managenetwork')}}">

            <div class="card-body">
                <div class="row align-items-center m-b-30">
                    <div class="col">
                        <h6 class="m-b-5 text-white">Listed Cars</h6>
                     <center>   <h3 class="m-b-0 f-w-700 text-white">{{$carsal}}</h3></center>
                    </div>
                    
                </div>
                <!-- <p class="m-b-0 text-white"><span class="label label-warning m-r-10"></span>Your network connections</p> -->
                </div>
        </div></a>
    </div>





    
<div class="col-xl-4 col-md-12">
<div class="card comp-card">
<div class="card-body">
<div class="row align-items-center">
<div class="col">
<h6 class="m-b-25">Completed Bookings</h6>
<h3 class="f-w-700 text-c-blue">KES. {{$completednedbook}}</h3>
<!-- <p class="m-b-0">May 23 - June 01 (2017)</p> -->
</div>
<div class="col-auto">
<i class="fas fa-eye bg-c-blue"></i>
</div>
</div>
</div>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="card comp-card">
<div class="card-body">
<div class="row align-items-center">
<div class="col">
<h6 class="m-b-25">Car Sales</h6>
<h3 class="f-w-700 text-c-green">KES. {{$carsales}}</h3>
</div>
<div class="col-auto">
<i class="fas fa-bullseye bg-c-green"></i>
</div>
</div>
</div>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="card comp-card">
<div class="card-body">
<div class="row align-items-center">
<div class="col">
<h6 class="m-b-25">Homecare Services</h6>
<h3 class="f-w-700 text-c-yellow">KES. {{$hmcs}}</h3>
</div>
<div class="col-auto">
<i class="fas fa-hand-paper bg-c-yellow"></i>
</div>
</div>
</div>
</div>
</div>





<div class="col-xl-6 col-md-12">
<div class="card new-cust-card">
<div class="card-header">
<h5>New Users</h5>
<div class="card-header-right">

</div>
</div>
<div class="card-block">
@foreach($allusers as $allusers)
<div class="align-middle m-b-35">
<img src="/storage/images/noprofile.png" alt="user image" class="img-radius img-40 align-top m-r-15">
<div class="d-inline-block">
<a href="#"><h6>{{$allusers->name}}</h6></a>
<p class="text-muted m-b-0">{{$allusers->created_at}}</p>
<span class="status active"></span>
</div>
</div>
@endforeach


</div>
</div>
</div>



<div class="col-xl-6 col-md-12">
<div class="card new-cust-card">
<div class="card-header">
<h5> Recent Car Bookings</h5>
<div class="card-header-right">

</div>
</div>
<div class="card-block">
    @foreach($recentbooks as $recentbooks)
<div class="align-middle m-b-35">
<img src="../files/assets/images/avatar-2.jpg" alt="user image" class="img-radius img-40 align-top m-r-15">
<div class="d-inline-block">
<a href="#!"><h6>{{$recentbooks->package}}</h6></a>
<p class="text-muted m-b-0">{{$recentbooks->status}}</p>
<span class="status active"></span>
</div>
</div>
@endforeach
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