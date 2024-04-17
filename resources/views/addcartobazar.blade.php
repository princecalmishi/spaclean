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
                        $bazarpacknamex = App\Models\Barzars::where('id',$bazarid)->pluck('Barzar_name');                            
                        @endphp
                        <h5>Add a car to @foreach($bazarpacknamex as $bazarpacknamex){{ $bazarpacknamex}} @endforeach Barzar</h5>
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
@php
$bazarsubg = App\Models\Bazaar_subscriptions::where('id',$id)->pluck('package');                            
$bazarpackname = App\Models\Bazaar_package::where('id',$bazarsubg)->pluck('name');                            
@endphp
<h5>Add a car to @foreach($bazarpackname as $bazarpackname){{ $bazarpackname}} @endforeach Subscription</h5>
</div>      <center> @include('inc.messages')</center>
<div class="card-block">
<div class="row ui-sortable" id="draggablePanelList">
    

    <!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> -->
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add car to your Bazar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                <form  action="{{route('postaddcartobazar')}}" method ='POST', enctype ='multipart/form-data'>
                @csrf

                <input type="hidden" name="bazid" id="" value="{{$bazarid}}">
                <input type="hidden" name="subid" id="" value="{{$id}}">

                    
                <div class="form-group row">
        <label class="col-sm-2 col-form-label">Brand</label>
            <div class="col-sm-6">   
            <select id="carbrand" name="carbrand" class="form-control">
                        <option selected disabled>Select Brand</option>
                    @foreach ($brands as $carWash)
                        <option value="{{ $carWash->makeid }}">{{ $carWash->name }}</option>
                    @endforeach
            </select>
            </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Model</label>
            <div class="col-sm-6"> 
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
                            <textarea required class="form-control" name="desc" id="desc" cols="20" rows="10" placeholder="Enter Description"></textarea>
                        </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Model Year</label>
                    <div class="col-sm-10">
                        <input required type="number" required name="modelyear" class="form-control" placeholder="Model Year">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Car Price</label>
                    <div class="col-sm-10">
                        <input required type="number" required name="price" class="form-control" placeholder="Car Price">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Car Price Type</label>
                    <div class="col-sm-10">
                        <select required class="form-control" name="pricetype" id="">
                            <option selected disabled">Select Option</option>
                            <option value="Negotiable">Negotiable</option>
                            <option value="Non Negotiable">Non Negotiable</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Location</label>
                    <div class="col-sm-10">
                        <input type="text" required name="location" class="form-control" placeholder="Car Location">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Fuel</label>
                    <div class="col-sm-10">
                        <input type="text" required name="fuel" class="form-control" placeholder="Fuel Type">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Mileage </label>
                    <div class="col-sm-10">
                        <input type="number" required name="mileage" class="form-control" placeholder="Mileage">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">CC </label>
                    <div class="col-sm-10">
                        <input type="number" required name="CC" class="form-control" placeholder="CC">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Colour </label>
                    <div class="col-sm-10">
                        <input type="text" required name="colour" class="form-control" placeholder="Car colour">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Gear </label>
                    <div class="col-sm-10">
                        <input type="text" required name="gear" class="form-control" placeholder="Car Gear">
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Upload Image File 1</label>
                    <div class="col-sm-10">
                    <input name="cover_image" required type="file" class="form-control">
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
                <button type="submit" class="btn btn-primary">Post Now</button>
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

