@extends('layouts.home')
@section('content')

<div class="pcoded-content">

        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                    <i class="feather icon-globe bg-c-blue"></i>
                        <div class="d-inline">
                        <h5>Network Connect</h5>
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

<!-- Network connect -->


<div class="row">
<div class="col-sm-12">

<div class="card">
<div class="card-header">
<h5>Network Connect</h5>
</div>
<center> @include('inc.messages')</center>

<div class="card-block">
<div class="row ui-sortable" id="draggablePanelList">
    @if($datacount >=1)
    @foreach($data as $netsuggest)

    <div class="col-lg-12 col-xl-3 ui-sortable-handle" style="position: relative; left: 0px; top: 0px;">
    <center>

        <div class="card-sub">
        <img style="height:150px; width:150px;" class="card-img-top img-fluid" src="/storage/images/{{$netsuggest->Profile_image}}" alt="Card image cap">
            <div class="card-block">
                @php
                    $hps = App\Models\User::where('id',$netsuggest->user_id)->pluck('name');
                    
                @endphp
                <h5 class="card-title">@foreach($hps as $hps)
                    {{ $hps}} 
                      @endforeach </h5>
                <p class="card-text">{{$netsuggest->Profession}}</p>
                @if($chaeckuserprof >=1)
                <a href="{{route('connect',$netsuggest->user_id)}}" class="btn btn-success">Connect</a>
                @else
                <a href="{{route('myprofile')}}" class="btn btn-danger">Complete profile to connect !</a>

                @endif
            </div>
        </div> </center>
    </div>

   

@endforeach
<br>
<hr>
<center class="mb-4 mt-5">{{$data->links()}}</center>  
                                            <style>
                                                .w-5{
                                                display: none;
                                                }
                                            </style>
@else
<center><h5 class="card-title">No Connections to make at the moment !</h5></center> <hr><br>
@endif

<hr>

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