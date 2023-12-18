@extends('main.main')

@section('header')
    @include('partial.login-navbar')
@endsection

@section('body')
<div class="container">
    <a class="btn btn-success text-white" href="/view-user"><</a>
    <h1>Edit User</h1>
    <form action="/edit-user/{{ $user->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="mealset">Assign/Remove Meal Plans</label>
            <select multiple class="form-control" id="mealset" name="mealset[]">
                @foreach($mealplans as $mealplan)
                    <option value="{{ $mealplan->id }}" {{ in_array($mealplan->id, $userMealplanIds) ? 'selected' : '' }}>
                        {{ $mealplan->name }} (ID: {{ $mealplan->id }})
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary my-4">Update User</button>
    </form>
</div>

@endsection