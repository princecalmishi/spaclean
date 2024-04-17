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
<h5>Create New Homecare Service <center><a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a></center></h5>

</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class=" breadcrumb breadcrumb-title">
<li class="breadcrumb-item">
<a href="{{route('admin')}}"><i class="feather icon-home"></i></a>
</li>
<li class="breadcrumb-item"><a href="">New Homecare Service</a>
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

<form method="POST" action="{{ route('adminedithomecareservicepost')}}" enctype="multipart/form-data">
            @csrf

            <input type="hidden" value="{{$data->id}}" name="id">
<div class="form-group row">
<label class="col-sm-2 col-form-label">Service Name</label>
<div class="col-sm-10">
<input type="text" value="{{$data->name}}" name="name" class="form-control form-control-round" placeholder=" Name">
</div>
</div>


<div class="form-group row">
<label class="col-sm-2 col-form-label"> Description </label>
<div class="col-sm-10">
<input type="text" name="desc" value="{{$data->desc}}" class="form-control form-control-round" placeholder="Description">
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label"> Price </label>
<div class="col-sm-10">
<input type="number" name="price" value="{{$data->price}}" class="form-control form-control-round" placeholder="Price">
</div>
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