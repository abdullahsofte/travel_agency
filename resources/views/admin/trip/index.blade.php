@extends('layouts.master')
@section('title', 'Trip Entry')
@section('main-content')

<main>
    <div class="container-fluid" id="Category">
        <div class="heading-title p-2 my-2">
            <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="">Home</a> > Trip</span>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card my-2">
                    <div class="card-header d-flex justify-content-between">
                        <div class="table-head">
                            @if(@isset($tripData))
                                <i class="fas fa-edit"></i> Trip Update
                            @else
                                <i class="fab fa-bandcamp"></i> Trip Entry
                            @endif
                        </div>
                        {{-- <a href="" class="btn btn-addnew"> <i class="fa fa-file-alt"></i> view all</a> --}}
                    </div>
                    
                    <div class="card-body table-card-body">
                        <form method="post" action="{{ (@$tripData) ? route('trip.update', $tripData->id) : route('trip.store') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{$booking->id}}">
                            <input type="hidden" value="{{$booking->customer_id}}">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group row">

                                        <label for="title" class="col-sm-3 col-form-label">Airbus Type <span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <select name="airbusType_id" id="airbusType_id" class="form-control form-control-sm shadow-none">
                                                <option value="">--Select Airbus Type--</option>
                                                @foreach ($airbusType as $item)
                                                <option value="{{ $item->id }}" {{ (@$tripData->airbusType_id ==  $item->id) ? 'selected' : ''}}>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('airbusType_id') <span style="color: red">{{$message}}</span> @enderror
                                        </div>
                                        <label for="title" class="col-sm-3 col-form-label">Airbus <span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <select name="airbus_id" id="airbus_id" class="form-control form-control-sm shadow-none">
                                                <option>--Select Airbus--</option>
                                            </select>
                                            @error('airbus_id') <span style="color: red">{{$message}}</span> @enderror
                                        </div>

                                      

                                        <label for="title" class="col-sm-3 col-form-label">Start Date <span style="color: red;">*</span></label>
                                        <div class="col-sm-3">
                                            <input type="date" name="start_date" value="{{ @$tripData->start_date ? @$tripData->start_time : date('Y-m-d') }}" class="form-control form-control-sm shadow-none">
                                            @error('start_date') <span style="color: red">{{$message}}</span> @enderror
                                        </div>


                                        <label for="title" class="col-sm-2 col-form-label">Start Time <span style="color: red;">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="time" name="start_time" value="{{ @$tripData->start_time ? @$tripData->start_time : date('H:i:s') }}" class="form-control form-control-sm shadow-none">
                                            @error('start_time') <span style="color: red">{{$message}}</span> @enderror
                                        </div>

                                        <label for="price" class="col-sm-3 col-form-label">Price <span style="color: red;">*</span></label>
                                        <div class="col-sm-3">
                                            <input type="number" name="price" value="{{ (@$tripData) ? @$tripData->price : old('price') }}" class="form-control form-control-sm shadow-none">
                                            @error('price') <span style="color: red">{{$message}}</span> @enderror
                                        </div>
                                        <label for="discount" class="col-sm-2 col-form-label">Discount</label>
                                        <div class="col-sm-4">
                                            <input type="number" name="discount" value="{{ (@$tripData) ? @$tripData->discount : old('discount') }}" class="form-control form-control-sm shadow-none" placeholder="0%" max="99">
                                            @error('discount') <span style="color: red">{{$message}}</span> @enderror
                                        </div>

                                       
                                            
                                        <label for="agent_point_amount" class="col-sm-3 col-form-label">Agent Point</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="agent_point_amount" value="{{ (@$tripData) ? @$tripData->agent_point_amount : old('agent_point_amount') }}" class="form-control form-control-sm shadow-none">
                                            @error('agent_point_amount') <span style="color: red">{{$message}}</span> @enderror
                                       

                                        <label for="child_price" style="display: none" class="col-sm-3 col-form-label">Clind Price </label>
                                        <div class="col-sm-9" style="display: none" >
                                            <input type="text" name="child_price" value="0" class="form-control form-control-sm shadow-none">
                                            @error('child_price') <span style="color: red">{{$message}}</span> @enderror
                                        </div>
        
                                        {{-- <label  class="col-sm-3 col-form-label">Image <span style="color: red;">*</span> </label>
                                        <div class="col-sm-7">
                                            <input type="file" name="image" class="form-control form-control-sm shadow-none" id="image" onchange="mainThambUrl(this)">
                                            @error('image') <span style="color: red">{{$message}}</span> @enderror
                                        </div>
                                        <div class="col-sm-2">
                                            <img src="{{ (!empty(@$tripData)) ? asset(@$tripData->image) : asset('images/no.png') }}" id="mainThmb" style="width: 80px; height: 80px; border: 1px solid #999; padding: 2px;" alt="">
                                        </div> --}}
            
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        
                                        <label for="title" class="col-sm-3 col-form-label">Trip Class <span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <select name="class_id" class="form-control form-control-sm shadow-none">
                                                <option value="">--Select Trip Class--</option>
                                                @foreach ($tripClass as $item)
                                                <option value="{{ $item->id }}" {{ (@$tripData->class_id ==  $item->id) ? 'selected' : ''}}>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('class_id') <span style="color: red">{{$message}}</span> @enderror
                                        </div>
                                        
                                        <label for="title" class="col-sm-3 col-form-label">Description </label>
                                        <div class="col-sm-9">
                                            <textarea name="description" class="form-control form-control-sm shadow-none" id="editor" rows="4">{{ (@$tripData) ? @$tripData->description : old('description') }}</textarea>
                                            @error('description') <span style="color: red">{{$message}}</span> @enderror
                                        </div>

                                    
                                    </div>
                                </div>
                            </div>
                            
                            <hr class="my-2">
                            <div class="clearfix">
                                <div class="text-end m-auto">
                                    <button type="submit" class="btn btn-success shadow-none">{{ (@$tripData)? 'Update change' : 'Save change' }}</button>
                                </div>
                            </div>
                        </form>  
                    </div>
                </div>  
            </div>
        </div>
    </div>
</main>
@endsection

@push('scripts')
<script>
    function mainThambUrl(input){
      if (input.files && input.files[0]) {
        var reader    = new FileReader();
        reader.onload = function(e){
            $('#mainThmb').attr('src',e.target.result).width(80).height(80);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
</script>

<script>
    CKEDITOR.replace( 'editor' );

  
</script>

<script>
    $(document).ready(function() {
        $("select[name='airbusType_id']").on('change', function() {
            var airbusType_id = $(this).val();
            $.ajax({
                url: "{{ url('get-airbus') }}/" + airbusType_id,
                dataType: "json",
                method: "GET",
                success: function(data) {
                    $('#airbus_id').empty();
                    $.each(data, function(key, value) {
                        $('#airbus_id').append('<option value="' + value.id +
                            '">' + value.name + '</option>');
                    });
                }
            });

        });
    });
</script>
@endpush


