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
<h5>All Users List</h5>
<span>List of all users in SpaClean</span>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class=" breadcrumb breadcrumb-title">
<li class="breadcrumb-item">
<a href="{{route('admin')}}"><i class="feather icon-home"></i></a>
</li>
<li class="breadcrumb-item"><a href="">All Users</a>
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
<h5>Users <a class="btn btn-primary ml-5" href="{{route('adduser')}}">Add New User</a></h5>

    <div class="card-block table-border-style">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Action</th>
                    <th></th>
                    <th></th>
                    <th></th>


                    
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $usersx)
                    <tr>
                        <th scope="row">{{$usersx->id}}</th>
                        <td>{{$usersx->name}}</td>
                        <td>{{$usersx->email}}</td>
                        <td>{{$usersx->phone}}</td>
                        <td>{{$usersx->role}}</td>
                        <td>@if($usersx->role == 'user')<a class="btn btn-primary btn-sm" href="{{route('makeuser',$usersx->id)}}">Make admin</a>@else <a class="btn btn-primary btn-sm" href="{{route('makeuser',$usersx->id)}}">Make User</a> @endif</td>
                        <td><a class="btn btn-info btn-sm" href="{{route('makecleaner',$usersx->id)}}">Make Cleaner</a></td>
                        <td><a class="btn btn-success btn-sm" href="{{route('edituser',$usersx->id)}}">Edit</a></td>
                        <td><a href="{{route('delusers',$usersx->id)}}" class="btn btn-danger btn-sm" href="">Delete</a></td>
                    </tr>  
                    @endforeach 
            </table>
        </div><hr>

    </div>
    </div>
    <center class="mb-4 mt-5">{{$users->links()}}</center>  
                                            <style>
                                                .w-5{
                                                display: none;
                                                }
                                            </style>

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