@extends('main.main')

@section('header')
    @include('partial.login-navbar')
@endsection


@section('body')
    <div class="container">
      <a class="btn btn-success text-white" href="\test"><</a>
      @foreach($meals as $meal)
      <div class="row my-3">
          <div class="col-4">
            <img src="{{ asset('storage/' . $meal->image) }}" alt="/steak.jpg" style="width: 100%">
          </div>
          <div class="col-8">
            <h2>Name : {{ $meal->name }}</h2>
            <h3>Calories : {{ $meal->calorie }}</h3>
            <h4>Carb : {{ $meal->carb }}</h4>
            <h4>Protein : {{ $meal->protein }}</h4>
            <h4>Fat : {{ $meal->fat }}</h4>
            <a class="btn btn-success text-white" href="/meals/view-recipe/{{ $meal["id"]}}">Lihat Resepnya</a>
        </div>
        @endforeach
    </div>
@endsection
