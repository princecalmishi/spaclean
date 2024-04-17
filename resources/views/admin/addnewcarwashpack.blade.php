@extends('layouts.admin')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Category</div>

                <div class="card-body">
                   

                    <form method="POST" action="{{ route('addnewcarwashpackpost') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Category Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="saloon_price" class="col-md-4 col-form-label text-md-right">Saloon Price</label>
                            <div class="col-md-6">
                                <input id="saloon_price" type="number" class="form-control" name="saloon_price" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="suv_price" class="col-md-4 col-form-label text-md-right">SUV Price</label>
                            <div class="col-md-6">
                                <input id="suv_price" type="number" class="form-control" name="suv_price" required>
                            </div>
                        </div>

                        <!-- You can add more fields as per your database structure -->

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Create Category
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