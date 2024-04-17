@extends('layouts.cleaner')
@section('content')


<div class="pcoded-content">

      

<div class="pcoded-inner-content">


<div class="page-header card">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<i class="feather icon-credit-card bg-c-blue"></i>
<div class="d-inline">
<h5>Cleaner Dashboard</h5>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class=" breadcrumb breadcrumb-title">
<li class="breadcrumb-item">
<a href="{{route('admin')}}"><i class="feather icon-home"></i></a>
</li>
<li class="breadcrumb-item"><a href="">Car Bookings</a>
</li>

</ul>
</div>
</div>
</div>
</div>

<div class="pcoded-inner-content">

<div class="main-body">
<div class="page-wrapper">

<div class="page-body">

<div class="row">


    
<div class="col-xl-4 col-md-12">
<div class="card comp-card">
<div class="card-body">
<div class="row align-items-center">
<div class="col">
<h6 class="m-b-25">Completed Car Bookings</h6>
<h3 class="f-w-700 text-c-blue">KES. {{$datasum}}</h3>
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
<h6 class="m-b-25">Completed Bookings</h6>
<h3 class="f-w-700 text-c-green">{{$datacount}} </h3>
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
<h6 class="m-b-25">Pending Bookings</h6>
<h3 class="f-w-700 text-c-yellow">{{$datapend}}</h3>
</div>
<div class="col-auto">
<i class="fas fa-hand-paper bg-c-yellow"></i>
</div>
</div>
</div>
</div>
</div>


<div class="card">
<div class="card-header">
<!-- <h5>Users</h5> -->
</div>
    <div class="card-block table-border-style">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>REF</th>
                    <th>User Name</th>
                    <th>Package</th>
                    <th>Package Type</th>
                    <th>Status</th>
                    <th>Personel</th>
                    <th>Payment Method</th>
                    <th>Amount</th>
                    <th>Pickup Date | Time</th>
                    <th>Created at</th>
                    
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($datacount >= 1)
                        @foreach($data as $users)
                            <tr>
                            @php
                            $hps = App\Models\User::where('id',$users->userid)->pluck('name');
                            $personel = App\Models\Car_Wash_Personnel::where('id',$users->personnel_id)->pluck('name');
                                                
                            @endphp
                                <th scope="row">{{$users->id}}</th>
                                <td>{{$users->ref_number}}</td>
                                <td>@foreach($hps as $hps){{ $hps}}@endforeach</td>
                                <td>{{$users->package}}</td>
                                <td>{{$users->package_type}}</td>
                                <td>{{$users->status}}</td>
                                <td>@foreach($personel as $personel){{ $personel}}@endforeach</td>
                                <td>{{$users->payment_method}}</td>
                                <td>{{$users->amount}}</td>
                                <td>{{$users->pickupdate}} |{{$users->pickuptime}}</td>
                                <td>{{$users->created_at}}</td>

                                            
                                <td><a class="btn btn-success btn-sm" href="{{route('makepayment2',$users->id)}}">Mark Cleaned</a></td>
                                <!-- <td><a href="{{route('usedeletebooking',$users->id)}}" class="btn btn-danger btn-sm" href="">Delete</a></td> -->
                            </tr>  
                            @endforeach 
                            
                        @else
                        <tr>
                        <h3>No data here yet</h3>
                        </tr>

                        @endif

                 
            </table>
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
</div>
</div>






@endsection