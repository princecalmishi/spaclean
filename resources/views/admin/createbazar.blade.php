@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Bazar Package</div>

                <div class="card-body">
                  

                    <form method="POST" action="{{ route('createbazapackage') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Package Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="amount" class="col-md-4 col-form-label text-md-right">Amount</label>
                            <div class="col-md-6">
                                <input id="amount" type="number" class="form-control" name="amount" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="number_of_cars" class="col-md-4 col-form-label text-md-right">Number of Cars</label>
                            <div class="col-md-6">
                                <input id="number_of_cars" type="number" class="form-control" name="number_of_cars" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="period" class="col-md-4 col-form-label text-md-right">Period</label>
                            <div class="col-md-6">
                                <input id="period" type="number" class="form-control" name="period" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Create Package
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>







@endsection