@extends('main.main')

@section('header')
    @include('partial.navbar')
@endsection

@section('body')
<div class="container text-left">
    <div class="row">
        <div class="col-sm-2"></div>
      <div class="col-sm-8">
        <div class="container">
          <h1>Login</h1>
          @if(session('error'))
              <div class="alert alert-danger">{{ session('error') }}</div>
          @endif
            <form action="{{ route('test') }}" method="POST">
                @csrf
                <div>
                  <label for="email">Email</label>
                  <input id="email" class = "form-control" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                  @error('email')
                      <span>{{ $message }}</span>
                  @enderror
              </div>
      
              <div>
                  <label for="password">Password</label>
                  <input id="password" class = "form-control" type="password" name="password" required autocomplete="current-password">
                  @error('password')
                      <span>{{ $message }}</span>
                  @enderror
              </div>
                <button type="submit" class="btn btn-primary my-3">Login</button>
            </form>
        </div>
              <div id="emailHelp" class="form-text"><a href="\register">Or Register if you haven't</a>.</div>
              <a class="btn btn-success text-white mt-3" href="/test">skip login</a>
      <div class="col-sm-2"></div>
    </div>
  </div>

  {{-- <form>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form> --}}
@endsection