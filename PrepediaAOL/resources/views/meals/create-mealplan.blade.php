<!-- resources/views/meals/create.blade.php -->

@extends('main.main')

@section('header')
    @include('partial.login-navbar')
@endsection

@section('body')
<form action="{{ route('mealplans.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Meal Plan Name:</label>
        <input type="text" class="form-control" name="name" required>
    </div>

    <div class="form-group">
        <label for="meals">Select Meals (hold down the Ctrl (Windows) or Command (Mac) button to select multiple meals):</label>
        <select name="meals[]" multiple class="form-control">
            @forelse($meals as $meal)
                <option value="{{ $meal->id }}">{{ $meal->name }}</option>
            @empty
            <a class="btn btn-success" href="/meals/add-meal-id">No meals available, Add Meal</a>
            @endforelse
        </select>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Create Meal Plan</button>
</form>



@endsection