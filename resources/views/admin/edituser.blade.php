@extends('layouts.admin')
@section('content')


<div class="pcoded-content">
<center> @include('inc.messages')</center>

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                
        <form  action="{{route('updateuserimages')}}" method="post" enctype="multipart/form-data">
                @csrf
            @php
                $pr = App\Models\Network_Profiles::where('user_id',$id)->pluck('Profile_image');
                $bn = App\Models\Network_Profiles::where('user_id',$id)->pluck('Banner_image');
                $prname = App\Models\User::where('id',$id)->pluck('name');
                $prname2 = App\Models\User::where('id',$id)->pluck('name');
                $premail = App\Models\User::where('id',$id)->pluck('email');
                $premail2 = App\Models\User::where('id',$id)->pluck('email');
                $prophone = App\Models\User::where('id',$id)->pluck('phone');
                $netid = App\Models\Network_Profiles::where('user_id',$id)->pluck('id');
                
             @endphp  
             
                <p>Profile picture</p>
                <img name="profile" class="rounded-circle mt-5" width="150px" src="/storage/images/@foreach($pr as $pr){{$pr}} @endforeach"><br>
                <span class="font-weight-bold">@foreach($prname as $prname){{ $prname}} @endforeach</span><br>
                <span class="text-black-50">@foreach($premail as $premail){{ $premail}} @endforeach</span>
                <span> </span><br><br>
                <!-- <input  name="cover_image" required type="file" class="form-control"> -->
                <input  type="file" name="cover_image" id="cover_image" class="form-control-file">

                <input  name="id" type="hidden" value={{$id}} class="form-control">

            </div>
                <br>
                <p class="ml-5">Banner picture</p>
                <img name="banner" class="ml-5" height="150px;" width="150px" src="/storage/images/@foreach($bn as $bn){{$bn}} @endforeach">
               
                <input  name="bannerimage" type="file" class="form-control"><br>
           <center> <button type="submit" class="btn btn-success btn-sm">Update Images</button></center>
        </form>       
        
        
            </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <form action="{{route('updateuserprof')}}" method="post">
                    @csrf
                    
                    <input  name="id" required type="hidden" value="{{$id}}" class="form-control">
                    <input  name="netid" required type="hidden" value="@foreach($netid as $netid){{ $netid}} @endforeach" class="form-control">

                    <div class="row mt-2">
                        <div class="col-md-12"><label class="labels">Full Name</label>
                            <input required type="text" name="name" class="form-control" placeholder="Full name" value="@foreach($prname2 as $prname2){{ $prname2}} @endforeach">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Mobile Number</label>
                            <input name="phone" required type="text" class="form-control" placeholder="enter phone number" value="@foreach($prophone as $prophone){{ $prophone}} @endforeach">
                        </div>
                        <div class="col-md-12"><label class="labels">Email Address</label>
                            <input name="email" required type="text" class="form-control" placeholder="enter email id" value="@foreach($premail2 as $premail2){{ $premail2}} @endforeach">
                        </div>
                    </div>
                                @php
                                    $location = App\Models\Network_Profiles::where('user_id',$id)->pluck('Location');
                                    $profession = App\Models\Network_Profiles::where('user_id',$id)->pluck('Profession');
                                    $about = App\Models\Network_Profiles::where('user_id',$id)->pluck('About');
                                @endphp    
                                    
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Profession</label>
                            <input name="profession" required type="text" class="form-control" placeholder="Profession" value="@foreach($profession as $profession)   {{ $profession}} @endforeach">
                        </div>
                        <div class="col-md-6"><label class="labels">Location</label>
                            <input name="location" required type="text" class="form-control" value="@foreach($location as $location)   {{ $location}} @endforeach" placeholder="Location">
                        </div>
                    </div>
                    <div class="row mt-3">
                    <label class="labels">About Me</label>
                        <textarea name="about" id="" cols="30" rows="10" class="form-control" required placeholder="About me">@foreach($about as $about)   {{ $about}} @endforeach</textarea>
                    </div>

                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                </form>
                </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience">
                    <span>Network Profile Experience</span>                      
                </div>
                <br>
                @php
                    $wp = App\Models\Network__experiences::where('user_id',$id)->pluck('Work_position');
                    $comp = App\Models\Network__experiences::where('user_id',$id)->pluck('Company');
                    $fd = App\Models\Network__experiences::where('user_id',$id)->pluck('From_date');
                    $td = App\Models\Network__experiences::where('user_id',$id)->pluck('To_date');
                    $loc = App\Models\Network__experiences::where('user_id',$id)->pluck('Location');
                    $desc = App\Models\Network__experiences::where('user_id',$id)->pluck('Description');
                    $sk = App\Models\Network__experiences::where('user_id',$id)->pluck('Skills');
                    $edu = App\Models\Network__experiences::where('user_id',$id)->pluck('Education');

                @endphp  

              

            <form action="{{route('updateuserexp')}}" method="post">  
                @csrf
                <input  name="networkexpertableid" type="hidden" value={{$networkexpertableid}} class="form-control">
         
                <div class="col-md-12"><label class="labels">Work Position</label>
                    <input type="text"  name="work_position" class="form-control" placeholder="Work Position" value="@foreach($wp as $wp){{ $wp}}@endforeach">
                </div> <br>
                <div class="col-md-12"><label class="labels">Company</label>
                    <input name="Company" type="text" class="form-control" placeholder="Company" value="@foreach($comp as $comp){{ $comp}}@endforeach">
                </div>

                <div class="col-md-12"><label class="labels">From_date</label>
                    <input name="fromdate" type="date" class="form-control"  value="@foreach($fd as $fd){{ $fd}}@endforeach">
                </div>
                <div class="col-md-12"><label class="labels">To_date</label>
                    <input name="todate" type="date" class="form-control"  value="@foreach($td as $td){{ $td}}@endforeach">
                </div>

                <div class="col-md-12"><label class="labels">Location</label>
                    <input name="location" type="text" class="form-control" placeholder="Location" value="@foreach($loc as $loc){{ $loc}}@endforeach">
                </div>
                <div class="col-md-12"><label class="labels">Description</label>
                    <textarea name="description" class="form-control" id="" cols="30" rows="10" placeholder="Description">@foreach($desc as $desc){{ $desc}}@endforeach</textarea>
                </div>

                <div class="col-md-12"><label class="labels">Skills</label>
                    <input name="skills" type="text" class="form-control" placeholder="Skills" value="@foreach($sk as $sk){{ $sk}}@endforeach">
                </div>
                <div class="col-md-12"><label class="labels">Education</label>
                    <input name="education" type="text" class="form-control" placeholder="Education" value="@foreach($edu as $edu){{ $edu}}@endforeach">
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Experience</button></div>

            </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>


<style>

body {
    background: rgb(99, 39, 120)
}

.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}
</style>
@endsection