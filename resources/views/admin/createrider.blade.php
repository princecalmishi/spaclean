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
<h5>Add Rider</h5>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class=" breadcrumb breadcrumb-title">
<li class="breadcrumb-item">
<a href="{{route('admin')}}"><i class="feather icon-home"></i></a>
</li>
<li class="breadcrumb-item"><a href="">Add Rider</a>
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

<form action="{{ route('addrider') }}" method="post"  enctype="multipart/form-data">
    @csrf


<div class="form-group row">
<label class="col-sm-2 col-form-label"> Name</label>
<div class="col-sm-10">
<input type="text" name="name" class="form-control form-control-round" placeholder="User Name">
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label"> Email </label>
<div class="col-sm-10">
<input type="text" name="email" class="form-control form-control-round" placeholder="User Email">
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label"> Phone </label>
<div class="col-sm-10">
<input type="text" name="phone" class="form-control form-control-round" placeholder="Phone Number">
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label"> National ID </label>
<div class="col-sm-10">
<input type="number" name="national_id" class="form-control form-control-round" placeholder="National ID">
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label"> Town </label>
<div class="col-sm-10">
<input type="text" name="town" class="form-control form-control-round" placeholder="Town">
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label"> Plate Number </label>
<div class="col-sm-10">
<input type="text" name="plate_number" class="form-control form-control-round" placeholder="Plate Number">
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label"> Color </label>
<div class="col-sm-10">
<input type="text" name="color" class="form-control form-control-round" placeholder="Color">
</div>
</div>


<div class="form-group row">
<label class="col-sm-2 col-form-label"> Rare Image </label>
<div class="col-sm-10">
<input type="file" name="rare_image" class="form-control form-control-round">
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label"> Front Image </label>
<div class="col-sm-10">
<input type="file" name="front_image" class="form-control form-control-round">
</div>
</div>


<div class="form-group row">
<label class="col-sm-2 col-form-label"> Good Conduct </label>
<div class="col-sm-10">
<input type="file" name="good_conduct" class="form-control form-control-round" placeholder="Phone Number">
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label"> Insurance </label>
<div class="col-sm-10">
<input type="file" name="insurance" class="form-control form-control-round" placeholder="Phone Number">
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label"> License </label>
<div class="col-sm-10">
<input type="file" name="license" class="form-control form-control-round" placeholder="Phone Number">
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label">Password </label>
<div class="col-sm-10">
<input type="password" name="password" class="form-control form-control-round" placeholder="Passwords">
</div>
</div>
<center><button class="btn btn-success" type="submit">Submit and Create</button></center>

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