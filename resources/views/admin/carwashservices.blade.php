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
<h5>List of Car Wash Services</h5>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class=" breadcrumb breadcrumb-title">
<li class="breadcrumb-item">
<a href="{{route('admin')}}"><i class="feather icon-home"></i></a>
</li>
<li class="breadcrumb-item"><a href="">CarWash Services</a>
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
<center><a class="btn btn-primary" href="{{route('addnewservice')}}">Add New Service</a></center>
</div>
    <div class="card-block table-border-style">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Service Name</th>
                    <th>Service Category </th>
                    <th>Price</th>
                    <th>Status</th>
                   
                    
                    <th></th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $users)
                    <tr>
                        <th scope="row">{{$users->id}}</th>
                        <td>{{$users->service_name}}</td>
                        <td>{{$users->service_category}}</td>
                        <td>KES. {{$users->price}}</td>
                        <td>{{$users->status}}</td>
                     
                                      
                        <td><a class="btn btn-success btn-sm" href="{{route('editcarwashservice',$users->id)}}">Edit</a></td>
                        <td><a href="{{route('delecarwashserv',$users->id)}}" class="btn btn-danger btn-sm" href="">Delete</a></td>
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