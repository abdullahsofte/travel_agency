@extends('layouts.master')
@section('title', 'Traveller Page')
@section('main-content')

<main>
    <div class="container-fluid" id="Category">
        <div class="heading-title p-2 my-2">
            <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="">Home</a> > Traveller</span>
        </div>
        <div class="row">
            <div class="col-lg-5">
                <div class="card my-2">
                    <div class="card-header d-flex justify-content-between">
                        <div class="table-head">
                            @if(@isset($travellerData))
                                <i class="fas fa-edit"></i> Traveller Update
                            @else
                                <i class="fab fa-bandcamp"></i> Traveller Entry
                            @endif
                        </div>
                        {{-- <a href="" class="btn btn-addnew"> <i class="fa fa-file-alt"></i> view all</a> --}}
                    </div>
                    
                    <div class="card-body table-card-body">
                        <form method="post" action="{{ (@$travellerData) ? route('traveller.update', $travellerData->id) : route('traveller.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" value="{{ (@$travellerData) ? @$travellerData->name : old('name') }}" class="form-control form-control-sm shadow-none">
                                    @error('name') <span style="color: red">{{$message}}</span> @enderror
                                </div>
                                <label for="" class="col-sm-3 col-form-label">Designation</label>
                                <div class="col-sm-9">
                                    <input type="text" name="designation" value="{{ (@$travellerData) ? @$travellerData->designation : old('designation') }}" class="form-control form-control-sm shadow-none">
                                    @error('designation') <span style="color: red">{{$message}}</span> @enderror
                                </div>

                                <label for="title" class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <textarea name="description" class="form-control form-control-sm shadow-none" id="editor" rows="4">{{ (@$travellerData) ? @$travellerData->description : old('description') }}</textarea>
                                    @error('description') <span style="color: red">{{$message}}</span> @enderror
                                </div>

                                <label for="inputPassword" class="col-sm-3 col-form-label">Image </label>
                                <div class="col-sm-9 mt-2">
                                    <input type="file" name="image" class="form-control form-control-sm shadow-none" id="image" onchange="mainThambUrl(this)">
                                    @error('image') <span style="color: red">{{$message}}</span> @enderror
                                    <div>
                                        <img src="{{ (!empty(@$travellerData)) ? asset(@$travellerData->image) : asset('images/no.png') }}" id="mainThmb" style="width: 80px; height: 80px; border: 1px solid #999; padding: 2px;" alt="">
                                    </div>
                                </div>
    
                            </div>

                            
                            <hr class="my-2">
                            <div class="clearfix">
                                <div class="text-end m-auto">
                                    <button type="reset" class="btn btn-danger shadow-none">Reset</button>
                                    <button type="submit" class="btn btn-success shadow-none">{{ (@$travellerData)? 'Update change' : 'Save change' }}</button>
                                </div>
                            </div>
                        </form>  
                    </div>
                </div>  
            </div>
            <div class="col-lg-7">
                <div class="card my-2">
                    <div class="card-header d-flex justify-content-between">
                        <div class="table-head"><i class="fas fa-table me-1"></i> Traveller List</div>
                        <div class="float-right">
                          
                        </div>
                    </div>
                    <div class="card-body table-card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="datatablesSimple" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($traveller as $item)
                                    <tr class="{{ $item->id }}">
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td><img src="{{ asset($item->image) }}" width="30" height="30" alt=""></td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->designation }}</td>
                                        <td>
                                            <a href="{{ route('traveller.edit', $item->id) }}" class="btn btn-edit shadow-none"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="{{ route('traveller.delete') }}" id="delete" data-token="{{csrf_token()}}" data-id="{{$item->id}}" class="btn btn-delete shadow-none"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
@endpush


