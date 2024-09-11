@extends('layouts.master')
@section('title', 'Benefit Update')
@section('main-content')

<main>
    <div class="container-fluid" id="Category">
        <div class="heading-title p-2 my-2">
            <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="">Home</a> > Benefit</span>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card my-2">
                    <div class="card-header d-flex justify-content-between">
                        <div class="table-head">
                            <i class="fas fa-edit"></i> Benefit Update
                        </div>
                    </div>
                    
                    <div class="card-body table-card-body">
                        <div class="row">
                            <form method="post" action="{{ route('benefit.update') }}" enctype="multipart/form-data">
                                
                                @csrf
                                <input type="hidden" name="id" value="{{$benefit->id}}">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group row">
                                            <label for="title_one" class="col-sm-2 col-form-label mt-1">Title One</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="title_one" value="{{ $benefit->title_one }}" class="form-control form-control-sm shadow-none mt-1">
                                                @error('title_one') <span style="color: red">{{$message}}</span> @enderror
                                            </div>
                                            <label class="col-sm-2 col-form-label">Description</label>
                                            <div class="col-sm-10">
                                                <textarea name="description" class="form-control form-control-sm shadow-none" id="editor" rows="4">{{ $benefit->description }}</textarea>
                                                @error('description') <span style="color: red">{{$message}}</span> @enderror
                                            </div>
                                            <label for="title_two" class="col-sm-2 col-form-label mt-1">Title Two</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="title_two" value="{{ $benefit->title_two }}" class="form-control form-control-sm shadow-none mt-1">
                                                @error('title_two') <span style="color: red">{{$message}}</span> @enderror
                                            </div>
                                            <label class="col-sm-2 col-form-label">Description Two</label>
                                            <div class="col-sm-10">
                                                <textarea name="description_two" class="form-control form-control-sm shadow-none" id="editor1" rows="4">{{ $benefit->description_two }}</textarea>
                                                @error('description_two') <span style="color: red">{{$message}}</span> @enderror
                                            </div>
            
                                            <label for="title_three" class="col-sm-2 col-form-label mt-1">Title Three</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="title_three" value="{{ $benefit->title_three }}" class="form-control form-control-sm shadow-none mt-1">
                                                @error('title_three') <span style="color: red">{{$message}}</span> @enderror
                                            </div>
                                            <label class="col-sm-2 col-form-label">Description Three</label>
                                            <div class="col-sm-10">
                                                <textarea name="description_three" class="form-control form-control-sm shadow-none" id="editor2" rows="4">{{ $benefit->description_three }}</textarea>
                                                @error('description_three') <span style="color: red">{{$message}}</span> @enderror
                                            </div>

                                            <label for="title_four" class="col-sm-2 col-form-label mt-1">Title Four</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="title_four" value="{{ $benefit->title_four }}" class="form-control form-control-sm shadow-none mt-1">
                                                @error('title_four') <span style="color: red">{{$message}}</span> @enderror
                                            </div>
                                            <label class="col-sm-2 col-form-label">Description Three</label>
                                            <div class="col-sm-10">
                                                <textarea name="description_four" class="form-control form-control-sm shadow-none" id="editor3" rows="4">{{ $benefit->description_four }}</textarea>
                                                @error('description_four') <span style="color: red">{{$message}}</span> @enderror
                                            </div>
            
                                            <label  class="col-sm-2 col-form-label">Image</label>
                                            <div class="col-sm-5">
                                                <input type="file" name="image" class="form-control shadow-none mt-1" id="image" onchange="mainThambUrl(this)">
                                                @error('image') <span style="color: red">{{$message}}</span> @enderror
                                                
                                                <div class="">
                                                    <img src="{{ (!empty($benefit)) ? asset($benefit->image) : asset('images/no.png') }}" id="mainThmb" style="width: 100px; height: 100px; border: 1px solid #999; padding: 2px;" alt="">
                                                </div>
                                            </div>
                
                                        </div>
                                    </div>
                                    
                                    {{-- <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Description</label>
                                            <div class="col-sm-9">
                                                <textarea name="description" class="form-control form-control-sm shadow-none" id="editor" rows="4">{{ $benefit->description }}</textarea>
                                                @error('description') <span style="color: red">{{$message}}</span> @enderror
                                            </div>
                                            
                                        </div>
                                    </div> --}}
                                </div>
                                <hr class="my-2">
                                <div class="clearfix">
                                    <div class="text-end m-auto">
                                        <button type="submit" class="btn btn-success shadow-none">Update</button>
                                    </div>
                                </div>
                            </form> 
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
    CKEDITOR.replace( 'editor1' );
    CKEDITOR.replace( 'editor2' );
    CKEDITOR.replace( 'editor3' );
</script>
@endpush


