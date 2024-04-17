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
<h5>Update Bazar Package</h5>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class=" breadcrumb breadcrumb-title">
<li class="breadcrumb-item">
<a href="{{route('admin')}}"><i class="feather icon-home"></i></a>
</li>
<li class="breadcrumb-item"><a href="">Update Bazar Package</a>
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

<div class="card-block">

<form method="POST" action="{{ route('editbazarpackagepost') }}" enctype="multipart/form-data">
        @csrf
       
        <input type="hidden" value="{{ $package->id }}" name="id">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $package->name }}" required>
        </div>

        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" value="{{ $package->amount }}" required>
        </div>

        <div class="form-group">
            <label for="number_of_cars">Number of Cars</label>
            <input type="number" class="form-control" id="number_of_cars" name="number_of_cars" value="{{ $package->number_of_cars }}" required>
        </div>

        <div class="form-group">
            <label for="period">Period</label>
            <input type="number" class="form-control" id="period" name="period" value="{{ $package->period }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Package</button>
    </form>



</div>
</form>


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