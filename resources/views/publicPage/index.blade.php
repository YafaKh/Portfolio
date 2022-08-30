@extends('publicPage.layout.nav')
@section('title')
    Yafa Khateeb
@endsection
@section('contant')
<div class="d-flex justify-content-center min-vh-100 " >
<img src="{{asset('assets/img/bg.png')}}" class="min-vh-100 " >
<!--header-->
<div class="txt-light position-absolute mt-6"  >
      <div class="justify-content-center row ">
        <div class="col-lg-9 text-center">
          <h1 class="display-2 ">I'm <img src="{{asset('assets/img/y.png')}}" width="50" height="70"><span class="fw-semibold">afa Khateeb,</span></h1>
          <h1 class="display-4 ">A professional web programmer</h1>
          <h4 class="px-3 m-3 txt-shadow" >I help you to create your or your comoany's website, from the beginning until you become online!</h4>
          <a href="{{route('contactMe')}}" class="h4 fw-semibold rounded mt-4 bg-dark-ming px-2 shadow txt-light">Available for hire</a>
        </div>
      </div>
</div>
</div>

<!--my projects-->

<div class="container mt-5 row ps-5" id="projects" >
    <h1 class="mb-5 txt-ming fw-semibold">My projects:</h1>
@foreach($projects as $project)
        <div  class=" float-start mb-5 ">
            <div class="card proj shadow " >
                <div class="row g-0 ">
                    <div class="col-md-4 ">
                    <img src="{{asset('assets/img/'.$project->screenshot)}}" class="img-fluid rounded-start h-100" >
                    </div>
                
                        <div class="col-md-8">
                            <div class="card-body">
                                <h3 class="card-title">
                                    <a class=" txt-light text-decoration-underline" href="{{$project['link']}}" target="_blank">{{$project['title']}}</a>
                                </h3>
                                <p class="card-text txt-light fs-5">{{$project['description']}}</p>
                                    @foreach($project['skills'] as $skill) 
                                        <p class="float-start px-2 pb-1 px-1 shadow txt-shadow rounded"><small class="txt-mid" >{{$skill['name']}}</small></p>
                                    @endforeach
                            </div>
                        </div> 
                </div>
            </div>
        </div>
@endforeach
</div>
@endsection