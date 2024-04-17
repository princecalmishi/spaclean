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
<h5>List of SpaClean Riders</h5>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class=" breadcrumb breadcrumb-title">
<li class="breadcrumb-item">
<a href="{{route('admin')}}"><i class="feather icon-home"></i></a>
</li>
<li class="breadcrumb-item"><a href="">Riders</a>
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
<h5>Riders <a class="btn btn-primary ml-5" href="{{route('createrider')}}">Add New Rider</a></h5>
</div>
    <div class="card-block table-border-style">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Rider Name</th>
                    <th></th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>N.ID</th>
                    <th>Town</th>
                    <th>Plate</th>
                    <th>Color</th>
                    <th>Rare Image</th>
                    <th>Front Image</th>
                    <th>Good Conduct</th>
                    <th>Insurance</th>
                    <th>License</th>
                    <th></th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $users)
                    <tr>
                        <th scope="row">{{$users->id}}</th>
                        <td>{{$users->name}}</td>
                        <td><a class="btn btn-info btn-sm" href="{{route('assignedorders',$users->name)}}">View Delivered Orders</a></td>
                        <td>{{$users->email}}</td>
                        <td>{{$users->phone}}</td>
                        <td>{{$users->national_id}}</td>
                        <td>{{$users->town}}</td>
                        <td>{{$users->plate_number}}</td>
                        <td>{{$users->color}}</td>
                        
                        <td><img style="height:60px; width:60px" src="/storage/images/{{$users->rare_image}}" alt="img"></td>
                        <td><img style="height:60px; width:60px" src="/storage/images/{{$users->front_image}}" alt="img"></td>
                        <td><img style="height:60px; width:60px" src="/storage/images/{{$users->good_conduct}}" alt="img"></td>
                        <td><img style="height:60px; width:60px" src="/storage/images/{{$users->insurance}}" alt="img"></td>
                        <td><img style="height:60px; width:60px" src="/storage/images/{{$users->license}}" alt="img"></td>
              
                        <td><a class="btn btn-success btn-sm" href="{{route('editrider',$users->id)}}">Edit</a></td>
                        <td><a href="{{route('delrider',$users->id)}}" class="btn btn-danger btn-sm" href="">Delete</a></td>
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