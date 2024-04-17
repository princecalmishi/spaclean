@extends('layouts.home')
@section('content')

<div class="pcoded-content">

        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                        <div class="d-inline">
                        <h5>My Car Barzar</h5>
                        <!-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> -->
                        </div>
                    </div>
                </div>
            <div class="col-lg-4">
           
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
<h5>Below are your Car Barzars</h5>
</div>      <center> @include('inc.messages')</center>

<div class="card-block">
<div class="row ui-sortable" id="draggablePanelList">
    @if($datacount >= 1)
    @foreach($data as $netsuggest)

<div class="col-lg-12 col-xl-3" style="position: relative; left: 0px; top: 0px;">
        <div class="card-sub">
            <img class="card-img-top img-fluid" src="images/default.jpg" alt="Card image cap">
            <div class="card-block">
            <h5 class="card-title">{{$netsuggest->Barzar_name}} </h5>
            <p class="card-text">{{$netsuggest->location}}</p>
            <p class="card-text">{{$netsuggest->contact}}</p>
            <p>Status : {{$netsuggest->status}}</p>
            </div>
            <div class="row">
                @if($netsuggest->status == 'Approved')
            <center> <a class="btn btn-success btn-sm" href="{{route('bazardetails',$netsuggest->id)}}">Details</a></center>
             <hr>
            @endif
            <center><a  onclick="clicked(event)" class="btn btn-danger btn-sm" href="{{route('deletebazar',$netsuggest->id)}}">Delete</a></center>
            </div>
            <br>
            <script>
function clicked(e)
{
    if(!confirm('Are you sure?')) {
        e.preventDefault();
    }
}
</script>
        </div>
</div>

@endforeach
@else

<center><h5 class="card-title">Nothing here yet !</h5></center><br><hr>

@endif
<br><br><hr>
    <center><a class="btn btn-primary" href="{{route('createbazar')}}">Register New Car Bazar</a></center>

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

