@extends('layouts.home')
@section('content')

<div class="pcoded-content">

        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                        <div class="d-inline">
                        <h5>Choose Package Plan</h5>
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
                        @php
                        $hps = App\Models\Barzars::where('id',$bazarid)->pluck('Barzar_name');
                      
                        @endphp
<h5>Add Package to @foreach($hps as $hps)
                    {{ $hps}} 
                      @endforeach</h5>
</div>
<div class="card-block">
<div class="row ui-sortable" id="draggablePanelList">
    @if($datacount >= 1)
    @foreach($data as $netsuggest)

<div class="col-lg-12 col-xl-3" style="position: relative; left: 0px; top: 0px;">
        <div class="card-sub">
            <img class="card-img-top img-fluid" src="/images/default.jpg" alt="Card image cap">
            <div class="card-block">
            <h5 class="card-title">Name: {{$netsuggest->name}}</h5>
            <p class="card-text">Price: KES. {{$netsuggest->amount}}</p>
            <p class="card-text">Upload upto : {{$netsuggest->number_of_cars}} Cars</p>
            <p class="card-text">Valid period of {{$netsuggest->period}} Month(s)</p>
            
            </div>
          <center><a class="btn btn-success btn-sm" href="{{route('checkoutbazarpack',$netsuggest->id)}}">Choose {{$netsuggest->name}} Plan</a></center>
        <br><hr>
        </div>
   
</div>

@endforeach
@else

<center><h5 class="card-title">Nothing here yet !</h5></center><br><hr>

@endif
<br><br><hr>

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

