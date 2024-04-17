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
<h5>Edit Car Wash</h5>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class=" breadcrumb breadcrumb-title">
<li class="breadcrumb-item">
<a href="{{route('admin')}}"><i class="feather icon-home"></i></a>
</li>
<li class="breadcrumb-item"><a href="">Edit Car Wash</a>
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

<form method="POST" action="{{ route('admineditcarwashpost')}}" enctype="multipart/form-data">
            @csrf

<div class="form-group row">
<label class="col-sm-2 col-form-label">CarWash Name</label>
<div class="col-sm-10">
<input type="text" value="{{$carwash->name}}" name="name" class="form-control form-control-round" placeholder=" Name">
<input type="hidden" value="{{$carwash->id}}" name="id" class="form-control form-control-round">
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label">Location</label>
<div class="col-sm-10">
<input type="text" value="{{$carwash->location}}" name="location" class="form-control form-control-round" placeholder=" Location">
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label">Contact</label>
<div class="col-sm-10">
<input type="tel" value="{{$carwash->contact}}" name="contact" class="form-control form-control-round" placeholder=" Contact">
</div>
</div>

<script>
function getCurrentLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}

function showPosition(position) {
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;

    // Set the input fields with latitude and longitude values
    document.getElementById("latitude").value = latitude;
    document.getElementById("longitude").value = longitude;
}
</script>

<div class="form-group row">
<label class="col-sm-2 col-form-label"> Precise Location </label>
<div class="col-sm-5">
<input type="text" readonly required value="{{$carwash->latitude}}" name="latitude" id="latitude" value="" class="form-control form-control-round">
</div>
<div class="col-sm-5">
<input type="text" required readonly value="{{$carwash->longitude}}" name="longitude" id="longitude" value="" class="form-control form-control-round">
</div>
<center> <button type="button" style="width:200px;" class="btn btn-primary btn-sm mt-2" onclick="getCurrentLocation()">Get Current Location</button></center>

</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label"> Image </label>
<div class="col-sm-10">
<input type="file" name="image" value="" class="form-control form-control-round">
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