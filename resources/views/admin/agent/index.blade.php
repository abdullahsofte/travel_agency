@extends('layouts.master')
@section('title', 'Agent Entry')
@section('main-content')

<main>
    <div class="container-fluid" id="Category">
        <div class="heading-title p-2 my-2">
            <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="">Home</a> > Agent</span>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card my-2">
                    <div class="card-header d-flex justify-content-between">
                        <div class="table-head">
                            @if(@isset($agentata))
                                <i class="fas fa-edit"></i> Agent Update
                            @else
                                <i class="fab fa-bandcamp"></i> Agent Entry
                            @endif
                        </div>
                        {{-- <a href="" class="btn btn-addnew"> <i class="fa fa-file-alt"></i> view all</a> --}}
                    </div>
                    
                    <div class="card-body table-card-body">
                        <form method="post" action="{{ (@$agentata) ? route('updateAgent', $agentata->id) : route('storeAgent') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group row">

                                        <label for="title" class="col-sm-3 col-form-label">Name <span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" value="{{ (@$agentata) ? @$agentata->name : old('name') }}" class="form-control form-control-sm shadow-none">
                                            @error('name') <span style="color: red">{{$message}}</span> @enderror
                                        </div>

                                        <label for="title" class="col-sm-3 col-form-label">Phone <span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="phone" value="{{ (@$agentata) ? @$agentata->phone : old('phone') }}" class="form-control form-control-sm shadow-none">
                                            @error('phone') <span style="color: red">{{$message}}</span> @enderror
                                        </div>

                                        <label for="email" class="col-sm-3 col-form-label">Email <span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="email" name="email" value="{{ (@$agentata) ? @$agentata->email : old('email') }}" class="form-control form-control-sm shadow-none">
                                            @error('email') <span style="color: red">{{$message}}</span> @enderror
                                        </div>

                                        <label for="title" class="col-sm-3 col-form-label">NID Number <span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="nid_number" value="{{ (@$agentata) ? @$agentata->nid_number : old('nid_number') }}" class="form-control form-control-sm shadow-none">
                                            @error('nid_number') <span style="color: red">{{$message}}</span> @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        
                                        <label for="username" class="col-sm-3 col-form-label">Username <span style="color: red;">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="username" value="{{ (@$agentata) ? @$agentata->username : old('username') }}" class="form-control form-control-sm shadow-none">
                                            @error('username') <span style="color: red">{{$message}}</span> @enderror
                                        </div>
                                        <label for="address" class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="address" value="{{ (@$agentata) ? @$agentata->address : old('address') }}" class="form-control form-control-sm shadow-none">
                                            @error('address') <span style="color: red">{{$message}}</span> @enderror
                                        </div>
                                        <label for="agent_point" class="col-sm-3 col-form-label">Per Point</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="agent_point" value="{{ (@$agentata) ? @$agentata->agent_point : old('agent_point') }}" class="form-control form-control-sm shadow-none">
                                            @error('agent_point') <span style="color: red">{{$message}}</span> @enderror
                                        </div>
                                        <label for="password" class="col-sm-3 col-form-label d-none">Password <span style="color: red;">*</span></label>
                                        <div class="col-sm-9 d-none">
                                            <input type="password" name="password" value="1" class="form-control form-control-sm shadow-none">
                                            @error('password') <span style="color: red">{{$message}}</span> @enderror
                                        </div>
                                        <label for="password" class="col-sm-3 col-form-label d-none">Confirm Password <span style="color: red;">*</span></label>
                                        <div class="col-sm-9 d-none">
                                            <input type="password" name="cpassword" value="1" class="form-control form-control-sm shadow-none">
                                            @error('cpassword') <span style="color: red">{{$message}}</span> @enderror
                                        </div>
                                        <label  class="col-sm-3 col-form-label">Image <span style="color: red;">*</span> </label>
                                        <div class="col-sm-7">
                                            <input type="file" name="profile_picture" class="form-control form-control-sm shadow-none" id="image" onchange="mainThambUrl(this)">
                                            @error('profile_picture') <span style="color: red">{{$message}}</span> @enderror
                                        </div>
                                        <div class="col-sm-2">
                                            <img src="{{ (!empty(@$agentata)) ? asset(@$agentata->profile_picture) : asset('images/no.png') }}" id="mainThmb" style="width: 80px; height: 80px; border: 1px solid #999; padding: 2px;" alt="">
                                        </div>


                                  
                                    </div>
                                </div>
                            </div>
                            
                            <hr class="my-2">
                            <div class="clearfix">
                                <div class="text-end m-auto">
                                    <button type="submit" class="btn btn-success shadow-none">{{ (@$agentata)? 'Update change' : 'Save change' }}</button>
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
                        <div class="table-head"><i class="fas fa-table me-1"></i> Agent List</div>
                    </div>
                    <div class="card-body table-card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="datatablesSimple" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($agent as $item)
                                    <tr class="{{ $item->id }}">
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td><img src="{{ asset(@$item->profile_picture) }}" width="30" height="30" alt=""></td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>
                                            @if ($item->status == 'a')
                                                <span class="badge bg-info">Active</span>
                                            @else
                                                <span class="badge bg-warning">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->status == 'a')
                                            <a href="{{ route('agent.inactive', $item->id) }}"
                                                title="Inactive" class="btn btn-delete shadow-none"><i
                                                        class="fas fa-thumbs-down"></i></a>
                                            @else
                                                <a href="{{ route('agent.active', $item->id) }}" title="Active"
                                                    class="btn btn-edit shadow-none"><i
                                                        class="fas fa-thumbs-up"></i></a>
                                            @endif

                                            <a href="{{ route('editAgent', $item->id) }}" class="btn btn-edit shadow-none"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="{{ route('deleteAgent') }}" id="delete" data-token="{{csrf_token()}}" data-id="{{$item->id}}" class="btn btn-delete shadow-none"><i class="fa fa-trash"></i></a>
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


@endpush


