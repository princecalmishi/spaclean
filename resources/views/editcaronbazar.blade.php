@extends('layouts.home')
@section('content')

<div class="pcoded-content">

        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                        <div class="d-inline">
                        @php
                        $bazarpacknamex = App\Models\Barzars::where('id',$id)->pluck('Barzar_name');                            
                        @endphp
                        <h5>Edit car on  @foreach($bazarpacknamex as $bazarpacknamex){{ $bazarpacknamex}} @endforeach Barzar</h5>
                        <!-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> -->
                        </div>
                    </div>
                </div>
            <div class="col-lg-4">
           
        </div>
    </div>
</div>

<div class="pcoded-inner-content">
<div class="main-body">
<div class="page-wrapper">
<div class="page-body">

<div class="row">
   



<div class="row">
<div class="col-sm-12">

<div class="card">
<div class="card-header">

<h5>Modify car details </h5>
</div>      <center> @include('inc.messages')</center>
<div class="card-block">
<div class="row ui-sortable" id="draggablePanelList">
    
    <!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> -->
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit car on your Bazar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                        @php
                        $subid = App\Models\Car_Sales::where('id',$id)->pluck('subscription_id');
                        $carbrand = App\Models\Car_Sales::where('id',$id)->pluck('brand');
                        $model = App\Models\Car_Sales::where('id',$id)->pluck('model');
                        $description = App\Models\Car_Sales::where('id',$id)->pluck('description');
                        $modelyear = App\Models\Car_Sales::where('id',$id)->pluck('modelyear');
                        $price	= App\Models\Car_Sales::where('id',$id)->pluck('price');
                        $price_type = App\Models\Car_Sales::where('id',$id)->pluck('price_type');
                        $Location = App\Models\Car_Sales::where('id',$id)->pluck('Location');
                        $Fuel = App\Models\Car_Sales::where('id',$id)->pluck('Fuel');
                        $Mileage = App\Models\Car_Sales::where('id',$id)->pluck('Mileage');
                        $CC = App\Models\Car_Sales::where('id',$id)->pluck('CC');
                        $Colour = App\Models\Car_Sales::where('id',$id)->pluck('Colour');
                        $Gear = App\Models\Car_Sales::where('id',$id)->pluck('Gear');
                        $cover_image = App\Models\Car_Sales::where('id',$id)->pluck('cover_image');
                        $cover_image2 = App\Models\Car_Sales::where('id',$id)->pluck('cover_image2');
                                                
                                              
                        @endphp
            <div class="modal-body">
                <form  action="{{route('editcaronbazarpost')}}" method ='POST', enctype ='multipart/form-data'>
                @csrf

                <input type="hidden" name="carsaleid" id="" value="{{$id}}">
                <input type="hidden" name="subid" id="" value="@foreach($subid as $subid){{ $subid}}@endforeach">
                        
                <div class="form-group row">
        <label class="col-sm-2 col-form-label">Brand</label>
            <div class="col-sm-6">   
            <select id="carbrand" name="carbrand" class="form-control">
                        <option selected disabled>@foreach($carbrand as $carbrand){{ $carbrand}}@endforeach</option>
                    @foreach ($brands as $carWash)
                        <option value="{{ $carWash->makeid }}">{{ $carWash->name }}</option>
                    @endforeach
            </select>
            </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Model</label>
            <div class="col-sm-6"> 
            <option disabled selected>@foreach($model as $model){{ $model}}@endforeach</option>

                <select id="carmodel" name="carmodel" class="form-control"></select>
                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            </div> 
    </div> 

    <script>
        $(document).ready(function() {
            $('#carbrand').change(function() {
                var carWashId = $(this).val();

                $.ajax({
                    type: 'GET',
                    url: '{{route('getcarmodel')}}',
                    data: {
                        carWashId: carWashId
                    },
                    success: function(data) {
                        var personnelSelect = $('#carmodel');
                        personnelSelect.empty();

                        $.each(data, function(index, personnel) {
                            personnelSelect.append('<option value="' + personnel.name + '">' + personnel.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
    

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Car Description</label>
                        <div class="col-sm-10">
                            <textarea required class="form-control" name="desc" id="desc" cols="20" rows="10" placeholder="Enter Description">@foreach($description as $description){{$description}}@endforeach </textarea>
                        </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Model Year</label>
                    <div class="col-sm-10">
                        <input required type="number" value="@foreach($modelyear as $modelyear){{ $modelyear}}@endforeach" required name="modelyear" class="form-control" placeholder="Model Year">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Car Price</label>
                    <div class="col-sm-10">
                        <input required value="@foreach($price as $price){{ $price}}@endforeach" type="number" required name="price" class="form-control" placeholder="Car Price">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Price Type</label>
                    <div class="col-sm-10">
                        <select required class="form-control" name="pricetype" id="">
                        @foreach($price_type as $price_type){{ $price_type}}
                        <option selected disabled value="{{$price_type}}">{{$price_type}}</option>
                        @endforeach
                            <option value="Negotiable">Negotiable</option>
                            <option value="Non Negotiable">Non Negotiable</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Location</label>
                    <div class="col-sm-10">
                        <input value="@foreach($Location as $Location){{ $Location}}@endforeach" type="text" required name="location" class="form-control" placeholder="Car Location">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Fuel</label>
                    <div class="col-sm-10">
                        <input value="@foreach($Fuel as $Fuel){{ $Fuel}}@endforeach" type="text" required name="fuel" class="form-control" placeholder="Fuel Type">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Mileage </label>
                    <div class="col-sm-10">
                        <input type="number" value="@foreach($Mileage as $Mileage){{ $Mileage}}@endforeach" required name="mileage" class="form-control" placeholder="Mileage">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">CC </label>
                    <div class="col-sm-10">
                        <input value="@foreach($CC as $CC){{ $CC}}@endforeach" type="number" required name="CC" class="form-control" placeholder="CC">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Colour </label>
                    <div class="col-sm-10">
                        <input value="@foreach($Colour as $Colour){{ $Colour}}@endforeach" type="text" required name="colour" class="form-control" placeholder="Car colour">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Gear </label>
                    <div class="col-sm-10">
                        <input value="@foreach($Gear as $Gear){{ $Gear}}@endforeach" type="text" required name="gear" class="form-control" placeholder="Car Gear">
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Upload Image File 1</label>
                    <div class="col-sm-10">
                    <input value="/storage/images/@foreach($cover_image as $cover_image){{$cover_image}}@endforeach" name="cover_image" type="file" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Upload Image File 2</label>
                    <div class="col-sm-10">
                    <input name="cover_image2" type="file" class="form-control">
                    </div>
                </div>
        

                
                <hr>
                </div>
                <hr>
                <center>
                    @if($posterid == $authuserid)
                <button type="submit" class="btn btn-primary">Update Listing Now</button>
                @endif
                </center>
                <hr>
                

           
            </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
<!-- </div> -->

























</div>
</div>
</div>

</div>
</div>


</div>
</div>
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


@endsection

