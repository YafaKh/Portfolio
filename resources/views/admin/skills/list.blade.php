@extends('admin.layout.adminLayout')
@section('cont')

@section('title')
    All Skills
@endsection</title>
<div class="card shadow mb-4 col-12">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Skills </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>level</th>
                        <th>created_at</th>
                        <th>updated_at</th>
                        <th>edit</th>
                        <th>delete</th>
                        <th>hide/show</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>level</th>
                        <th>created at</th>
                        <th>updated at</th>
                        <th>edit</th>
                        <th>delete</th>
                        <th>hide/show</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($skills as $Skill)
                    <tr>
                        <td>{{$Skill['id']}}</td>
                        <td>{{$Skill['name']}}</td>
                        <td>{{$Skill['level']}}</td>
                        <td>{{$Skill['created_at']}}</td>
                        <td>{{$Skill['updated_at']}}</td>
                        <td><a href="{{route('editSkill', [$Skill->id], [$Skill->name])}}" class="btn ">
                        <i class="bi bi-pencil"></i></a></td>
                        <td>
                            <button type="button" id="deleteBtn{{$Skill->id}}" class="delBtn" value="{{$Skill->id}}" data-bs-toggle="modal" data-bs-target="#deleteModal" >
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </td>
                        <td> 
                            <form method="POST" action="{{route('changeSkillVisabiliy', [$Skill->id])}}">
                                @csrf
                                <div class="form-check form-switch ms-5 mt-2">
                                    @if ($Skill['visibility'] === 1)
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
            
            <a href="{{route('addSkill')}}" class="btn btn-secondary btn-icon-split"><span class="text">add</span></a>
        </div>
</div>
@endsection
@section('script')
<script>
    const skill = document.querySelectorAll(".delBtn");
	for (var i = 0; i < skill.length; i++) {
        skill[i].addEventListener("click",
    function (e)
   {
    e.preventDefault();
    const skillId= this.value;
    window.localStorage.setItem('id',skillId);
   });
    }
   function del()
   {
   var url = '{{ route("deleteSkill", ":id") }}';
url = url.replace(':id', localStorage.getItem('id'));

window.location.href=url;
}
 </script>
@endsection