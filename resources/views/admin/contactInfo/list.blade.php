@extends('admin.layout.adminLayout')
@section('cont')

@section('title')
    Contact informations
@endsection
<div class="card shadow mb-4 col-12">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Contact informations </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table" id="dataTable" width="100%" >
                    @foreach($contatInfo as $info)
                    <tr>
                       <td>  {{$info['title']}}:  </td>
                        <td><table >
                            @foreach($info['contact_details'] as $details)
                                <tr ><td class="border border-0 mt-2">
                                    <i class="{{$details['icon']}}"></i> 
                                     {{$details['details']}}
                                </td></tr>
                            @endforeach
                        </table></td>
                        <td><table >
                            @foreach($info['contact_details'] as $details)
                                <tr >   
                                    <td class="border border-0"><a href="{{route('editContactInfo',  [$details['id']])}}" class="btn ">
                                        <i class="bi bi-pencil"></i></a>
                                    </td>
                                    <td class="border border-0">
                                        <a onClick="confirm('are you sure?')"
                                        href="{{route('deleteContactInfo', [$details->id])}}"
                                        class="btn "  >
                                        <i class="bi bi-trash-fill"></i>
                                        </a>
                                    </td>
                                    <td class="border border-0"> 
                                        <form method="POST" action="{{route('changeVisabiliy',[$details['id']])}}">
                                            @csrf
                                            
                                            <div class="form-check form-switch ms-5 mt-2">
                                                @if ($details['visibility']=== 1)
                                                    <input  class="form-check-input" name="visibility" onChange="this.form.submit()" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked> 
                                                @else <input class="form-check-input" name="visibility" onChange="this.form.submit()" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                                                @endif 
                                            </div>
                                        </form>   
                                    </td>
                                </tr>
                            @endforeach
                        </table></td>
                    @endforeach

            </table>
            
            <a href="{{route('addContactInfo')}}"  class="btn btn-secondary btn-icon-split"><span class="text">add</span></a>
        </div>
</div>
@endsection