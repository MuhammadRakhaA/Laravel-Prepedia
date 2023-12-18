@extends('main.main')

@section('header')
    @include('partial.login-navbar')
@endsection

@section('body')
<div class="container">
  <a class="btn btn-success text-white" href="/meals/add-meal-id">Add Another Meal</a>
    @foreach($meals as $meal)
    <div class="row my-3">
        <div class="col-4">
          <img src="{{ asset('storage/' . $meal->image) }}" alt="/steak.jpg" style="width: 100%">
        </div>
        <div class="col-8">
          <h5>Name : {{ $meal->name }}</h5>
          <a class = "btn btn-success text-white" href="/meals/{{ $meal["id"]}}/edit-meal">Edit</a>
          <a class = "btn btn-success text-white" href="/meals/{{ $meal["id"]}}/delete-meal">Delete</a>
        </div>
      </div>
      @endforeach
</div>
@endsection
