@extends('layouts.home')
@section('content')

<div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <!-- Main-body start -->
                        <div class="main-body">
                            <div class="page-wrapper">
                                <!-- Page-header start -->
                                <div class="page-header">
                                    <div class="row align-items-end">
                                        <div class="col-lg-8">
                                            <div class="page-header-title">
                                                <div class="d-inline">
                                                    <h4>Spaclean Market Place</h4>
                                                </div>
                                            </div>
                                            <hr>
                                            <h5>List of All Cars from : {{$bazarname}} Bazar</h5>
                                            <hr>
                                        </div>
                                        
                                    </div>
                                </div>
                                <!-- Page-header end -->
                                    <!-- Page body start -->
                                    <div class="page-body">
                                        <!-- Product list start -->
                                        <div class="row">
                                            @foreach($data as $dataz)
                                            <div class="col-xl-4 col-md-6 col-sm-6 col-xs-12">
                                                <center>
                                                <div class="card prod-view">
                                                    <div class="prod-item text-center">
                                                        <div class="prod-img">
                                                           
                                                            <a href="{{route('cardetail',$dataz->id)}}" class="hvr-shrink">
                                                                <img style="height:150px; width:150px;" style="height:150px;" src="/storage/images/{{$dataz->cover_image}}" class="img-fluid o-hidden" alt="prod1.jpg">
                                                            </a>
                                                            <!-- <div class="p-new"><a href=""> New </a></div> -->
                                                        </div>
                                                        <div class="prod-info">
                                                            <a href="{{route('cardetail',$dataz->id)}}" class="txt-muted"><h4>{{$dataz->model}} | {{$dataz->brand}}</h4></a>
                                                            <!-- <div class="m-b-10">
                                                                <label class="label label-success">3.5 <i class="fa fa-star"></i></label><a class="text-muted f-w-600">14 Ratings &amp;  3 Reviews</a>
                                                            </div> -->
                                                            <span class="prod-price"><i class="icofont icofont-cur-dollar">KES. </i>{{$dataz->price}}</span>
                                                        </div>
                                                    </div>
                                                </div></center>
                                            </div>       
                                            
                                            @endforeach

                                            <center class="mb-4 mt-3">{{$data->links()}}</center>   
                                            <style>
                                                .w-5{
                                                display: none;
                                                }
                                            </style>


  

                                            
                                        </div>
                                        <!-- Product list end -->
                                    </div>
                                    <!-- Page body end -->
                                </div>
                            </div>
                            <!-- Main-body end -->
                            <div id="styleSelector">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection