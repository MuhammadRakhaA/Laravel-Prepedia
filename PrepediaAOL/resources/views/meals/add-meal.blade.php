@extends('main.main')

@section('header')
    @include('partial.login-navbar')
@endsection

@section('body')
<div class="container">
    <h1>{{__('form.judul')}}</h1>
    <form action="/meals/add-meal" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">{{__('form.input.name')}}</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="calorie">{{__('form.input.calorie')}}</label>
            <input type="number" class="form-control" id="calorie" name="calorie" required>
        </div>
        <div class="form-group">
            <label for="carb">{{__('form.input.carb')}}</label>
            <input type="number" class="form-control" id="carb" name="carb" required>
        </div>
        <div class="form-group">
            <label for="fat">{{__('form.input.fat')}}</label>
            <input type="number" class="form-control" id="fat" name="fat" required>
        </div>
        <div class="form-group">
            <label for="protein">{{__('form.input.protein')}}</label>
            <input type="number" class="form-control" id="protein" name="protein" required>
        </div>
        <div class="form-group">
            <label for="nutrition_value">{{__('form.input.nutrition_value')}}</label>
            <input type="text" class="form-control" id="nutrition_value" name="nutrition_value" required>
        </div>
        <div class="form-group">
            <label for="ingredients">{{__('form.input.ingredients')}}</label>
            <textarea class="form-control" id="ingredients" name="ingredients" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="recipe">{{__('form.input.recipe')}}</label>
            <textarea class="form-control" id="recipe" name="recipe" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="image">{{__('form.input.image')}}</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary my-4">Create Meal</button>
        <a class="btn btn-success text-white" href="/meals/view-meal">Edit meal</a>
    </form>
</div>
@endsection

