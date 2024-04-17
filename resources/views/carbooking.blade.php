@extends('layouts.home')
@section('content')

<div class="pcoded-content">

        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                        <div class="d-inline">
                        <h5>Car Booking</h5>
                        <!-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> -->
                        </div>
                    </div>
                </div>
            <div class="col-lg-4">
            <!-- <div class="page-header-breadcrumb">
            <ul class=" breadcrumb breadcrumb-title">
            <li class="breadcrumb-item">
            <a href="../index.html"><i class="feather icon-home"></i></a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Dashboard CRM</a> </li>
            </ul>
            </div> -->
        </div>
    </div>
</div>

<div class="pcoded-inner-content">
<div class="main-body">
<div class="page-wrapper">
<div class="page-body">

<div class="row">
   

<!-- Network connect -->


<div class="row">
<div class="col-sm-12">

<div class="card">
<div class="card-header">
<h5>Car Wash Packages</h5>
</div>
<div class="card-block">
<div class="row ui-sortable" id="draggablePanelList">

    <div class="col-lg-12 col-xl-3 ui-sortable-handle" style="position: relative; left: 0px; top: 0px;">
        <div class="card-sub">
            <div class="card-block">
                <img style="width:150px;" src="../images/default.jpg" alt="">
            <h5 class="card-title">Hybrid Plan</h5>
            <p class="card-text"> Price : KES. 0.00</p>
            <a href="{{route('mypackages')}}" class="btn btn-primary">Create your Package</a>
            </div>
        </div>
    </div>

    @foreach($data as $netsuggest)

<div class="col-lg-12 col-xl-3 ui-sortable-handle" style="position: relative; left: 0px; top: 0px;">
<div class="card-sub">
<div class="card-block">
    <img style="width:150px;" src="../images/default.jpg" alt="">
<h5 class="card-title">Plan Name: {{$netsuggest->name}}</h5>
<p class="card-text"> Price : KES. {{$netsuggest->saloon_price}}</p>
<a href="{{route('carbookingcheckout',$netsuggest->id)}}" class="btn btn-danger">Choose Package</a>
</div>


       

<!-- details accordion -->

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
    $hps = App\Models\Category_services::where('service_category',$netsuggest->name)->get();
       
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

<hr>
    <!-- <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
            <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav> -->

</div>
</div>
</div>

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

