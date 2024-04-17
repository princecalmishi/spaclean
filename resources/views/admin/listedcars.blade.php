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
<h5>All Listed Cars</h5>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class=" breadcrumb breadcrumb-title">
<li class="breadcrumb-item">
<a href="{{route('admin')}}"><i class="feather icon-home"></i></a>
</li>
<li class="breadcrumb-item"><a href="">Listed Cars</a>
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
<!-- <h5>Users</h5> --> <center><a class="btn btn-success" href="{{route('mybazar')}}">Add Car To Market Here</a></center>
</div>
    <div class="card-block table-border-style">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Listing User</th>
                    <th>Car Brand</th>
                    <th>Model</th>
                    <th style="width:10%">Description</th>
                    <th>Model Year</th>
                    <th>Price</th>
                    <th>Price Type</th>
                    <th>Status</th>
                    <th>Location</th>
                    <th>Fuel</th>
                    <th>Mileage</th>
                    <th>CC</th>
                    <th>Colour</th>
                    <th>Gear</th>
                    <th>cover_image</th>
                    <th>cover_image2</th>
                    <th>Barzar</th>
                    <th>Subscription</th>
                    
                    <th></th>
                    <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($data as $users)
                    <tr>
                    @php
                    $hps = App\Models\User::where('id',$users->user_id)->pluck('name');
                    $hps1 = App\Models\Barzars::where('id',$users->barzar_id)->pluck('Barzar_name');
                    $hps2 = App\Models\Bazaar_subscriptions::where('id',$users->subscription_id)->pluck('id');
                                        
                    @endphp
                        <th scope="row">{{$users->id}}</th>
                        <td>@foreach($hps as $hps){{ $hps}}@endforeach</td>
                        <td>{{$users->brand}}</td>
                        <td>{{$users->model}}</td>
                        <td>{{ Illuminate\Support\Str::limit($users->description, 40) }}</td>
                        <td>{{$users->modelyear}}</td>
                        <td>{{$users->price}}</td>
                        <td>{{$users->price_type}}</td>
                        <td>{{$users->status}}</td>
                        <td>{{$users->Location}}</td>
                        <td>{{$users->Fuel}}</td>
                        <td>{{$users->Mileage}}</td>
                        <td>{{$users->CC}}</td>
                        <td>{{$users->Colour}}</td>
                        <td>{{$users->Gear}}</td>
                        <td><img style="height:60px; width:60px" src="/storage/images/{{$users->cover_image}}" alt="img"></td>
                        <td><img style="height:60px; width:60px" src="/storage/images/{{$users->cover_image2}}" alt="img"></td>
                        <td>@foreach($hps1 as $hps1){{ $hps1}}@endforeach</td>
                        <td>{{$users->subscription_id}}</td>
                      
                                     
                        <td><a class="btn btn-success btn-sm" href="{{route('editlisting',$users->id)}}">Edit Listing</a></td>
                        <td><a href="{{route('dellisting',$users->id)}}" class="btn btn-danger btn-sm" href="">Delete</a></td>
                    </tr>  
                    @endforeach 
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