@extends('layouts.master')
@section('title', 'Airbus Entry')
@section('main-content')

<main>
    <div class="container-fluid" id="Category">
        <div class="heading-title p-2 my-2">
            <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="">Home</a> > Airbus Entry</span>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card my-2">
                    <div class="card-header d-flex justify-content-between">
                        <div class="table-head">
                            @if(@isset($airbusData))
                                <i class="fas fa-edit"></i> Airbus Entry Update
                            @else
                                <i class="fab fa-bandcamp"></i> Airbus Entry Entry
                            @endif
                        </div>
                        {{-- <a href="" class="btn btn-addnew"> <i class="fa fa-file-alt"></i> view all</a> --}}
                    </div>
                    
                    <div class="card-body table-card-body">
                        <form method="post" action="{{ (@$airbusData) ? route('airbus.update', $airbusData->id) : route('airbus.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label for="title" class="col-sm-3 col-form-label">Airbus Name <span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" value="{{ (@$airbusData) ? @$airbusData->name : old('name') }}" class="form-control form-control-sm shadow-none">
                                            @error('name') <span style="color: red">{{$message}}</span> @enderror
                                        </div>

                                        <label for="title" class="col-sm-3 col-form-label">Airbus Type <span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <select name="airbusType_id" class="form-control form-control-sm shadow-none">
                                                <option value="">-- Select Airbus Type--</option>
                                                @foreach ($airbusType as $item)
                                                <option value="{{ $item->id }}" {{ (@$airbusData->airbusType_id ==  $item->id) ? 'selected' : ''}}>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('airbusType_id') <span style="color: red">{{$message}}</span> @enderror
                                        </div>

                                        <label for="title" class="col-sm-3 col-form-label">Company Name <span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="company_name" value="{{ (@$airbusData) ? @$airbusData->company_name : old('company_name') }}" class="form-control form-control-sm shadow-none">
                                            @error('company_name') <span style="color: red">{{$message}}</span> @enderror
                                        </div>

                                      
        
                                        <label for="inputPassword" class="col-sm-3 col-form-label">Image <span style="color: red;">*</span> </label>
                                        <div class="col-sm-9">
                                            <input type="file" name="image" class="form-control form-control-sm shadow-none" id="image" onchange="mainThambUrl(this)">
                                            @error('image') <span style="color: red">{{$message}}</span> @enderror
                                            <div>
                                                <img src="{{ (!empty(@$airbusData)) ? asset(@$airbusData->image) : asset('images/no.png') }}" id="mainThmb" style="width: 80px; height: 80px; border: 1px solid #999; padding: 2px;" alt="">
                                            </div>
                                        </div>
            
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label for="title" class="col-sm-3 col-form-label">Description <span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <textarea name="description" class="form-control form-control-sm shadow-none" id="editor" rows="4">{{ (@$airbusData) ? @$airbusData->description : old('description') }}</textarea>
                                            @error('description') <span style="color: red">{{$message}}</span> @enderror
                                        </div>

                                      
                                    </div>
                                </div>
                            </div>
                            
                            <hr class="my-2">
                            <div class="clearfix">
                                <div class="text-end m-auto">
                                    <button type="submit" class="btn btn-success shadow-none">{{ (@$airbusData)? 'Update change' : 'Save change' }}</button>
                                </div>
                            </div>
                        </form>  
                    </div>
                </div>  
            </div>
            
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card my-2">
                    <div class="card-header d-flex justify-content-between">
                        <div class="table-head"><i class="fas fa-table me-1"></i>Airbus List</div>
                    </div>
                    <div class="card-body table-card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="datatablesSimple" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Image</th>
                                        <th>Airbus Name</th>
                                        <th>Company Name</th>
                                        <th>Airbus Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($airbus as $item)
                                    <tr class="{{ $item->id }}">
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td><img src="{{ asset($item->image) }}" width="30" height="30" alt=""></td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->company_name }}</td>
                                        <td>{{ $item->airbusType->name }}</td>
                                        <td>
                                            <a href="{{ route('airbus.edit', $item->id) }}" class="btn btn-edit shadow-none"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="{{ route('airbus.delete') }}" id="delete" data-token="{{csrf_token()}}" data-id="{{$item->id}}" class="btn btn-delete shadow-none"><i class="fa fa-trash"></i></a>
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


