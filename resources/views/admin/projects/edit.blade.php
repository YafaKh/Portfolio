@extends('admin.layout.adminLayout')
@section('title')  Edit Project @endsection
@section('cont')
<div class="card-body p-0 col-lg-12">
    <div class="row ">
        <div >
            <div class="p-5">
                <div >
                    <h1 class="h4 text-gray-900 mb-4">Edit Project with ID:  {{$projects->id}}</h1>
                </div>
                <form enctype="multipart/form-data" action="{{route('updateProject', [$projects->id])}}" method="POST" >
                @csrf
                    <div class="form-group row">
                    <label class="text-dark ms-2" for="title">Titel</label>
                        <div class="col-sm-6">
                            <input type="text" name="title" class="form-control "  placeholder="Project titel" value = "{{$projects['title']}}">
                            <span class="text-danger">
                            @error('title') {{$message}} @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="text-dark ms-2" for="description">Description</label>
                        <div class="col-sm-6">
                        <textarea class="form-control" name="description" col-12 placeholder="Description"  id="floatingTextarea">{{$projects['description']}}</textarea>
                            <span class="text-danger">
                            @error('description') {{$message}} @enderror
                            </span>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="text-dark ms-2" for="name">Skills</label>
                        <label class="text-dark ms-2 blockquote-footer" >You will need to hold down the ctrl key to select more than one option in the list</label>
                        <div class="col-sm-6">
                            <select multiple class="form-select" name="skills[]" aria-label="Default select example">
                                @foreach ($skills as $skill)
                                    <option value="{{ $skill->id }}" >{{ $skill['name'] }}</option>
                                @endforeach                  
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                    <label class="text-dark ms-2" for="link">Link</label>
                        <div class="col-sm-6">
                            <input type="text" name="link" class="form-control "  placeholder="Project link" value = "{{$projects['link']}}">
                            <span class="text-danger">
                            @error('link') {{$message}} @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                    <label class="text-dark ms-2" for="prevScreen">Your sceenshot</label>
                        <div class="col-sm-6">
                            <input id="prevScreen" type="text" name="prevScreen" class="form-control "  placeholder="Project link" value = "{{$projects['screenshot']}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row bg-grey-lighter col-6 ">
                        <label class="text-dark ms-2 blockquote-footer" >If you want to replace this screenshot, choose a new one.</label>
                        <label class="w-44 flex flex-col items-center px-2 py-3 bg-white-rounded-lg tracking-wide uppercase border border-blue cursor-pointer ">
                            <span class=" text-base leading-normal">
                                Select an image
                            </span>
                            <input 
                                type="file"
                                name="screenshot"
                                class="hidden mt-2">
                        </label>
                        <span class="text-danger">
                            @error('screenshot') {{$message}} @enderror
                        </span>
                    </div> 
                    <div class="form-group row">    
                        <div class="form-check form-switch mt-1 "  >
                            <label class="form-check-label  text-dark" >Visibility:</label>
                            @if ($projects['visibility'] === 1)
                                <input  class="form-check-input ms-4" name="visibility"  type="checkbox" role="switch" id="flexSwitchCheckChecked" checked> 
                            @else <input class="form-check-input  ms-4" name="visibility" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                            @endif 
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block col-3 mt-4">Edit project</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection