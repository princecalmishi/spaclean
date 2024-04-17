@extends('layouts.home')
@section('content')

<div class="pcoded-content">

<div class="page-header card">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<i class="feather icon-clipboard bg-c-blue"></i>
<div class="d-inline">
<h5>Booking Details & Checkout</h5>

<script>
function getCurrentLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}

function showPosition(position) {
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;

    // Set the input fields with latitude and longitude values
    document.getElementById("mylatitude").value = latitude;
    document.getElementById("mylongitude").value = longitude;
}
</script>


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




<form  action="{{route('createhomeservice')}}" method ='POST', enctype ='multipart/form-data'>
    @csrf
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Item Details</label>
        <div class="col-sm-10">
            <input type="text" required name="item_name" class="form-control" placeholder="Item Name">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Item Color</label>
            <div class="col-sm-10">
                <input type="text" required name="itemcolour" class="form-control" placeholder="Item Color">
            </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Item Size</label>
        <div class="col-sm-10">
            <input type="text" required name="itemsize" class="form-control" placeholder="Item Size">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Upload Image File</label>
        <div class="col-sm-10">
        <input name="cover_image" required type="file" class="form-control">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Schedule Pick-Up</label>
        <div class="col-sm-4">
            <input type="date" required name="pickupdate" class="form-control" placeholder="">
        </div>
        <div class="col-sm-4">
            <input type="time" required name="pickuptime" class="form-control" placeholder="">
        </div>
    </div>
    <strong><h4 class="sub-title">Contact Person Details</h4></strong>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" required name="contact_name" class="form-control" placeholder="Name">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Phone Number</label>
        <div class="col-sm-10">
            <input type="phone" required name="contact_phone" class="form-control" placeholder="Phone Number">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Select Car Wash</label>
            <div class="col-sm-6">   
            <select id="carWashSelect" name="carWashSelect" class="form-control">
                        <option selected disabled>Select Car Wash</option>
                    @foreach ($carwash as $carWash)
                        <option value="{{ $carWash->id }}" data-lat="{{ $carWash->latitude }}" data-lng="{{ $carWash->longitude }}">{{ $carWash->name }}</option>
                    @endforeach
            </select>
            </div>
    </div>

  

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#carWashSelect').change(function() {
            var selectedOption = $(this).find(':selected');
            var latitude = selectedOption.data('lat');
            var longitude = selectedOption.data('lng');
            $('#latitudeInput').val(latitude);
            $('#longitudeInput').val(longitude);
        });
    });
</script>

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


    <!-- <div class="form-group row">
        <label class="col-sm-2 col-form-label">Enter Pick-Up Location</label>
        <div class="col-sm-5">
            <input readonly type="text" required id="mylatitude" name="mylatitude" class="form-control" placeholder="Latitude">
        </div>
        <div class="col-sm-5">
            <input readonly type="text" id="mylongitude" required name="mylongitude" class="form-control mt-2" placeholder="Logitude">
        </div>       
        <center> <button type="button" style="width:200px;" class="btn btn-primary btn-sm mt-2" onclick="getCurrentLocation()">Get Current Location</button></center>

    </div> -->


    <input type="hidden" id="latitudeInput" class="form-control" readonly><br>
    <input type="hidden" id="longitudeInput" class="form-control" readonly><br>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Enter Pick-Up Location</label>
        <div class="col-sm-5">
            <input type="text" readonly required id="mylatitude" name="mylatitude" class="form-control" placeholder="Latitude">
        </div>
        <div class="col-sm-5">
            <input type="text" readonly id="mylongitude" required name="mylongitude" class="form-control mt-2" placeholder="Longitude">
        </div>       
        <center> <button type="button" style="width:200px;" class="btn btn-primary btn-sm mt-2" onclick="getCurrentLocation()">Get Current Location</button></center>
    </div>

    <input type="hidden" id="distanceInput" class="form-control" readonly>
    <input type="hidden" value={{$dataamounttotal}} class="form-control" readonly>


    <script>
        function getCurrentLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        function successCallback(position) {
            document.getElementById('mylatitude').value = position.coords.latitude;
            document.getElementById('mylongitude').value = position.coords.longitude;

            // Now that we have the current location, calculate the distance and amount
            calculateDistance();
        }

        function errorCallback(error) {
            alert("Error getting current location: " + error.message);
        }

        function calculateDistance() {
            var lat1 = parseFloat(document.getElementById('latitudeInput').value);
            var lon1 = parseFloat(document.getElementById('longitudeInput').value);
            var lat2 = parseFloat(document.getElementById('mylatitude').value);
            var lon2 = parseFloat(document.getElementById('mylongitude').value);

            var R = 6371; // Radius of the earth in km
            var dLat = deg2rad(lat2 - lat1);  // deg2rad below
            var dLon = deg2rad(lon2 - lon1);
            var a =
                Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
                Math.sin(dLon / 2) * Math.sin(dLon / 2)
                ;
            var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
            var distance = R * c; // Distance in km
            
            // Assign distance to the input field
            document.getElementById('distanceInput').value = distance.toFixed(2) + " km";
            
            // Calculate amount
            var amount = distance * 30 + {{$dataamounttotal}};
            document.getElementById('amountInput').value = amount.toFixed(2);
            var transport = distance * 30;
            document.getElementById('transportfeeInput').value = transport.toFixed(2);
        }

        function deg2rad(deg) {
            return deg * (Math.PI / 180)
        }
    </script>


    

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

    <input required type="hidden" value="{{$dataamounttotal}}" name="checkoutprice">

    <div class="card-block">
        
    <h5 class="ml-12"></h5>
    <h5>Subtotal Amount KSH: <input style="width:200px;" type="text" name="subtotal" id="amountInput" class="form-control form-control-round" readonly required></h5>
    <p>Transport fee KSH :<input style="width:200px;" type="text" name="transportfee" id="transportfeeInput" class="form-control" readonly required> </p>
    <p>Discount ; KSH :0</p>
    <hr>
    <!-- <p>Total KSH : {{$dataamounttotal}}</p> -->
    </div>
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