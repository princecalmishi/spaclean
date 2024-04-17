@extends('layouts.admin')
@section('content')
<div class="pcoded-content">

      

<div class="pcoded-inner-content">


<div class="page-header card">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<i class="feather icon-credit-card bg-c-blue"></i>
<div class="d-inline">
<h5>Update Car Listing</h5>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class=" breadcrumb breadcrumb-title">
<li class="breadcrumb-item">
<a href="{{route('admin')}}"><i class="feather icon-home"></i></a>
</li>
<li class="breadcrumb-item"><a href="">Update Car Listing</a>
</li>

</ul>
</div>
</div>
</div>
</div>

<div class="pcoded-inner-content">

<div class="main-body">
<div class="page-wrapper">

<div class="page-body">



<div class="container">
        <form method="POST" action="{{ route('updatelistingpost') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $carSale->id }}">
            <div class="form-group">
                <label for="brand">Car Brand:</label>
                <input type="text" name="brand" class="form-control" value="{{ $carSale->brand }}" required>
            </div>

            <div class="form-group">
                <label for="model">Car Model:</label>
                <input type="text" name="model" class="form-control" value="{{ $carSale->model }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control">{{ $carSale->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="modelyear">Model Year:</label>
                <input type="text" name="modelyear" class="form-control" value="{{ $carSale->modelyear }}">
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" name="price" class="form-control" value="{{ $carSale->price }}">
            </div>

            <div class="form-group">
                <label for="price_type">Price Type:</label>
                <select name="price_type" class="form-control">
                    <option value="fixed" {{ $carSale->price_type === 'fixed' ? 'selected' : '' }}>Fixed</option>
                    <option value="negotiable" {{ $carSale->price_type === 'negotiable' ? 'selected' : '' }}>Negotiable</option>
                </select>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" class="form-control">
                    <option value="Selling" {{ $carSale->status === 'Selling' ? 'selected' : '' }}>Selling</option>
                    <option value="Sold" {{ $carSale->status === 'Sold' ? 'selected' : '' }}>Sold</option>
                    <!-- Add more status options if needed -->
                </select>
            </div>

            <div class="form-group">
                <label for="price">Location :</label>
                <input type="text" name="location" class="form-control" value="{{ $carSale->Location }}">
            </div>

            <div class="form-group">
                <label for="price">Fuel :</label>
                <input type="text" name="Fuel" class="form-control" value="{{ $carSale->Fuel }}">
            </div>
            <div class="form-group">
                <label for="price">Mileage :</label>
                <input type="text" name="Mileage" class="form-control" value="{{ $carSale->Mileage }}">
            </div>
            <div class="form-group">
                <label for="price">CC :</label>
                <input type="text" name="CC" class="form-control" value="{{ $carSale->CC }}">
            </div>
            <div class="form-group">
                <label for="price">Colour :</label>
                <input type="text" name="Colour" class="form-control" value="{{ $carSale->Colour }}">
            </div>
            <div class="form-group">
                <label for="price">Gear :</label>
                <input type="text" name="Gear" class="form-control" value="{{ $carSale->Gear }}">
            </div>
            <div class="form-group">
                <label for="price">cover_image :</label>
                <img style="height:100px; width:100px;" src="/storage/images/{{ $carSale->cover_image }}" alt="">
                <br><hr>
                <input type="file" name="cover_image" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="price">cover_image2 :</label>
                <img style="height:100px; width:100px;" src="/storage/images/{{ $carSale->cover_image2 }}" alt="">
                    <br><hr>
                <input type="file" name="cover_image2" class="form-control" value="">
            </div>


            <!-- Add more fields based on your Car_Sales model -->

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>









@endsection