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
<h5>Network Profiles</h5>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class=" breadcrumb breadcrumb-title">
<li class="breadcrumb-item">
<a href="{{route('admin')}}"><i class="feather icon-home"></i></a>
</li>
<li class="breadcrumb-item"><a href="">Network Profiles</a>
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
                    <th>User Name</th>
                    <th>Profession</th>
                    <th>Location</th>
                    <th>Profile_image</th>
                    <th>Banner_image</th>
                    <th>About</th>
                   
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
                        <td>{{$users->Name}}</td>
                        <td>{{$users->Profession}}</td>
                        <td>{{$users->Location}}</td>
                        <td><img style="height:60px; width:60px" src="/storage/images/{{$users->Profile_image}}" alt="img"></td>
                        <td><img style="height:60px; width:60px" src="/storage/images/{{$users->Banner_image}}" alt="img"></td>
                       <td>{{ Illuminate\Support\Str::limit($users->About, 20) }}</td>

                       edituser
                       <td><a href="{{route('edituser',$users->user_id)}}" class="btn btn-info btn-sm">Edit User Profile</a></td>
                       <!-- <td><a class="btn btn-primary btn-sm" href="">Edit</a></td> -->
                        <td><a href="{{route('deleteprofile',$users->id)}}" class="btn btn-danger btn-sm" href="">Delete</a></td>
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