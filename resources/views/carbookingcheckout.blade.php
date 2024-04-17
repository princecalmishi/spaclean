@extends('layouts.home')
@section('content')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<div class="pcoded-content">

<div class="page-header card">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<i class="feather icon-clipboard bg-c-blue"></i>
<div class="d-inline">
<h5>Car Booking Details & Checkout</h5>



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
<h5>Fill in the form to book the service</h5>
<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
</div>


<div class="card-block">
<center> @include('inc.messages')</center>

<form  action="{{route('carbookingreq')}}" method ='POST', enctype ='multipart/form-data'>
    @csrf
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Confirm Car Selection</label>

        <input type="hidden" value="{{$bookidname}}" name="package">
        <input type="hidden" value="Predefined" name="package_type">
        <div class="col-sm-10">
            <select required class="form-control" name="carselection" id="sourceSelect" >
            <option selected disabled>Select Car Version</option>
            <option value="{{$bookiddatacarselect1}}"> Salon | KES. {{$bookiddatacarselect1}}</option>
            <option value="{{$bookiddatacarselect2}}"> SUV | KES. {{$bookiddatacarselect2}}</option>
              
            </select>
        </div>
    </div>

    <!-- Your Blade view -->


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#sourceSelect').change(function() {
            // Get the selected value
            var selectedValue = $(this).val();

            // Set the value in the target input field
            $('#totalamount').val(selectedValue);
        });
    });
</script>




    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Select Car Wash</label>
            <div class="col-sm-6">   
            <select id="carWashSelect" name="carWashSelect" class="form-control">
                        <option selected disabled>Select Car Wash</option>
                    @foreach ($carwash as $carWash)
                        <option value="{{ $carWash->id }}">{{ $carWash->name }}</option>
                    @endforeach
            </select>
            </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Select Preffered Personel</label>
            <div class="col-sm-6"> 
                <select id="personnelSelect" name="personnelSelect" class="form-control"></select>
                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            </div> 
    </div> 

    <script>
        $(document).ready(function() {
            $('#carWashSelect').change(function() {
                var carWashId = $(this).val();

                $.ajax({
                    type: 'GET',
                    url: '{{route('getPersonnel')}}',
                    data: {
                        carWashId: carWashId
                    },
                    success: function(data) {
                        var personnelSelect = $('#personnelSelect');
                        personnelSelect.empty();

                        $.each(data, function(index, personnel) {
                            personnelSelect.append('<option value="' + personnel.id + '">' + personnel.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
  

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Schedule Pick-Up</label>
        <div class="col-sm-4">
            <input type="date" required name="pickupdate" class="form-control" placeholder="">
        </div>
        <div class="col-sm-4">
            <input type="time" required name="pickuptime" class="form-control" placeholder="">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Select Payment Method</label>
        <div class="col-sm-6">
            <select required name="paymethod" id="paymethod" class="form-control">
            <option selected disabled>Select Payment Method</option>
            <option value="Mpesa">MPESA</option>
            <option value="Cash">Cash</option>
               
            </select>
        </div>        
    </div>
    <hr>
    <strong><h4 class="sub-title">Payment Details</h4></strong>

    <input required type="hidden" value="" name="checkoutprice">

    <div class="card-block">
    <h5 class="ml-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Amount</h5>
    <h5>Subtotal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KSH: <input readonly id="totalamount" type="text" name="totalamount"></h5>
    <hr>    
    </div>
    <hr>



    <hr>
    <center>
    <button type="submit" class="btn btn-primary btn-lg">Checkout Now</button>
    </center>
    <hr>
       

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


<!-- modal here -->



    
@endsection