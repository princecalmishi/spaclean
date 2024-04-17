@extends('layouts.admin')
@section('content')


<div class="pcoded-content">

      

<div class="pcoded-inner-content">


<div class="page-header card">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<i class="feather icon-credit-card bg-c-blue"></i>
<div class="d-inline">
<h5>List of Pending Car Bookings</h5>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class=" breadcrumb breadcrumb-title">
<li class="breadcrumb-item">
<a href="{{route('admin')}}"><i class="feather icon-home"></i></a>
</li>
<li class="breadcrumb-item"><a href="">Pending Car Bookings</a>
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


<div class="card">
<div class="card-header">
<!-- <h5>Users</h5> -->
<div class="card-header-right"> <ul class="list-unstyled card-option"> <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li> <li><i class="feather icon-maximize full-card"></i></li> <li><i class="feather icon-minus minimize-card"></i></li> <li><i class="feather icon-refresh-cw reload-card"></i></li> <li><i class="feather icon-trash close-card"></i></li> <li><i class="feather icon-chevron-left open-card-option"></i></li> </ul> </div>
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
                    
                    <th></th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                        

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

                                      
                        <td>@if($users->status == 'unpaid')<a class="btn btn-success btn-sm" href="{{route('approvebooking',$users->id)}}">Mark Paid</a>@endif</td>
                        <td><a href="{{route('deletebooking',$users->id)}}" class="btn btn-danger btn-sm" href="">Delete</a></td>
                    </tr>  
                    @endforeach 
            </table>
        </div>
        <center class="mb-4 mt-5">{{$data->links()}}</center>  
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

<div id="styleSelector">
</div>
</div>
</div>
</div>
</div>
</div>
</div>






@endsection