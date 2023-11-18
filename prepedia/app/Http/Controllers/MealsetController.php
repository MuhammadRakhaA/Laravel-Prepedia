<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mealset;
use App\Models\Meal;

class MealsetController extends Controller
{
    public function showMeal(){
        $meals = Meal::all(); // Fetch all meals to populate the select dropdown
        return view('mealset', compact('meals'));
    }

    public function showMealSetDetails($id){
        $mealsets = Mealset::find($id);
        $meal1 = Meal::find($mealsets->meal_1_id);
        $meal2 = Meal::find($mealsets->meal_2_id);
        $meal3 = Meal::find($mealsets->meal_3_id);
        $meals = [$meal1, $meal2, $meal3];
        return view('meals/view-mealset', ['meals' => $meals]);
    }

    public function add_mealset(Request $request){
    // Validate the input here
        $meals = Meal::all();
        $mealset = new Mealset;
        $mealset->mealset_id = $request->input('mealset_id');
        $mealset->meal_1_id = $request->input('meal_1_id');
        $mealset->meal_2_id = $request->input('meal_2_id');
        $mealset->meal_3_id = $request->input('meal_3_id');
        $mealset->save();

    // Attach selected meals to the mealset
        // $mealset->meals()->sync($request->input('meals'));

        return view('/mealset', ['meals' => $meals]);
    }
}
