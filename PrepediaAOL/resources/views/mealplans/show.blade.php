<!-- resources/views/meals/create.blade.php -->

@extends('main.main')

@section('header')
    @include('partial.login-navbar')
@endsection

@section('body')
<a class="btn btn-success text-white" href="/mealplans"><</a>
<!-- resources/views/mealplans/show.blade.php -->
<h1>{{ $mealplan->name }}</h1>
@foreach($mealplan->meals as $meal)
<div class="row my-3">
        <p>Meals:</p>
    <div class="col-4">
        @if ($meal->image)
        <img src="{{ asset('storage/' . $meal->image) }}" alt="{{ $meal->name }}" style="width:100%">
    @endif<br>
    </div>
    <div class="col-8">
        <li>
            <h2>{{ $meal->name }}</h2><br>      
            <strong>Calories:</strong> {{ $meal->calorie }} kcal<br>
            <strong>Carbs:</strong> {{ $meal->carb }} g<br>
            <strong>Fat:</strong> {{ $meal->fat }} g<br>
            <strong>Protein:</strong> {{ $meal->protein }} g<br>
            <strong>Nutrition Value:</strong> {{ $meal->nutrition_value }}<br>
            <strong>Ingredients:</strong> {{ $meal->ingredients }}<br>
            <strong>Recipe:</strong> {{ $meal->recipe }}<br>
        </li>
    </div>
  </div>
  @endforeach
  <div class="row my-3">
    <form action="{{ route('mealplans.destroy', $mealplan->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete Meal Plan</button>
    </form>
    <a href="{{ route('mealplans.edit', $mealplan->id) }}" class="btn btn-primary mx-2">Edit Meal Plan</a>
</div>

@endsection