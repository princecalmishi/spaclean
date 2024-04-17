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
<h5>Network Experiences</h5>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class=" breadcrumb breadcrumb-title">
<li class="breadcrumb-item">
<a href="{{route('admin')}}"><i class="feather icon-home"></i></a>
</li>
<li class="breadcrumb-item"><a href="">Network Experiences</a>
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
</div>
    <div class="card-block table-border-style">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>User Name</th>
                    <th>Work Position</th>
                    <th>Company</th>
                    <th>From_date</th>
                    <th>To_date</th>
                    <th>Location</th>
                    <th>Description</th>
                    <th>Skills</th>
                    <th>Education</th>
                   
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
                        <td>@foreach($hps as $hps){{ $hps}}@endforeach</td>
                        <td>{{$users->Work_position}}</td>
                        <td>{{$users->Company}}</td>
                        <td>{{$users->From_date}}</td>
                        <td>{{$users->To_date}}</td>
                        <td>{{$users->Location}}</td>
                        <td>{{ Illuminate\Support\Str::limit($users->Description, 20) }}</td>
                        <td>{{$users->Skills}}</td>
                        <td>{{$users->Education}}</td>

                                      
                       <!-- <td><a class="btn btn-info btn-sm" href="">User Experience</a></td> -->
                       <td><a class="btn btn-primary btn-sm" href="{{route('edituser',$users->user_id)}}">Edit Experience</a></td>
                        <td><a href="{{route('deleteexp',$users->id)}}" class="btn btn-danger btn-sm" href="">Delete</a></td>
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