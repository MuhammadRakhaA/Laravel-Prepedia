@extends('main.main')

@section('header')
    @include('partial.login-navbar')
@endsection

@section('body')
<!-- resources/views/mealplans/index.blade.php -->
<h1>All Meal Plans</h1>

@foreach($mealplans as $mealplan)
    <div class="bg-lightgreen">
        <h2>{{ $mealplan->name }}</h2>
        @foreach($mealplan->meals as $meal)
        <div class="row m-3">
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
        <div class="row my-3 text-start">
            <div class="col-md-2">
                <form action="{{ route('mealplans.destroy', $mealplan->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger m-2">Delete Meal Plan</button>
                </form>
                <a href="{{ route('mealplans.edit', $mealplan->id) }}" class="btn btn-primary m-2">Edit Meal Plan</a>
            </div>
            
        </div> 
    </div>
@endforeach
<a href="meals/create" class="btn btn-success my-3">Add new Meal Plan</a>

@endsection