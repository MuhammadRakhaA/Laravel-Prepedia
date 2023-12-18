<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MealController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MealplanController;
use App\Http\Controllers\AdminController;
use App\Http\Requests\LoginRequest;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//login page
Route::get('/', function () {
    return view('auth.login');
})->middleware('guest')->name('login');

Route::get('/login', function () {
    return view('/auth/login');
})->middleware('guest');

Route::post('/login', [CustomerController::class, 'login'])->name('logingIn');
Route::post('logout', [CustomerController::class, 'logout']);
Route::get('/register', function () {
    return view('/auth/register');
})->middleware('guest');
Route::post('register', [CustomerController::class, 'register'])->name('register');

// Admin routes
Route::middleware(['auth:admin'])->group(function () {
    // Admin registration
    Route::get('/admin/register', [AdminController::class, 'showAdminRegisterForm']);
    Route::post('/admin/register', [AdminController::class, 'registerAdmin']);

    // Add meals for admin
    Route::get('meals/add-meal-id', [MealController::class, 'addMealId']);
    Route::get('meals/add-meal-en', [MealController::class, 'addMealEn']);
    Route::post('meals/add-meal', [MealController::class, 'create_meal'])->name('add-meal');

    // Other admin routes...
    // ...

    // View user for admin
    Route::get('/view-user', [CustomerController::class, 'showUsers']);
    Route::get('/edit-user/{id}', [CustomerController::class, 'showUser']);
    Route::put('/edit-user/{id}', [CustomerController::class, 'update_user']);

    // Assign mealplan to user for admin
    Route::get('/admin/assign-mealplan', [AdminController::class, 'index'])->name('assignmealplan.index');
    Route::post('/admin/assign-mealplan/assign', [AdminController::class, 'assign'])->name('assignmealplan.assign');
});

// Customer routes
Route::middleware(['auth:customer'])->group(function () {
    // Homepage for customer
    Route::get('/customer', [MealPlanController::class, 'indexCustomer'])->name('mealplans.index');
    Route::get('/customer/{id}', [MealPlanController::class, 'showCustomer'])->name('view-mealplan-detail');
    Route::get('/meals/view-recipe/{mealId}/{mealplanId}', [MealController::class, 'showRecipe']);
});

// Public routes accessible by guests (both admin and customer)
Route::post('/customer', [CustomerController::class, 'login'])->name('customer')->middleware('guest:customer');

// Other public routes...
// ...
