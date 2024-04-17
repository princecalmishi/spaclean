@extends('layouts.home')
@section('content')

<div class="pcoded-content">

<div class="page-header card">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<i class="feather icon-clipboard bg-c-blue"></i>
<div class="d-inline">
<h5>Create My Car Bazar</h5>



</div>
</div>
</div>

</div>
</div>

<div class="pcoded-inner-content">

<div class="main-body">
<div class="page-wrapper">

<div class="page-body">
<div class="row">
<div class="col-sm-12">

<div class="card">
<div class="card-header">
<h5>Fill in the form to create your Bazar</h5>
</div>
<div class="card-block">
<center> @include('inc.messages')</center>

<form  action="{{route('postbazar')}}" method ='POST', enctype ='multipart/form-data'>
    @csrf
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Bazar Name</label>
        <div class="col-sm-10">
            <input type="text" required name="bazarname" class="form-control" placeholder="Bazar Name">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Bazar Location</label>
            <div class="col-sm-10">
                <input type="text" required name="location" class="form-control" placeholder="Bazar Location">
            </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Bazar Contact</label>
        <div class="col-sm-10">
            <input type="tel" required name="contact" class="form-control" placeholder="Bazar Contact">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Bazar Image : Upload Image File</label>
        <div class="col-sm-10">
        <input name="cover_image" required type="file" class="form-control">
        </div>
    </div>

   
 <center>  <button type="submit" class="btn btn-primary ">Create Now</button></center> 
  

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


<!-- modal here -->



    
@endsection