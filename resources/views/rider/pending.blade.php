@extends('layouts.rider')
@section('content')

<div class="pcoded-content">

        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                        <div class="d-inline">
                        <h5>Rider Dashboard</h5>
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


    
<div class="col-xl-4 col-md-12">
<div class="card comp-card">
<div class="card-body">
<div class="row align-items-center">
<div class="col">
<h6 class="m-b-25">Completed Bookings</h6>
<h3 class="f-w-700 text-c-blue">KES. 333</h3>
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
<h3 class="f-w-700 text-c-green">KES.334 </h3>
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
<h3 class="f-w-700 text-c-yellow">KES. 212</h3>
</div>
<div class="col-auto">
<i class="fas fa-hand-paper bg-c-yellow"></i>
</div>
</div>
</div>
</div>
</div>




<div class="col-xl-12 col-md-12">
<div class="card new-cust-card">
<div class="card-header">
<h5>My Orders</h5>
<div class="card-header-right">

</div>
</div>
<div class="card-block">
@if($myassigcount >=1)

    <div class="card-block table-border-style">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>REF</th>
                    
                    <th>Contact Name</th>
                    <th>Contact Phone</th>
                    <th>Item Name</th>
                    <th>Size</th>
                    <th>Colour</th>
                    <th>Image</th>   
                    <th>Status</th>
                    <th>Payment Method</th>
                    <th>Amount</th>
                    <th>T.Fee</th>
                    <th>Pickup date|Time</th>

                    <th></th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($myassign as $users)
                    <tr>
                    @php
                    $hps = App\Models\User::where('id',$users->userid)->pluck('name');
                    $personel = App\Models\Car_Wash_Personnel::where('id',$users->personnel_id)->pluck('name');
                    
                    @endphp
                        <th scope="row">{{$users->id}}</th>
                        <td>{{$users->ref_number}}</td>                        
                        <td>{{$users->contact_name}}</td>
                        <td>{{$users->contact_phone}}</td>
                        <td>{{$users->name}}</td>
                        <td>{{$users->size}}</td>
                        <td>{{$users->colour}}</td>
                        <td><img style="height:60px; width:60px" src="/storage/images/{{$users->image}}" alt="img"></td>
                         <td>{{$users->status}}</td> 	
                         <td>{{$users->payment_method}}</td> 
                         <td>{{$users->amount}}</td> 
                         <td>{{$users->transport_fee}}</td> 
                         <td>{{$users->pickupdate}}|{{$users->pickuptime}}</td> 
                        
                         <td>@if($users->status == 'unpaid')<a class="btn btn-success btn-sm" href="{{route('makepayment',$users->id)}}">Pay Now</a>@endif</td>
                        <td><a href="{{route('udeletehome',$users->id)}}" class="btn btn-danger btn-sm" href="">Delete</a></td>
                    </tr>  
                    @endforeach 
            </table>
        </div>


<center class="mb-4 mt-5">{{$myassign->links()}}</center>  
                                            <style>
                                                .w-5{
                                                display: none;
                                                }
                                            </style>


@else
    <center><h4>You have no orders yet !</h4></center>    
@endif

</div>
</div>
</div>






@endsection