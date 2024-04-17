@extends('layouts.home')
@section('content')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<div class="pcoded-content">

<div class="page-header card">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<i class="feather icon-clipboard bg-c-blue"></i>
<div class="d-inline">
<h5>Contact Us </h5>



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
<h5>Fill in the form to contact</h5>
<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
</div>


<div class="card-block">
<center> @include('inc.messages')</center>

<form  action="{{route('postcontact')}}" method ='POST', enctype ='multipart/form-data'>
    @csrf
    <div class="form-group row">     

        <div class="form-group row">
        <label class="col-sm-2 col-form-label">Email Address</label>
        <div class="col-sm-10">
            <input type="email" required name="email" class="form-control" placeholder="Enter Contact Email Address">
        </div>
    </div>

    <div class="form-group row">     

        <div class="form-group row">
        <label class="col-sm-2 col-form-label">Subject</label>
        <div class="col-sm-10">
            <input type="text" required name="subject" class="form-control" placeholder="Enter Message Subject">
        </div>
    </div>

    <div class="form-group row">     

        <div class="form-group row">
        <label class="col-sm-2 col-form-label">Message</label>
        <div class="col-sm-10">
            <textarea class="form-control" name="message" required id="" cols="30" rows="10" placeholder="Type your message here...."></textarea>
        </div>
    </div>
     
     
    </div>

    <hr>
    <center>
    <button type="submit" class="btn btn-primary">Send Message Now</button>
    </center>
    <hr>
       

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