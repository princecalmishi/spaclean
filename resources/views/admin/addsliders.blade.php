@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Slide</div>

                <div class="card-body">
                  

                    <form method="POST" action="{{ route('addslidespost') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Heading	</label>
                            <div class="col-md-6">
                                <input id="head" type="text" class="form-control" name="head" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="amount" class="col-md-4 col-form-label text-md-right">SubHeading</label>
                            <div class="col-md-6">
                                <input id="SubHeading" type="text" class="form-control" name="subhead" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="number_of_cars" class="col-md-4 col-form-label text-md-right">Description</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="desc" id="" cols="20" rows="10"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="number_of_cars" class="col-md-4 col-form-label text-md-right">Image</label>
                            <div class="col-md-6">
                                <input id="cover_image" type="file" class="form-control" name="cover_image" required>
                            </div>
                        </div>

                       
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Create Now
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