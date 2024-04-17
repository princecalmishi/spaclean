@extends('layouts.home')
@section('content')

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
</div>
<center> @include('inc.messages')</center>

        <div class="col-lg-12 col-xl-12">

        <ul class="nav nav-tabs  tabs" role="tablist">
        <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#received" role="tab" aria-selected="true">RECEIVED</a>
        </li>
      
        <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#sent" role="tab" aria-selected="false">SENT</a>
        </li>
        </ul>

        <div class="tab-content tabs card-block">
            <div class="tab-pane active" id="received" role="tabpanel">
            @if($reveivedinvitecount >=1)
                        @foreach($reveivedinvite as $netsuggest)
                                    @php
                                        $hps = App\Models\User::where('id',$netsuggest->sender_id)->pluck('name');
                                        $hpsprof = App\Models\Network_Profiles::where('user_id',$netsuggest->sender_id)->pluck('Profession');
                                        $hpsprofile = App\Models\Network_Profiles::where('user_id',$netsuggest->sender_id)->pluck('Profile_image');
                                        $hpsprofile2 = App\Models\Network_Profiles::where('user_id',$netsuggest->sender_id)->pluck('Profile_image');

                                    @endphp

                        <div class="col-lg-12 col-xl-3 ui-sortable-handle" style="position: relative; left: 0px; top: 0px;">
                            <div class="card-sub">
                            <img style="height:150px; width:150px;" class="card-img-top img-fluid" src="/storage/images/@foreach($hpsprofile as $hpsprofile){{$hpsprofile}}@endforeach" alt="image cap">
                                <div class="card-block">
                                   
                                    <h5 class="card-title">@foreach($hps as $hps)
                                        {{ $hps}} 
                                        @endforeach </h5>
                                    <p class="card-text">@foreach($hpsprof as $hpsprof)
                                        {{ $hpsprof}} 
                                        @endforeach </p>
                                        @if($netsuggest->status == 'Pending')
                                    <a href="{{route('decline',$netsuggest->id)}}" class="btn btn-danger">Decline</a>
                                    <a href="{{route('accept',$netsuggest->id)}}" class="btn btn-primary">Accept</a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        

                    @endforeach
                   
                    
                    <center class="mb-4 mt-5">{{$reveivedinvite->links()}}</center>  
                                                                <style>
                                                                    .w-5{
                                                                    display: none;
                                                                    }
                                                                </style>
                    @else
                    <center><h5 class="card-title">No Connections to make at the moment !</h5></center> <hr><br>
                    @endif
            </div>
            <div class="tab-pane" id="sent" role="tabpanel">
                @if($sentinvitecount >=1)
                        @foreach($sentinvite as $netsuggest)
                        @php
                                    $hps = App\Models\User::where('id',$netsuggest->receiver_id)->pluck('name');
                                    $hpsprof = App\Models\Network_Profiles::where('user_id',$netsuggest->receiver_id)->pluck('Profession');
                                    $hpsprofile2 = App\Models\Network_Profiles::where('user_id',$netsuggest->sender_id)->pluck('Profile_image');

                                    @endphp
                        <div class="col-lg-12 col-xl-3 ui-sortable-handle" style="position: relative; left: 0px; top: 0px;">
                            <div class="card-sub">
                            <img style="height:150px; width:150px;" class="card-img-top img-fluid" src="/storage/images/@foreach($hpsprofile2 as $hpsprofile){{$hpsprofile}}@endforeach" alt="Card image cap">
                                <div class="card-block">
                                   
                                    <h5 class="card-title">
                                        @foreach($hps as $hps) {{ $hps}} @endforeach </h5>
                                    <p class="card-text">@foreach($hpsprof as $hpsprof)
                                        {{ $hpsprof}} 
                                        @endforeach</p>
                                    <a href="{{route('withdraw',$netsuggest->id)}}" class="btn btn-danger btn-sm">Withdraw</a>
                                </div>
                            </div>
                        </div>

                        
                           <br>                                         
                    @endforeach
                  
                    <center class="mb-4 mt-5">{{$reveivedinvite->links()}}</center>  
                                                                <style>
                                                                    .w-5{
                                                                    display: none;
                                                                    }
                                                                </style>
                    @else
                    <center><h5 class="card-title">No Connections to make at the moment !</h5></center> <hr><br>
                    @endif                                                   
            </div>
        
        </div>
        </div>

            

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