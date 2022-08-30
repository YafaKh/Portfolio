@extends('admin.layout.adminLayout')
@section('title')  Add contact @endsection
@section('cont')
<div class="card-body p-0">
    <div class="row">
        <div class="col-lg-7">
            <div class="p-5">
                <div >
                    <h1 class="h4 text-gray-900 mb-4">Add new contact!</h1>
                </div>
                <form action="{{route('insertContactInfo')}}" method="POST" >
                    @csrf           
                    <div class="form-group row">
                    <label class="text-dark ms-2" for="title">Title</label>
                        <div class="col-sm-6">
                            <input type="text" name="title" class="form-control " id="inputTitle"  placeholder="Title" value = "{{old('title')}}">
                            <span class="text-danger">
                            @error('title') {{$message}} @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                    <label class="text-dark ms-2" for="contact_details">The contact</label>
                        <div class="col-sm-6">
                            <input type="text" name="contact_details" class="form-control "  placeholder="The contact" value = "{{old('contact_details')}}">
                            <span class="text-danger">
                            @error('contact_details') {{$message}} @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                    <label class="text-dark ms-2" for="icon">The icon class</label>
                        <div class="col-sm-6">
                            <input type="text" name="icon" class="form-control "  placeholder="The icon class" value = "{{old('icon')}}">
                            <span class="text-danger">
                            @error('icon') {{$message}} @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">    
                        <div class="form-check form-switch mt-1 "  >
                            <label class="form-check-label  text-dark" >Visibility:</label>
                            <input  class="form-check-input ms-4" name="visibility"  type="checkbox" role="switch" id="flexSwitchCheckChecked" checked> 
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block col-3 mt-4">Add contact</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
