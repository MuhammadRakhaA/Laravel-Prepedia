<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MealController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MealsetController;

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

Route::get('/', function () {
    return view('/user/login');
});
Route::get('/test', function () {
    return view('test');
})->name('test');;
Route::post('/test/{id}',[UserController::class, 'getUserData']); 
Route::post('/test', [UserController::class, 'login'])->name('test');


Route::get('/homepage', function () {
    return view('homepage');
});
Route::get('register', function () {
    return view('/user/register');
});
Route::post('register', [UserController::class, 'register'])->name('register');

Route::get('meals/add-meal', function () {
    return view('meals.add-meal');
});
Route::post('meals/add-meal', [MealController::class, 'create_meal'])->name('add-meal');

Route::get('/mealset', function () {
    return view('mealset');
});
Route::post('/mealset', [MealsetController::class, 'add_mealset'])->name('mealset');
Route::get('/mealset', [MealsetController::class, 'showMeal']);

Route::get('meals/view-mealset/{id}', [MealsetController::class, 'showMealSetDetails']);

//edit meal
Route::get('meals/view-meal', [MealController::class, 'showMeal'])->name('view-meal');
Route::get('/meals', [MealController::class, 'showMeal']);

// Route::post('meals/view-meal', function () {
//     return view('meals.edit-meal');
// });
Route::get('meals/{id}/edit-meal', [MealController::class, 'edit']);
Route::get('meals/{id}/delete-meal', [MealController::class, 'deleteMeal']);
Route::put('meals/{id}', [MealController::class, 'update']);

Route::get('meals/view-recipe/{id}', [MealController::class, 'showRecipe']);


