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
<h5>List of Car Wash</h5>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class=" breadcrumb breadcrumb-title">
<li class="breadcrumb-item">
<a href="{{route('admin')}}"><i class="feather icon-home"></i></a>
</li>
<li class="breadcrumb-item"><a href="">Car wash</a>
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


<div class="card">
<div class="card-header">
<!-- <h5>Users</h5> --> <center><a class="btn btn-primary" href="{{route('addnewcarwash')}}">Add New Car Wash</a></center>
</div>
    <div class="card-block table-border-style">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Location </th>
                    <th>Contact</th>
                    <th>Image</th>                  
                    
                    <th></th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($carwash as $users)
                    <tr>
                        <th scope="row">{{$users->id}}</th>
                        <td>{{$users->name}}</td>
                        <td>{{$users->location}}</td>
                        <td>{{$users->contact}}</td>
                        <td>    <img style="height:60px; width:100px" src="/storage/images/{{$users->image}}" alt="image" onclick="showImageFullScreen('{{ $users->image }}')"></td>
                     
                                      
                        <td><a class="btn btn-success btn-sm" href="{{route('admineditcarwash',$users->id)}}">Edit</a></td>
                        <td><a href="{{route('deletecarwash',$users->id)}}" class="btn btn-danger btn-sm" href="">Delete</a></td>
                    </tr>  
                    @endforeach 
            </table>
        </div><center class="mb-4 mt-5">{{$carwash->links()}}</center>  
                                            <style>
                                                .w-5{
                                                display: none;
                                                }
                                            </style>
    </div>
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


<script>
    function showImageFullScreen(imageUrl) {
        // Create a modal element
        var modal = document.createElement('div');
        modal.classList.add('modal');
        
        // Create an image element
        var img = document.createElement('img');
        img.src = '/storage/images/' + imageUrl;
        img.alt = 'Full-size image';
        
        // Append the image to the modal
        modal.appendChild(img);
        
        // Append the modal to the document body
        document.body.appendChild(modal);
        
        // Close the modal when clicking outside the image
        modal.onclick = function() {
            modal.remove();
        };
    }
</script>


<style>
    .modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }
    
    .modal img {
        max-width: 90%;
        max-height: 90%;
    }
</style>




@endsection