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
<h5>Spaclean Rider Transactions</h5>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class=" breadcrumb breadcrumb-title">
<li class="breadcrumb-item">
<a href="{{route('admin')}}"><i class="feather icon-home"></i></a>
</li>
<li class="breadcrumb-item"><a href="">Rider Transactions</a>
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
                    <th>Rider Name</th>
                    <th>Ref</th>        
                    <th>Amount</th>     
                    <th>Type</th>
                    <th>Status</th>   
                    <th>Date</th>   
                    <th></th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $users)
                    @php
                    $hps = App\Models\Riders::where('id',$users->rider_id)->pluck('name');
                                        
                    @endphp
                    <tr>
                        <th scope="row">{{$users->id}}</th>
                        <td>@foreach($hps as $hps){{ $hps}}@endforeach</td>
                        <td>{{$users->ref_number}}</td>
                        <td>KES. {{$users->amount}}</td>
                        <td>{{$users->type}}</td>
                        <td>{{$users->status}}</td>
                        <td>{{$users->date}}</td>

                     
                        @if($users->status != 'complete')<td><a class="btn btn-success btn-sm" href="{{route('approvetrans',$users->id)}}">Mark Done</a></td>@endif
                        <td><a class="btn btn-primary btn-sm" href="{{route('editwallettrans',$users->id)}}">Edit</a></td>
                        <td><a href="{{route('deletetrans',$users->id)}}" class="btn btn-danger btn-sm" href="">Delete</a></td>
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