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
<h5>Update Referee</h5>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class=" breadcrumb breadcrumb-title">
<li class="breadcrumb-item">
<a href="{{route('admin')}}"><i class="feather icon-home"></i></a>
</li>
<li class="breadcrumb-item"><a href="">Update Referee</a>
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

@foreach($riderReferees as $riderReferees)
<div class="card-block">
<form action="{{ route('updateRiderReferee') }}" method="post"  enctype="multipart/form-data">
    @csrf
  <input type="hidden" value="{{$id}}" name="refereeId">
<div class="form-group row">
<label class="col-sm-2 col-form-label"> Name</label>
<div class="col-sm-10">
<input type="text" value="{{ $riderReferees->name }}" name="name" class="form-control form-control-round" placeholder="User Name">
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label"> National ID </label>
<div class="col-sm-10">
<input type="text" name="national_id" value="{{ $riderReferees->national_id }}" class="form-control form-control-round" placeholder="User Email">
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label"> Phone </label>
<div class="col-sm-10">
<input type="text" name="phone" value="{{ $riderReferees->phone }}" class="form-control form-control-round" placeholder="Phone Number">
</div>
</div>


<center><button class="btn btn-success" type="submit">Submit and Create</button></center>

</div>
</form>
@endforeach
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