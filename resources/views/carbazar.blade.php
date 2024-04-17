@extends('layouts.home')
@section('content')

<div class="pcoded-content">

        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                        <div class="d-inline">
                        <h5>Car Barzar</h5>
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
   



<div class="row">
<div class="col-sm-12">

<div class="card">
<div class="card-header">
<h5>Below are the Approved Car Barzars</h5>
</div>
<div class="card-block">
<div class="row ui-sortable" id="draggablePanelList">
    @foreach($data as $netsuggest)

<div class="col-lg-12 col-xl-3" style="position: relative; left: 0px; top: 0px;">
<center>
<a href="{{route('carbazarlist',$netsuggest->id)}}">
        <div class="card-sub">
            <img style="height:150px; width:150px;" class="card-img-top img-fluid mt-2" src="/storage/images/{{$netsuggest->image}}" alt="Card image cap">
            <div class="card-block">
            <h5 class="card-title">{{$netsuggest->Barzar_name}}</h5>
            <p class="card-text">{{$netsuggest->location}}</p>
            <p class="card-text">{{$netsuggest->contact}}</p>
            </div>
            <a href="{{route('carbazarlist',$netsuggest->id)}}""></a>
        </div>
    </a></center>
</div>

@endforeach

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

