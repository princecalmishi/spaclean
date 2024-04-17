@extends('layouts.admin')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Car Wash Package</div>

               
                    <form method="POST" action="{{ route('posteditcategory') }}">
                        @csrf
                        <input type="hidden" value="{{ $data->id }}" name="id">
                        <div class="form-group row">
                            <label for="ref_number" class="col-md-4 col-form-label text-md-right">Package Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $data->name }}" required autofocus>
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label for="package" class="col-md-4 col-form-label text-md-right">Saloon Price</label>
                            <div class="col-md-6">
                                <input id="saloon_price" type="number" class="form-control" name="saloon_price" value="{{ $data->saloon_price }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="amount" class="col-md-4 col-form-label text-md-right">SUV Price</label>
                            <div class="col-md-6">
                                <input id="suv_price" type="number" class="form-control" name="suv_price" value="{{ $data->saloon_price }}" required>
                            </div>
                        </div>

                        <hr>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Now
                                </button><br>
                            </div>
                            <br>
                        </div>
                        <br><br>
                    </form>
                </div>
            </div>
        </div>
        </div>    </div>


@endsection