



@extends('main.main')

@section('header')
    @include('partial.login-navbar')
@endsection

@section('body')
<!-- resources/views/auth/admin-register.blade.php -->

<div class="container text-left">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="container">
                <h1>Admin Register</h1>
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <form action="{{ url('/admin/register') }}" method="POST">
                    @csrf
                    <div>
                        <label for="name">Name</label>
                        <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="email">Email</label>
                        <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="password">Password</label>
                        <input id="password" class="form-control" type="password" name="password" required>
                        @error('password')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation">Confirm Password</label>
                        <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required>
                    </div>

                    <button type="submit" class="btn btn-primary my-3">Register</button>
                </form>
            </div>
            <a href="/register" class="btn btn-success">Register as customer</a>
            <div id="emailHelp" class="form-text"><a href="/login">Already have an account? Login here</a>.</div>
        </div>
        <div class="col-sm-2"></div>
    </div>
</div>
@endsection