@extends('layouts.home')
@section('content')

<div class="pcoded-content">

<div class="page-header card">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<i class="feather icon-clipboard bg-c-blue"></i>
<div class="d-inline">
<h5>My Packages</h5>



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
<h5>Your Hybrid packages will be listed here</h5>
</div>
<div class="card-block">
<div class="row ui-sortable" id="draggablePanelList">
  
@if($datacount >=1)
@foreach($data as $data)
<div class="col-lg-12 col-xl-3 ui-sortable-handle" style="position: relative; left: 0px; top: 0px;">
<div class="card-sub">
<img class="card-img-top img-fluid" src="../images/default.jpg" alt="image cap">
<div class="card-block">
<h5 class="card-title"></h5>
   
<p class="card-text">Package : {{$data->name}}, Price: KES.  @php
    $hps = App\Models\Hybrid_packages_services::where('package_name',$data->name)->where('user_id',Auth()->user()->id)->sum('fee');
   
   echo $hps;
   
    @endphp   </p>
<a href="{{route('mypackcarbookingcheckout',$data->id)}}" class="btn btn-success">Choose Package</a>
</div>

<div class="card-block accordion-block">
<div id="accordion" role="tablist" aria-multiselectable="true">
<div class="accordion-panel">
<div class="accordion-heading" role="tab" id="headingOne">
<h3 class="card-title accordion-title">
<a class="accordion-msg waves-effect waves-dark scale_active collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
More Details</a>
</h3>
</div>
<div id="collapseOne" class="panel-collapse in collapse" role="tabpanel" aria-labelledby="headingOne" style="">
<div class="accordion-content accordion-desc">

<p>
    
    @php
    $hps = App\Models\Hybrid_packages_services::where('package_name',$data->name)->where('user_id',Auth()->user()->id)->get();
       
    @endphp
    
    @foreach($hps as $hps)
      - {{ $hps->service_name}} <br>
    @endforeach 

 

     
</p>

</div>
</div>
</div>


</div>
</div>



</div>
</div>
@endforeach

@else
                          
        <center><h5 class="">You have no Hybrid packages yet !</h5></center>
  

@endif



<hr>


</div>
</div>
</div>



    <hr>
    <center><h5>Create your package using the form below</h5></center>
    <hr>


<div class="card-block">
<center> @include('inc.messages')</center>

<form  action="{{route('savepackage')}}" method ='POST', enctype ='multipart/form-data'>
    @csrf
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Package Name</label>
        <div class="col-sm-10">
            <input required type="text" required name="packname" class="form-control" placeholder="Package Name">
        </div>
    </div>
    <hr>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Package Services</label>
        <div class="col-sm-10">
                
            @foreach($categoryserv as $categoryserv)
            <input type="Checkbox" name="catservice[]" value="{{$categoryserv->id}}"> {{$categoryserv->service_name}}, Price KES. {{$categoryserv->price}} <hr>
            @endforeach
   
        </div>
    </div>
    
  

    <hr>
  </div>
    <hr>
    <center>
    <button type="submit" class="btn btn-primary">Proceed Now</button>
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