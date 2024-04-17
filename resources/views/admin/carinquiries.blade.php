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
<h5>List Car Inquiries</h5>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class=" breadcrumb breadcrumb-title">
<li class="breadcrumb-item">
<a href="{{route('admin')}}"><i class="feather icon-home"></i></a>
</li>
<li class="breadcrumb-item"><a href="">Car Inquiries</a>
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
<div class="card-header-right"> <ul class="list-unstyled card-option"> <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li> <li><i class="feather icon-maximize full-card"></i></li> <li><i class="feather icon-minus minimize-card"></i></li> <li><i class="feather icon-refresh-cw reload-card"></i></li> <li><i class="feather icon-trash close-card"></i></li> <li><i class="feather icon-chevron-left open-card-option"></i></li> </ul> </div>
</div>
    <div class="card-block table-border-style">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Car Detail</th>
                    <th>User Detail</th>
                    <th>User Email</th>
                   
                    <th>Price</th>
                    <th>Model Year</th>
                    <th>Status</th>
                    
                    <th></th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $users)
                    <tr>
                    @php
                    $hps = App\Models\User::where('id',$users->user_id)->pluck('name');
                                        
                    @endphp
                        <th scope="row">{{$users->id}}</th>
                        <td><a href="{{route('cardetail',$users->car_id)}}" style="color:blue">{{$users->brand}} {{$users->brand}}</a> </td>
                        <td ><a href="{{route('viewuserprofile',$users->user_id)}}" style="color:blue">@foreach($hps as $hps){{ $hps}}@endforeach </a></td>
                        <td>{{$users->user_email}}</td>
                        <td>{{$users->price}}</td>
                        <td>{{$users->modelyear}}</td>
                        <td>{{$users->status}}</td>                     
                                      
                        <td><a class="btn btn-success btn-sm" href="{{route('carinquirymark',$users->id)}}">Attended</a></td>
                        <td><a href="{{route('delinq',$users->id)}}" class="btn btn-danger btn-sm" href="">Delete</a></td>
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