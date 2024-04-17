@extends('layouts.admin')
@section('content')


<div class="pcoded-content">

      

<div class="pcoded-inner-content">


<div class="page-header card">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<i class="feather icon-credit-card bg-c-blue"></i>
<div class="d-inline">
<h5>Update Rider Wallet</h5>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class=" breadcrumb breadcrumb-title">
<li class="breadcrumb-item">
<a href="{{route('admin')}}"><i class="feather icon-home"></i></a>
</li>
<li class="breadcrumb-item"><a href="">Update Rider Wallet</a>
</li>

</ul>
</div>
</div>
</div>
</div>

<div class="pcoded-inner-content">

<div class="main-body">
<div class="page-wrapper">

<div class="page-body">


<div class="card">

@foreach($riderReferees as $riderReferees)
<div class="card-block">
<form action="{{ route('updateRiderwallet') }}" method="post"  enctype="multipart/form-data">
    @csrf
  <input type="hidden" value="{{$id}}" name="refereeId">
<div class="form-group row">
<label class="col-sm-2 col-form-label">Rider Name</label>
                    @php
                        $hps = App\Models\Riders::where('id',$riderReferees->id)->pluck('name');
                     @endphp
<div class="col-sm-10">
<input type="text" readonly value="@foreach($hps as $hps){{ $hps}}@endforeach" name="name" class="form-control form-control-round" placeholder="User Name">
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label"> Rider Balance</label>
<div class="col-sm-10">
<input type="number" name="balance" value="{{ $riderReferees->balance }}" class="form-control form-control-round" placeholder="User Email">
</div>
</div>



<center><button class="btn btn-success" type="submit">Submit</button></center>

</div>
</form>
@endforeach
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






@endsection