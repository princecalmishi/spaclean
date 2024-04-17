@extends('layouts.rider')
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
                                                    <h4>My Profile - Rider</h4>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <!-- Page-header end -->

                                <div class="page-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card">                                                
                                            
                                                <div class="card-block">

                                                <div class="container">
                                                        <h2>Update Profile</h2>
                                                        <form method="POST" action="{{ route('rider.profile.update') }}">
                                                            @csrf

                                                            <div class="form-group">
                                                                <label for="name">Name:</label>
                                                                <input type="text" id="name" name="name" value="{{ old('name', Auth::guard('rider')->user()->name) }}" class="form-control" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="email">Email:</label>
                                                                <input type="email" id="email" name="email" value="{{ old('email', Auth::guard('rider')->user()->email) }}" class="form-control" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="password">New Password:</label>
                                                                <input type="password" id="password" name="password" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="password_confirmation">Confirm Password:</label>
                                                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                                                            </div>

                                                            <button type="submit" class="btn btn-primary">Update Profile</button>
                                                        </form>
                                                    </div>



                                                </div>

                                                        
                                            </div>
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








@endsection