@extends('main.main')

@section('header')
    @include('partial.login-navbar')
@endsection

@section('body')
<div class="container">
    <h1>Edit Meal</h1>
    <form action="/meals/{{ $meal["id"]}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Include your input fields with their values pre-filled from the $meal object -->
        <!-- Example: -->
        <div class="form-group">
            <label for="name">Meal Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $meal->name }}" required>
        </div>
        <div class="form-group">
            <label for="calorie">Calories</label>
            <input type="number" class="form-control" id="calorie" name="calorie" value="{{ $meal->calorie }}" required>
        </div>
        <div class="form-group">
            <label for="carb">Carbohydrates</label>
            <input type="number" class="form-control" id="carb" name="carb" value="{{ $meal->carb }}" required>
        </div>
        <div class="form-group">
            <label for="fat">Fat</label>
            <input type="number" class="form-control" id="fat" name="fat" value="{{ $meal->fat }}" required>
        </div>
        <div class="form-group">
            <label for="protein">Protein</label>
            <input type="number" class="form-control" id="protein" name="protein" value="{{ $meal->protein }}" required>
        </div>
        <div class="form-group">
            <label for="nutrition_value">Nutrition Value</label>
            <input type="text" class="form-control" id="nutrition_value" name="nutrition_value" value="{{ $meal->nutrition_value }}" required>
        </div>
        <div class="form-group">
            <label for="ingredients">Ingredients</label>
            <textarea class="form-control" id="ingredients" name="ingredients" rows="4" required>{{ $meal->ingredients }}</textarea>
        </div>
        <div class="form-group">
            <label for="recipe">Recipe</label>
            <textarea class="form-control" id="recipe" name="recipe" rows="4" required>{{ $meal->recipe }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Meal Image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary my-4">Update Meal</button>
    </form>
</div>
@endsection
