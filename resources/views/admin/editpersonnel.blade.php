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
<h5>Edit Car Wash Personnel</h5>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class=" breadcrumb breadcrumb-title">
<li class="breadcrumb-item">
<a href="{{route('admin')}}"><i class="feather icon-home"></i></a>
</li>
<li class="breadcrumb-item"><a href="">Edit Car Wash Personnel</a>
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

<form method="POST" action="{{ route('updatepersonnel')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{$data->id}}" name="id">
<div class="form-group row">
<label class="col-sm-2 col-form-label">Personnel Name</label>
<div class="col-sm-10">
<input type="text" value="{{$data->name}}" name="name" class="form-control form-control-round" placeholder=" Name">
</div>
</div>


<div class="form-group row">
<label class="col-sm-2 col-form-label"> Car Wash </label>
<div class="col-sm-10">
                    @php
                    $personel = App\Models\Car_Wash::where('id',$data->carwash)->pluck('name');                                        
                    $personelrole = App\Models\Car_Wash::where('id',$data->carwash)->pluck('name');                                        
                    @endphp
<select class="form-control form-control-round" name="carwash" id="">
        <option selected disabled>Selected Option @foreach($personel as $personel){{ $personel}}@endforeach</option>
        @foreach($carwash as $carwash)
        <option value="{{$carwash->id}}">{{$carwash->name}}</option>
        @endforeach
    </select></div>
</div>



<div class="form-group row">
<label class="col-sm-2 col-form-label"> Role </label>
<div class="col-sm-10">
    <select  class="form-control form-control-round" name="role" id="">
        <option selected disabled>Select Option {{$data->role}}</option>
        @foreach($roles as $roles)
        <option value="{{$roles->Name}}">{{$roles->Name}}</option>
        @endforeach
    </select>
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