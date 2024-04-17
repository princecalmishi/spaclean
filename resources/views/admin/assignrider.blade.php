<!-- createnewbranch -->
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
<h5>Assign Rider to Homecare Booking 
<center><a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a></center></h5>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class=" breadcrumb breadcrumb-title">
<li class="breadcrumb-item">
<a href="{{route('admin')}}"><i class="feather icon-home"></i></a>
</li>
<li class="breadcrumb-item"><a href="">Assign Booking</a>
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


<div class="card-block">

<form method="POST" action="{{ route('assignriderpost')}}" enctype="multipart/form-data">
            @csrf
            <input name="id" type="hidden" value="{{$data->id}}">
<div class="form-group row">
<label class="col-sm-2 col-form-label">Bookin Status</label>
<div class="col-sm-10">
<input type="text" value="{{$data->status}}" name="status" class="form-control form-control-round" placeholder=" Status">
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label"> Assign Rider </label>
<div class="col-sm-10">
    <select name="rider" id="" class="form-control form-control-round">
        <option value="{{$data->rider}}">Selected Option {{$data->rider}}</option>
        @foreach($riders as $riders)
        <option value="{{$riders->name}}">{{$riders->name}}</option>
        @endforeach
    </select>
</div>
</div>


<div class="form-group row">
<label class="col-sm-2 col-form-label"> Transport Fee </label>
<div class="col-sm-10">
<input type="text" name="tfee" value="{{$data->transport_fee}}" class="form-control form-control-round" placeholder="Fee">
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label"> Pickup Date | Time </label>
<label for="" class="col-sm-2 col-form-label">Date : {{$data->pickupdate}} Time : {{$data->pickuptime}}</label>
<div class="col-sm-10">
<input type="date" name="date" class="form-control form-control-round"><br>
<input type="time" name="time" class="form-control form-control-round">
</div>
</div>



<center><button class="btn btn-success" type="submit">Submit</button></center>

</div>
</form>



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