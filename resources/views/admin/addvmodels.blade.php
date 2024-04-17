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
<h5>Spaclean Car Model</h5>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class=" breadcrumb breadcrumb-title">
<li class="breadcrumb-item">
<a href="{{route('admin')}}"><i class="feather icon-home"></i></a>
</li>
<li class="breadcrumb-item"><a href="">Add New Car Model</a>
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


        
        <form method="POST" action="{{ route('addvmodelpost')}}" enctype="multipart/form-data">
            @csrf
            <input name="id" type="hidden" value="">
            <div class="form-group row">
            <label class="col-sm-2 col-form-label">Make</label>
            <div class="col-sm-10">
            <input type="text" value="" name="make" class="form-control form-control-round" placeholder="Make">
            </div>
            </div>


            <div class="form-group row">
            <label class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
            <input type="text" name="model" value="" class="form-control form-control-round" placeholder="Model Name">
            </div>
            </div>

      
            <center><button class="btn btn-success" type="submit">Submit</button></center>

        </form>










<div id="styleSelector">
</div>
</div>
</div>
</div>
</div>
</div>
</div>




@endsection