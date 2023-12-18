@extends('main.main')

@section('header')
    @include('partial.login-navbar')
@endsection

@section('body')
<!-- resources/views/mealplans/edit.blade.php -->
<form action="{{ route('mealplans.update', $mealplan->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Meal Plan Name:</label>
        <input type="text" name="name" value="{{ $mealplan->name }}" class="form-control" required>
    </div>


    <!-- Repeat the above pattern for other properties -->

    <!-- Include fields for associating meals -->
    <div class="form-group">
        <label for="meals">Select Meals:</label>
        <select name="meals[]" multiple class="form-control">
            @foreach($meals as $meal)
                <option value="{{ $meal->id }}" {{ $mealplan->meals->contains($meal->id) ? 'selected' : '' }}>
                    {{ $meal->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary my-3">Update Meal Plan</button>
</form>
@endsection