@extends('publicPage.layout.nav')
@section('title')
    Contact mes
@endsection
@section('contant')

<div class="container-fluid mt-6">
    <div class="container-fluid float-start col-lg-6 ps-5 txt-dark">
        <form  action="{{route('storeContact')}}" method="POST">
        @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nmae</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="" value = "{{old('name')}}">
                <span class="text-danger">
                     @error('name') {{$message}} @enderror
                 </span>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value = "{{old('email')}}">
                <div id="emailHelp" class="form-text txt-ming">We'll never share your email with anyone else.</div>
                <span class="text-danger">
                     @error('email') {{$message}} @enderror
                 </span>
            </div>
            <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" name="subject" class="form-control" id="subject" aria-describedby="" value = "{{old('subject')}}">
                <span class="text-danger">
                    @error('subject') {{$message}} @enderror
                </span>
            </div>
            <div class="mb-3">
                <label for="messages" class="form-label">Comment or Messag</label>
                <textarea type="text" name="messages" class="form-control" id="messages" aria-describedby="">{{old('messages')}}</textarea>
                <span class="text-danger">
                     @error('messages') {{$message}} @enderror
                </span>    
            </div>
            <button type="submit" class="btn my-btn">Submit</button>
        </form>
    </div>
    
    <div class="card text-bg-light float-end me-5 mt-4 col-lg-4 col-10" >
        <div class="card-header bg-middle-ming fs-5 ps-2">Contact me: </div>
        <div class="card-body bg-middle-light">
            @foreach($contactInfo as $info)
                @foreach($info['contact_details'] as $details)
                     <p class="card-text txt-dark">
                        <i class="{{$details['icon']}} mx-2"></i>
                        {{$details['details']}}</p>
                @endforeach
            @endforeach
        </div>
    </div>
</div>
@endsection