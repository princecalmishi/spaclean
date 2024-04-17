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
<h5>Update Bazar</h5>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class=" breadcrumb breadcrumb-title">
<li class="breadcrumb-item">
<a href="{{route('admin')}}"><i class="feather icon-home"></i></a>
</li>
<li class="breadcrumb-item"><a href="">Update Bazar</a>
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

<form method="POST" action="{{ route('bazarupdate')}}" enctype="multipart/form-data">
            @csrf
<input type="hidden" value="{{ $riderReferees->id }}" name="refereeId">
<div class="form-group row">
<label class="col-sm-2 col-form-label">Bazar Name</label>
<div class="col-sm-10">
<input type="text" value="{{ $riderReferees->Barzar_name }}" name="Barzar_name" class="form-control form-control-round" placeholder=" Name">
</div>
</div>
@php
                    $hps = App\Models\User::where('id',$riderReferees->Barzar_owner)->pluck('name');
                                        
                    @endphp
<div class="form-group row">
<label class="col-sm-2 col-form-label"> Bazar Owner </label>
<div class="col-sm-10">
<input type="text" readonly name="Barzar_owner" value="@foreach($hps as $hps){{ $hps}}@endforeach" class="form-control form-control-round" placeholder="Owner">
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label"> Location </label>
<div class="col-sm-10">
<input type="text" name="location" value="{{ $riderReferees->location }}" class="form-control form-control-round" placeholder="Location">
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label"> Contact </label>
<div class="col-sm-10">
<input type="text" name="contact" value="{{ $riderReferees->contact }}" class="form-control form-control-round" placeholder="Contact">
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label"> Status </label>
<div class="col-sm-10">
               
<input type="text" name="status" value="{{ $riderReferees->status }}" class="form-control form-control-round" placeholder="Status">
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label"> Image </label>
<div class="col-sm-10">
<input type="file" name="image"  class="form-control form-control-round" >
</div>
<br><hr>


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