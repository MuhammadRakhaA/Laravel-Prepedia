@extends('main.main')

@section('header')
    @include('partial.login-navbar')
@endsection


@section('body')
<div class="container">
    <a class="btn btn-success text-white" href="/customer"><</a>
    @foreach($users as $user)
        <div class="row my-3">
            <div class="col-md-8">
                <h2>Name : {{ $user->name }}</h2>
                <h3>Email : {{ $user->email }}</h3>
                <h4>Age : {{ $user->age }}</h4>
                <h4>Gender : {{ $user->gender }}</h4>
                <h4>Height : {{ $user->height }}</h4>
                <h4>Weight : {{ $user->weight }}</h4>
                <h4>Goal Weight : {{ $user->weight_goal }}</h4>
                <h4>Assigned Meal Plans:</h4>
                <ul>
                    @forelse ($user->mealplans as $mealplan)
                        <li>{{ $mealplan->name }} (ID: {{ $mealplan->id }})</li>
                    @empty
                        <li>No assigned meal plans</li>
                    @endforelse
                </ul>
                <a class="btn btn-success text-white" href="/edit-user/{{ $user->id }}">Edit User</a>
            </div>
        </div>
    @endforeach
</div>

@endsection
