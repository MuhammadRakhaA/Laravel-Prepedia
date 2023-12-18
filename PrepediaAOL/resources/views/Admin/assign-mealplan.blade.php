@extends('main.main')

@section('header')
    @include('partial.login-navbar')
@endsection

    @section('body')

    <div class="container">
        <h1>Assign Meal Plans to Users</h1>
    
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    
        <form action="{{ route('assignmealplan.assign') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="customer_id">Select User:</label>
                <div class="input-group">
                    <select name="customer_id" id="customer_id" class="form-control">
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                    
                </div>
            </div>
            <div class="form-group">
                <label for="mealplans">Select Meal Plans:</label>
                <div class="input-group">
                    <select name="mealplans[]" id="mealplans" multiple class="form-control">
                        @foreach ($mealplans as $mealplan)
                            <option value="{{ $mealplan->id }}">{{ $mealplan->name }}</option>
                        @endforeach
                    </select>
                    
                </div>
            </div>
            <button type="submit" class="btn btn-success my-2">Assign Meal Plans</button>
            <a href="/view-user" class="btn btn-primary m-2">View User</a>
            <a href="/mealplans" class="btn btn-primary my-2">View Meal Plans</a>
  
        </form>
    </div>
    
    

@endsection