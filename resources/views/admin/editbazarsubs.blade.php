@extends('layouts.admin')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Bazaar Subscription</div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('editbazarsubspost') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="ref_number" class="col-md-4 col-form-label text-md-right">Reference Number</label>
                            <div class="col-md-6">
                                <input id="ref_number" readonly type="text" class="form-control" name="ref_number" value="{{ $subscription->ref_number }}" required autofocus>
                            </div>
                        </div>
                        @php
                        $hps = App\Models\Barzars::where('id',$subscription->bazaar_id)->pluck('Barzar_name');
                        $hpsprof = App\Models\Bazaar_package::where('id',$subscription->package)->pluck('name');
                        $profile = App\Models\Network_Profiles::where('user_id',$subscription->sender_id)->pluck('Profile_image');
                        @endphp
                        <div class="form-group row">
                            <label for="bazaar_id" class="col-md-4 col-form-label text-md-right">Bazaar Name</label>
                            <div class="col-md-6">
                                <input id="bazaar_id"readonly type="text" class="form-control" name="bazaar_id" value="@foreach($hps as $hps){{ $hps}}@endforeach" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="package" class="col-md-4 col-form-label text-md-right">Package</label>
                            <div class="col-md-6">
                                <input id="package" type="text" class="form-control" name="package" value="@foreach($hpsprof as $hpsprof){{ $hpsprof}}@endforeach" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="amount" class="col-md-4 col-form-label text-md-right">Amount KES. </label>
                            <div class="col-md-6">
                                <input id="amount" type="text" class="form-control" name="amount" value="{{ $subscription->amount }}" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="amount" class="col-md-4 col-form-label text-md-right">Cars</label>
                            <div class="col-md-6">
                                <input id="amount" type="number" class="form-control" name="cars" value="{{ $subscription->cars }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="amount" class="col-md-4 col-form-label text-md-right">Pay Date</label>
                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control" name="paydate" value="{{ $subscription->glory_date }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="amount" class="col-md-4 col-form-label text-md-right">Expiry Date</label>
                            <div class="col-md-6">
                                <input id="expdate" type="date" class="form-control" name="expdate" value="{{ $subscription->expiry_date }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="amount" class="col-md-4 col-form-label text-md-right">Status</label>
                            <div class="col-md-6">
                                <input id="status" type="text" class="form-control" name="status" value="{{ $subscription->status }}" required>
                            </div>
                        </div>

                        <!-- Add more fields according to your database structure -->

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Subscription
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>    </div>








@endsection