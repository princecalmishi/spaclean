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
                          @php
                          $bazarpackname = App\Models\Bazaar_package::where('id',$packageid)->pluck('name');
                          $hpsx = App\Models\Barzars::where('id',$bazarid)->pluck('Barzar_name');
                                 
                            @endphp
        <h5 class="modal-title" id="staticBackdropLabel">Mpesa Payment for Package : @foreach($bazarpackname as $bazarpackname){{ $bazarpackname}}@endforeach Addition into @foreach($hpsx as $hpsx){{ $hpsx}}@endforeach Bazar.</h5>
        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
      </div>
      <center> @include('inc.messages')</center>
      <div class="modal-body">
        <h5>Amount to Pay KSH: {{$packprice}}</h5>
        <form action="{{route('paynowgo')}}" method="post">
            @csrf
        <h5>You will pay with : <img style="width:150px; height:100px;" src="../storage/images/mpesa.png" alt="image"> </h5>
        <input type="phone" name="myphone" placeholder="Enter Mpesa Phone number" class="form-control">
        <input type="hidden" name="amount" value="{{$packprice}}" class="form-control">
        <input type="hidden" name="ref" value="{{$bazarcheckoutref}}" class="form-control">
        <input type="hidden" name="source" value="bazaar" class="form-control">

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