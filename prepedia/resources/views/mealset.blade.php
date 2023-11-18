@extends('main.main')

@section('header')
    @include('partial.login-navbar')
@endsection


@section('body')
<div class="container">
    <h1>Create a New Mealset</h1>
    <form action="{{ route('mealset') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="mealset_id">Mealset ID</label>
            <input type="text" class="form-control" id="mealset_id" name="mealset_id" required>
        </div>

        <div class="form-group">
            <label for="meal_1_id">Select Meal 1</label>
            <select class="form-control" id="meal_1_id" name="meal_1_id" required>
                @foreach($meals as $meal)
                <option value="{{ $meal->id }}">{{ $meal->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="meal_2_id">Select Meal 2</label>
            <select class="form-control" id="meal_2_id" name="meal_2_id" required>
                @foreach($meals as $meal)
                <option value="{{ $meal->id }}">{{ $meal->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="meal_3_id">Select Meal 3</label>
            <select class="form-control" id="meal_3_id" name="meal_3_id" required>
                @foreach($meals as $meal)
                <option value="{{ $meal->id }}">{{ $meal->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Create Mealset</button>
    </form>
</div>
@endsection

@section('footer')
