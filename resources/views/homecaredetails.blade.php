@extends('layouts.home')
@section('content')





<div class="pcoded-content">

<div class="page-header card">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<i class="feather icon-watch bg-c-blue"></i>
<div class="d-inline">
<h5>Home Care Details</h5>
<!-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> -->
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

@foreach($data as $data)
<center>   
<div class="card-header">
  <img style="height: 20%; width:50%;" src="../images/lion.jpeg" alt=""> <br><br>
<h5>Service Name: {{$data->name}}  -  KSH {{$data->price}}</h5>
<div class="card-header-right">
<ul class="list-unstyled card-option">
<li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
<li><i class="feather icon-maximize full-card"></i></li>
<li><i class="feather icon-minus minimize-card"></i></li>
<li><i class="feather icon-refresh-cw reload-card"></i></li>
<li><i class="feather icon-trash close-card"></i></li> <li><i class="feather icon-chevron-left open-card-option"></i></li>
</ul>
</div>
</div>
<div class="card-block">
<p>{{$data->desc}}
</p>
</div>
<hr>
<a class="btn btn-success" href="{{route('bookhomecare',$data->id)}}">Book Now</a>
<hr>
</div>


@endforeach
</center>   
</div>
</div>

</div>
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


@endsection