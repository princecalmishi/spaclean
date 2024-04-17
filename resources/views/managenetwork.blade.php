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
<h5>Manage my Network</h5>
</div>
<center> @include('inc.messages')</center>

<div class="card-block">
<div class="row ui-sortable" id="draggablePanelList">
    @if($myconncount >=1)
    @foreach($myconn as $netsuggest)

    @if($netsuggest->sender_id == $id)
                        @php
                            $hps = App\Models\User::where('id',$netsuggest->receiver_id)->pluck('name');
                            $hpsprof = App\Models\Network_Profiles::where('user_id',$netsuggest->receiver_id)->pluck('Profession');
                            $hpsuserid= $netsuggest->receiver_id;

                            $profile = App\Models\Network_Profiles::where('user_id',$netsuggest->receiver_id)->pluck('Profile_image');

                                              
                        @endphp
                    @else
                    @php
                        $hps = App\Models\User::where('id',$netsuggest->sender_id)->pluck('name');
                        $hpsprof = App\Models\Network_Profiles::where('user_id',$netsuggest->sender_id)->pluck('Profession');
                        $hpsuserid= $netsuggest->sender_id;
                        $profile = App\Models\Network_Profiles::where('user_id',$netsuggest->sender_id)->pluck('Profile_image');


                        @endphp
                    @endif

                       
    <div class="col-lg-12 col-xl-3 ui-sortable-handle" style="position: relative; left: 0px; top: 0px;">
    <center>
        <div class="card-sub">
        <img style="height:150px; width:150px;" class="mt-2 card-img-top img-fluid" src="/storage/images/@foreach($profile as $profile){{$profile}}@endforeach" alt="image cap">
            <div class="card-block">               
                  
                <h5 class="card-title">@foreach($hps as $hps){{ $hps}}@endforeach </h5>
                </a>
                <p class="card-text">@foreach($hpsprof as $hpsprof)
                    {{ $hpsprof}} 
                      @endforeach</p>
                      @php
                        $unqid = App\Models\Network_profiles::where('user_id',$hpsuserid)->pluck('unique_id');                        
                        
                    @endphp
                    @foreach($unqid as $unqid)
                        
                      @endforeach
                    
                      <a href="{{route('chat',$unqid)}}" class="btn btn-info btn-sm">Message</a>

                <!-- <a href="{{route('withdraw',$netsuggest->id)}}" class="btn btn-danger btn-sm">Disconnect</a> -->
                <a class="btn btn-success btn-sm ml-3" href="{{route('viewprofile',$hpsuserid)}}">Profile</a>
                 
            </div>
        </div></center>
    </div>

    

@endforeach
<br>
<hr>
<center class="mb-4 mt-5">{{$myconn->links()}}</center>  
                                            <style>
                                                .w-5{
                                                display: none;
                                                }
                                            </style>
@else
<center><h5 class="card-title">Nothing here yet !</h5></center> <hr><br>
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


<!--[if lt IE 10]>
    <div class="ie-warning">
        <h1>Warning!!</h1>
        <p>You are using an outdated version of Internet Explorer, please upgrade
            <br/>to any of the following web browsers to access this website.
        </p>
        <div class="iew-container">
            <ul class="iew-download">
                <li>
                    <a href="http://www.google.com/chrome/">
                        <img src="../files/assets/images/browser/chrome.png" alt="Chrome">
                        <div>Chrome</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.mozilla.org/en-US/firefox/new/">
                        <img src="../files/assets/images/browser/firefox.png" alt="Firefox">
                        <div>Firefox</div>
                    </a>
                </li>
                <li>
                    <a href="http://www.opera.com">
                        <img src="../files/assets/images/browser/opera.png" alt="Opera">
                        <div>Opera</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.apple.com/safari/">
                        <img src="../files/assets/images/browser/safari.png" alt="Safari">
                        <div>Safari</div>
                    </a>
                </li>
                <li>
                    <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                        <img src="../files/assets/images/browser/ie.png" alt="">
                        <div>IE (9 & above)</div>
                    </a>
                </li>
            </ul>
        </div>
        <p>Sorry for the inconvenience!</p>
    </div>
<![endif]-->
@endsection