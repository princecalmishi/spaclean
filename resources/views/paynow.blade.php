@extends('layouts.home')
@section('content')

<div class="pcoded-content">

<hr>
<br><br>
<!-- Modal -->
<div class="modal fade show d-block mt-5" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog mt-5">
    <div class="modal-content mt-5">
      <div class="modal-header">
      <script>
function clicked(e)
{
    if(!confirm('Your booking payment will not be completed, Sure to Cancel ?')) {
        e.preventDefault();
    }
}
</script>
        <h5 class="modal-title" id="staticBackdropLabel">Mpesa Payment <a onclick="clicked(event)" href="{{ url()->previous() }}" class="btn btn-secondary ml-5">Cancel Payment</a></h5>
        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
      </div>
      <center> @include('inc.messages')</center>

      <div class="modal-body">
        <h5>Amount to Pay KSH: {{$dataamount}}</h5>
        <form action="{{route('paynowgo')}}" method="post">
            @csrf
        <h5>You will pay with : <img style="width:150px; height:100px;" src="../storage/static/mpesa.png" alt="image"> </h5>
        <input type="phone" name="myphone" placeholder="Enter Mpesa Phone number" class="form-control">
        <input type="hidden" name="amount" value="{{$dataamount}}" class="form-control">
        <input type="hidden" name="ref" value="{{$ref}}" class="form-control">
        <input type="hidden" name="source" value="homecare" class="form-control">

      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary mr-3" data-bs-dismiss="modal">Close</button> -->
        <button type="submit" class="btn btn-primary">Pay Now</button>
        <a href="{{route('checkpayment')}}">Paid ? Confirm Payment</a>
      </div>
      </form>
    </div>
  </div>
</div>



    
@endsection