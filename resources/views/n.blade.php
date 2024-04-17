<div class="pcoded-content">

<div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                    <i class="feather icon-globe bg-c-blue"></i>
                        <div class="d-inline">
                        <h5>My Invitations</h5>
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
<h5>My Invitations</h5>
</div><br>
<center> @include('inc.messages')</center>

<div class="card-block">
<div class="row ui-sortable" id="draggablePanelList">
  


<div class="row">
<div class="col-lg-12 col-xl-12">
<!-- <div class="sub-title">Default</div> -->

<ul class="nav nav-tabs  tabs" role="tablist">
<li class="nav-item">
<a class="nav-link active" data-toggle="tab" href="#home1" role="tab" aria-selected="true">RECEIVED</a>
</li>

<li class="nav-item">
<a class="nav-link" data-toggle="tab" href="#settings1" role="tab" aria-selected="false">SENT</a>
</li>
</ul>

<div class="tab-content tabs card-block">
<div class="tab-pane active" id="home1" role="tabpanel"><hr>
<!-- <p class="m-0">1. This is Photoshop's version of Lorem IpThis is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean mas Cum sociis natoque penatibus et magnis dis.....</p> -->
@if($reveivedinvitecount >=1)
    @foreach($reveivedinvite as $netsuggest)

    <div class="col-lg-12 col-xl-3 ui-sortable-handle" style="position: relative; left: 0px; top: 0px;">
        <div class="card-sub">
        <img class="card-img-top img-fluid" src="../userprofile/{{$netsuggest->Profile_image}}" alt="Card image cap">
            <div class="card-block">
                
                        @php
                            $hps = App\Models\User::where('id',$netsuggest->receiver_id)->pluck('name');
                                                                      
                        @endphp
                  
                   
                <h5 class="card-title">@foreach($hps as $hps)
                    {{ $hps}} 
                      @endforeach </h5>
                <p class="card-text">{{$netsuggest->Profession}}</p>
                <a href="{{route('withdraw',$netsuggest->id)}}" class="btn btn-success">Widthdraw</a>
            </div>
        </div>
    </div>

    

        @endforeach
        <br>
        <hr>
        <center class="mb-4 mt-5">{{$reveivedinvite->links()}}</center>  
                                                    <style>
                                                        .w-5{
                                                        display: none;
                                                        }
                                                    </style>
        @else
        <center><h5 class="card-title">Nothing here yet !</h5></center> <hr><br>
        @endif

</div>



<div class="tab-pane" id="settings1" role="tabpanel"><hr><br>
<!-- <p class="m-0">4.Cras consequat in enim ut efficitur. Nulla posuere elit quis auctor interdum praesent sit amet nulla vel enim amet. Donec convallis tellus neque, et imperdiet felis amet.</p> -->
@if($sentinvitecount >=1)
    @foreach($sentinvite as $netsuggest)

    <div class="col-lg-12 col-xl-3 ui-sortable-handle" style="position: relative; left: 0px; top: 0px;">
        <div class="card-sub">
        <img class="card-img-top img-fluid" src="../userprofile/{{$netsuggest->Profile_image}}" alt="Card image cap">
            <div class="card-block">
                
                        @php
                            $hps = App\Models\User::where('id',$netsuggest->receiver_id)->pluck('name');
                                                                      
                        @endphp
                  
                   
                <h5 class="card-title">@foreach($hps as $hps)
                    {{ $hps}} 
                      @endforeach </h5>
                <p class="card-text">{{$netsuggest->Profession}}</p>
                <a href="{{route('withdraw',$netsuggest->id)}}" class="btn btn-success">Widthdraw</a>
            </div>
        </div>
    </div>

    

        @endforeach
        <br>
        <hr>
        <center class="mb-4 mt-5">{{$sentinvite->links()}}</center>  
                                                    <style>
                                                        .w-5{
                                                        display: none;
                                                        }
                                                    </style>
        @else
        <center><h5 class="card-title">Nothing here yet !</h5></center> <hr><br>
        @endif

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

