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
<h5>Create New Car Wash Branch</h5>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class=" breadcrumb breadcrumb-title">
<li class="breadcrumb-item">
<a href="{{route('admin')}}"><i class="feather icon-home"></i></a>
</li>
<li class="breadcrumb-item"><a href="">Create New Car Wash Branch</a>
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

<form method="POST" action="{{ route('createnewbranchpost')}}" enctype="multipart/form-data">
            @csrf
<div class="form-group row">
<label class="col-sm-2 col-form-label">Branch Name</label>
<div class="col-sm-10">
<input type="text" value="" name="branch_name" class="form-control form-control-round" placeholder=" Name">
</div>
</div>


<div class="form-group row">
<label class="col-sm-2 col-form-label"> Location </label>
<div class="col-sm-10">
<input type="text" name="location" value="" class="form-control form-control-round" placeholder="Location">
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label"> Contact </label>
<div class="col-sm-10">
<input type="phone" name="contact" value="" class="form-control form-control-round" placeholder="Contact">
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