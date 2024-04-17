@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Service <center><a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a></center></div>

                <div class="card-body">
                  

                    <form method="POST" action="{{ route('editservicepost') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$serv->id}}">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Service Name</label>
                            <div class="col-md-6">
                                <input id="head" value="{{$serv->name}}" type="text" class="form-control" name="name" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="amount" class="col-md-4 col-form-label text-md-right">Description</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="desc" id="" cols="10" rows="5">{{$serv->service_desc}} </textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="amount" class="col-md-4 col-form-label text-md-right">Status</label>
                            <div class="col-md-6">
                                <select name="status" id="" class="form-control">
                                <option selected disabled>Select Option : {{$serv->status}}</option>
                                <option value="Active">Active</option>
                                    <option value="InActive">InActive</option>
                                </select>
                            </div>
                        </div>

                        

                        <div class="form-group row">
                            <label for="number_of_cars" class="col-md-4 col-form-label text-md-right">Image</label>
                            <div class="col-md-6">
                                <input id="cover_image" type="file" class="form-control" name="cover_image" >
                            </div>
                        </div>

                       
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Now
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