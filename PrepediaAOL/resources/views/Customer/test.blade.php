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
          <div class="carousel-item active">
            <img src="hot-pot.jpeg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="nasi-goreng.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Some representative placeholder content for the second slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="steak.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Third slide label</h5>
              <p>Some representative placeholder content for the third slide.</p>
            </div>
          </div>
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
        @auth
        <div class="d-flex flex-nowrap">
          @foreach($mealsets as $mealset)
            <div class="card flex-shrink-0 mx-3" style="width: 18rem;">
                <h2 class="card-title text-center mt-3">Senin</h2>
                <img src="/fruit.jpg" class="card-img-top" alt="...">
                <div class="card-body text-center">
                  <a href="meals/view-mealset/{{ $mealset["id"] }}" class="btn btn-primary">Lihat Selepngkapnya</a>
                </div>
        </div>
        @endforeach
        @endauth
    </div>
    
  </div>
    
        
@endsection