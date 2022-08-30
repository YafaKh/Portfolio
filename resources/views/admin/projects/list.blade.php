@extends('admin.layout.adminLayout')
@section('cont')

@section('title')
    All Projects
@endsection
<div class="card shadow mb-4 col-12">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Projects </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>title</th>
                        <th>skills</th>
                        <th>link</th>
                        <th>screenshot</th>
                        <th>dates</th>
                        <th>edit</th>
                        <th>delete</th>
                        <th>hide/show</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>id</th>
                        <th>title</th>
                        <th>skills</th>
                        <th>link</th>
                        <th>screenshot</th>
                        <th>dates</th>
                        <th>edit</th>
                        <th>delete</th>
                        <th>hide/show</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($projects as $project)
                    <tr>
                        <td>{{$project['id']}}</td>
                        <td>{{$project['title']}}</td>
                        <td>
                            <ul>
                                @foreach($project->skills as $skill)
                                    <li>{{$skill->name}}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>{{$project['link']}}</td>
                        <td>{{$project['screenshot']}}</td>
                        <td><p>Create: {{$project['created_at']}}</p><p> Update: {{$project['updated_at']}}</p></td>
                        <td><a href="{{route('editProject', [$project->id])}}" class="btn ">
                        <i class="bi bi-pencil"></i></a></td>
                        <td>
                            
                            <a onClick="confirm('are you sure?')"
                            href="{{route('deleteProject', [$project->id])}}"
                            class="btn "  >
                             <i class="bi bi-trash-fill"></i>
                            </a>
                        </td>
                        <td> 
                            <form method="POST" action="{{route('changeProjectVisabiliy', [$project->id])}}">
                                @csrf
                                <div class="form-check form-switch ms-5 mt-2">
                                    @if ($project['visibility'] === 1)
                                        <input  class="form-check-input" name="visibility" onChange="this.form.submit()" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked> 
                                    @else <input class="form-check-input" name="visibility" onChange="this.form.submit()" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                                    @endif 
                                </div>
                            </form>   
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{route('addProject')}}" class="btn btn-secondary btn-icon-split"><span class="text">add</span></a>   
        </div>
</div>
@endsection
