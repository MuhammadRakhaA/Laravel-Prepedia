@extends('main.main')

@section('header')
    @include('partial.login-navbar')
@endsection

@section('body')

<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <h1 class="text-center">Menu hari ini</h1>
    <div id="carouselExampleCaptions" class="carousel slide my-4">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            @forelse ($mealplans->first()->meals as $meal)
            <div class="carousel-item active">
                <img src="{{ asset('storage/' . $meal->image) }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  {{-- <h5>First slide label</h5>
                  <p>Some representative placeholder content for the first slide.</p> --}}
                  <a class="btn btn-success text-white" href="/meals/view-recipe/{{ $meal["id"]}}/{{ $mealplans->first()["id"] }}">Lihat Resepnya</a>
                </div>
              </div>
            @empty
            <h1>No mealplans yet</h1>
            @endforelse
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
        </div>
        <div class="col-2"></div>
    </div>
    <div class="container row">
        <h1 class="text-center">Menu Minggu Ini</h1>
    </div>
    <div class="row container" style="overflow-x: scroll;">
        <div class="d-flex flex-nowrap">
        @forelse ($mealplans as $mealplan)
                <div class="card flex-shrink-0 mx-3" style="width: 18rem;">
                <h2 class="card-title text-center mt-3">Senin</h2>
                <img src="{{ asset('storage/' . $mealplan->meals->first()->image) }}" class="card-img-top" alt="...">
                <div class="card-body text-center">
                <a href="/customer/{{ $mealplan["id"] }}" class="btn btn-primary">Lihat Selepngkapnya</a>
                </div>
                </div>
            @empty
            <h1>No mealplan yet</h1>
            @endforelse    
    </div>
  </div>

    
        
@endsection