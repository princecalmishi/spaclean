@extends('layouts.home')
@section('content')

<div class="pcoded-content">

<div class="page-header card">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<i class="feather icon-inbox bg-c-blue"></i>
<div class="d-inline">
<h5>HomeCare Booking Records
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
<h5>HomeCare Booking Records</h5>
</div>
<div class="card-block">
<div class="dt-responsive table-responsive">
    <table id="simpletable" class="table table-striped table-bordered nowrap">
        <thead>
            <tr>
                <th>S/N</th>
                <th>REF</th>
                <th>Item Name</th>
                <th>Size</th>
                <th>Rider</th>
                <th>Image</th>
                <th>Status</th>
                <th>Payment Method</th>
                <th>Amount</th>
                <th>Pickup Date| Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $data)
        <tr>
            <td>{{$data->id}}</td>
            <td>{{$data->ref_number}}</td>
            <td>{{$data->name}}</td>
            <td>{{$data->size}}</td>
            <td>{{$data->rider}}</td>
            <td><img style="height:70px; width:120px;" src="/storage/images/{{$data->image}}" alt="image"> </td>
            <td>{{$data->status}}</td>
            <td>{{$data->payment_method}}</td>
            <td>{{$data->amount}}</td>
            <td>{{$data->pickupdate}}| {{$data->pickuptime}}</td>
        </tr>
        @endforeach

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



@endsection