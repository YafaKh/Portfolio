@extends('publicPage.layout.nav')
@section('title')
    Aboute mes
@endsection
@section('contant')
<div class="d-flex justify-content-center min-vh-100" >
<img src="{{asset('assets/img/about-bg.png')}}" class="min-vh-100 " >
<div class="container txt-light  position-absolute mt-6"  >
      <div class="justify-content-center row txt-shadow">
        <div class="col-lg-9 text-center">
          <h1 class="display-2 txt-mid fw-semibold ">I'm Yafa Khateeb,</h1>
          <h3 class="p-4 "> a passionate freelancer bringing you programming and design from the future. I am experienced in developing web and desktop applications including full front end design. This includes brand identity, graphics and illustrations.</h3>
        </div>
      </div>
</div>
</div>

@endsection