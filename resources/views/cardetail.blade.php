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
                                                    <h4>Car Details</h4>
                                                </div>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                                <!-- Page-header end -->
                                
                                    <!-- Page body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- Product detail page start -->
                                                <div class="card product-detail-page">
                                                    <div class="card-block">
                                                        <div class="row">
                                                            
                                                            <div class="col-lg-5 col-xs-12">
                                                                <div class="port_details_all_img row">
                                                                    <div class="col-lg-12 m-b-15">
                                                                        <div id="big_banner">
                                                                            <div class="port_big_img">
                                                                                <img style="height: 150px; width: 100%;" class="img img-fluid" src="/storage/images/{{$cover1}}" alt="Big_ Details">
                                                                            </div>
                                                                          
                                                                        </div>
                                                                    </div>
                                                                   
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-7 col-xs-12 product-detail" id="product-detail">
                                                                <div class="row">
                                                                    <div>
                                                                       
                                                                        <div class="col-lg-12">
                                                                            <h4 class="pro-desc">{{$carbrand}} | {{$carname}} </h4>
                                                                        </div>
                                                                        
                                                                        <div class="col-lg-12">
                                                                            <span class="text-primary product-price"><i class="icofont icofont-cur-dollar"></i>KES. {{$carprice}} | {{$carpricetype}}</span>
                                                                            <hr>
                                                                            <p>{{$description}}
                                                                            </p>
                                                                            <hr>
                                                                        </div>
                                                                        
                                                                       
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product detail page end -->
                                            </div>
                                        </div>
                                        <!-- Nav tabs start-->
                                        <div class="card product-detail-page">
                                            <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active f-18 p-b-0" data-toggle="tab" href="#description" role="tab">Description</a>
                                                    <div class="slide"></div>
                                                </li>
                                               
                                            </ul>
                                        </div>
                                        <!-- Nav tabs start-->

                                        <!-- Nav tabs card start-->
                                        <div class="card">
                                            <div class="card-block">
                                                <!-- Tab panes -->
                                                <div class="tab-content bg-white">
                                                    <div class="tab-pane active" id="description" role="tabpanel">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="col-lg-2">Fuel Type</td>
                                                                    <td class="col-lg-10">{{$Fuel}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="col-lg-2">Mileage</td>
                                                                    <td class="col-lg-10">{{$Mileage}} KM</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="col-lg-2">CC</td>
                                                                    <td class="col-lg-10">{{$CC}} CC</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="col-lg-2">Manufacture Year</td>
                                                                    <td class="col-lg-10">{{$modelyear}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="col-lg-2">Color</td>
                                                                    <td class="col-lg-10">{{$Colour}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="col-lg-2">Transmission</td>
                                                                    <td class="col-lg-10">{{$Gear}}</td>
                                                                </tr>
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                   
                                                </div>
                                                <h3>Seller Information</h3>
                                                Name : {{$sellername}} <br><hr>
                                                Phone Number : {{$sellerphone}}
                                                <hr>
                                                <a href="tel:{{$sellerphone}}" class="btn btn-success">Call Seller</a>

                                            </div>
                                        </div>
                                        <!-- Nav tabs card end-->
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