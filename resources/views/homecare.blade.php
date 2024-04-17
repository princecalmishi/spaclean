@extends('layouts.home')
@section('content')

<div class="pcoded-content">

        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                    <i class="feather icon-menu bg-c-blue"></i>
                     <div class="d-inline">
                        <h5>Home Care Services</h5>
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
<h5>Select a Home Care Service</h5>
</div>
<div class="card-block">
<div class="row ui-sortable" id="draggablePanelList">
    @foreach($data as $netsuggest)

<div class="col-lg-12 col-xl-3 ui-sortable-handle" style="position: relative; left: 0px; top: 0px;">
<div class="card-sub">
<img class="card-img-top img-fluid" src="../images/lion.jpeg" alt="image cap">
<div class="card-block">
<h5 class="card-title">{{$netsuggest->name}}</h5>
<p class="card-text">{{$netsuggest->Profession}}</p>
<a href="{{route('homecaredetails',$netsuggest->id)}}" class="btn btn-success">More Details</a>
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