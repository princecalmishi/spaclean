@extends('layouts.rider')
@section('content')

<div class="pcoded-content">

<div class="page-header card">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<i class="feather icon-inbox bg-c-blue"></i>
<div class="d-inline">
<h5>My Transactions
</h5>
</div>
</div>
</div>

</div>
</div>

<div class="pcoded-inner-content">

<div class="main-body">
<div class="page-wrapper">

<div class="page-body">
<div class="row">
<div class="col-sm-12">

<div class="card">
<div class="card-header">
<h5>My Transactions</h5>
</div>
<hr>

<div class="row">
<div class="col-xl-4 col-md-12">
<div class="card comp-card">
<div class="card-body">
<div class="row align-items-center">
<div class="col">
<h6 class="m-b-25">Account Balance</h6>
<h3 class="f-w-700 text-c-blue">KES. {{$riderbal}}</h3>
<!-- <p class="m-b-0">May 23 - June 01 (2017)</p> -->
</div>
<div class="col-auto">
<i class="fas fa-eye bg-c-blue"></i>
</div>
</div>
</div>
</div>
</div>


<div class="col-xl-4 col-md-6">
<div class="card comp-card">
<div class="card-body">
<div class="row align-items-center">
<div class="col">
<h6 class="m-b-25">Request Payment</h6>
<h5 class="f-w-700 text-c-green"><a class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal" href="">Payment to Mpesa</a></h5>
</div>
<div class="col-auto">
<i class="fas fa-bullseye bg-c-green"></i>
</div>
</div>
</div>
</div>
</div>


<div class="card-block">
<div class="dt-responsive table-responsive">
    <table id="simpletable" class="table table-striped table-bordered nowrap">
        <thead>
            <tr>
                <th>S/N</th>
                <th>REF</th>
                <th>Amount</th>
                <th>Type</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @if($datacount >= 1)
                @foreach($data as $data)
                <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->ref_number}}</td>
                    <td>KES. {{$data->amount}}</td>
                    <td>{{$data->type}}</td>
                    <td>{{$data->status}}</td>
                    <td>{{$data->date}}</td>
                </tr>
                @endforeach
            @else
            <tr>
            <center><td class="row">No data here yet !</td></center>

            </tr>
            
            @endif

        </tfoot>
    </table>
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
</div>
</div>


<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">WITHDRAW MONEY TO MPESA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('debitnow')}}" method="post">
            @csrf
            <input type="hidden" value="{{$riderid}}" name="id">
            <label for="">Amount</label>
        <input type="number" name="amount" value="" max="{{$riderbal}}" class="form-control" placeholder="Amount"><br>
        <label for="">MPESA Phone</label>
        <input type="phone" name="phone" class="form-control" placeholder="Phone Number">

        <div class="modal-footer">
        <button type="submit" class="btn btn-primary">WITHDRAW NOW</button>
      </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
@endsection