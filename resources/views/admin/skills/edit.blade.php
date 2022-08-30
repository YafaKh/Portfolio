@extends('admin.layout.adminLayout')
@section('title')  Edit skill @endsection
@section('cont')
<div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row">
        <div class="col-lg-7">
            <div class="p-5">
                <div >
                    <h1 class="h4 text-gray-900 mb-4">Edit skill with ID:  {{$skills->id}}</h1>
                </div>
                <form action="{{route('updateSkill', [$skills->id,$skills->name])}}" method="POST" >
                    @csrf
                    <div class="form-group row">
                        <label class="text-dark ms-2" for="name">Skill name</label>
                        <div class="col-sm-6">
                            <input type="text" name="name" class="form-control "  placeholder="Skill name" value="{{$skills['name']}}">
                            <span class="text-danger">
                            @error('name') {{$message}} @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="text-dark ms-2" for="level">Level</label>
                        <div class="col-sm-6">
                            <select class="form-select" name="level" aria-label="Default select example" >
                                    @foreach ($options as $option)
                                    @if ($option !== $skills['level'])
                                        <option value="{{ $option }}" >{{ $option }}</option>
                                    @else 
                                        <option value="{{ $option }}" selected="selected">{{ $option }}</option>
                                    @endif
                                    @endforeach 
                            </select>
                            <span class="text-danger">
                                @error('level') {{$message}} @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">    
                        <div class="form-check form-switch mt-1 "  >
                            <label class="form-check-label  text-dark" >visibility:</label>
                            @if ($skills['visibility'] === 1)
                                <input  class="form-check-input ms-4" name="visibility"  type="checkbox" role="switch" id="flexSwitchCheckChecked" checked> 
                            @else <input class="form-check-input  ms-4" name="visibility" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                            @endif 
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block col-3 mt-4">Edit skill</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection