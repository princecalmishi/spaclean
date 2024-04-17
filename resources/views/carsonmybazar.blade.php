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
                            $bazarpackname = App\Models\Barzars::where('id',$id)->pluck('Barzar_name');
                                     
                            @endphp
                        <h5>Cars In My Barzar :  @foreach($bazarpackname as $bazarpackname){{ $bazarpackname}} @endforeach Bazar</h5>
                        <!-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> -->
                        </div>
                    </div>
                </div>
            <div class="col-lg-4">
            <!-- <div class="page-header-breadcrumb">
            <ul class=" breadcrumb breadcrumb-title">
            <li class="breadcrumb-item">
            <a href="../index.html"><i class="feather icon-home"></i></a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Dashboard CRM</a> </li>
            </ul>
            </div> -->
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
<h5>Below are the Listed Cars</h5>
</div>
<div class="card-block">
<div class="row ui-sortable" id="draggablePanelList">
    @foreach($data as $netsuggest)

<div class="col-lg-12 col-xl-3" style="position: relative; left: 0px; top: 0px;">
<center>
        <div class="card-sub">
            <img style="height:120px; width:150px;" class="card-img-top img-fluid mt-2" src="/storage/images/{{$netsuggest->cover_image}}" alt="Card image cap">
            <div class="card-block">
            <h5 class="card-title">{{$netsuggest->model}} | {{$netsuggest->brand}}</h5>
            <p class="card-text">KES. {{$netsuggest->price}}</p>
            </div>
            <a id="delete"  onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm" href="{{route('deletecar',$netsuggest->id)}}">Delete</a> | <a class="btn btn-primary btn-sm" href="{{route('editcaronbazar',$netsuggest->id)}}">Edit</a>
            <hr>
        </div>
    </center>
    <script type="text/javascript">
        function clicked() {
       if (confirm('Do you want to submit?')) {
        delete.submit();
       } else {
           return false;
       }
        }

    </script>
</div>

@endforeach

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

