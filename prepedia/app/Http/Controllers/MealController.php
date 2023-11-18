<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal;
use Illuminate\Support\Facades\Storage;


class MealController extends Controller
{
    public function create_meal(Request $request){
        $meal = new Meal;
        $meal->name = $request->input('name');
        $meal->calorie = $request->input('calorie');
        $meal->carb = $request->input('carb');
        $meal->fat = $request->input('fat');
        $meal->protein = $request->input('protein');
        $meal->nutrition_value = $request->input('nutrition_value');
        $meal->ingredients = $request->input('ingredients');
        $meal->recipe = $request->input('recipe');
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('meals', 'public'); // 'public' is the disk name defined in filesystems.php
            $meal->image = $imagePath;
        }
        $meal->save();
        return redirect()->route('view-meal');
    }

    public function edit($id)
    {
        $meal = Meal::find($id);
        return view('meals.edit-meal', ['meal'=>$meal]);
    }

    public function update(Request $request, $id)
    {
        $meal = Meal::find($id);
        $meal->name = $request->input('name');
        $meal->calorie = $request->input('calorie');
        $meal->carb = $request->input('carb');
        $meal->fat = $request->input('fat');
        $meal->protein = $request->input('protein');
        $meal->nutrition_value = $request->input('nutrition_value');
        $meal->ingredients = $request->input('ingredients');
        $meal->recipe = $request->input('recipe');
        // $meal->update([
        //     'name' => $request->name,
        //     'calorie' => $request->calorie,
        //     'carb' => $request->carb,
        //     'fat' => $request->fat,
        //     'protein' => $request->protein,
        //     'nutrition_value' => $request->nutrition_value,
        //     'ingredients' => $request->ingredients,
        //     'recipe' => $request->recipe
        // ]);
        

        // Handle image update
        if ($request->hasFile('image')) {
            // Delete existing image
            if ($meal->image) {
                Storage::delete($meal->image);
            }

            // Upload new image
            $imagePath = $request->file('image')->store('meals', 'public');
            $meal->image = $imagePath;
        }
        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $imagePath = $image->store('meals', 'public');
        //     $meal->image = $imagePath;
        // }

        $meal->save();

        return redirect('/meals');
    }

    public function deleteMeal($id){
        $meal = Meal::find($id);
        $meal->delete();

        return redirect('/meals');
    }
    public function showMeal(){
        $meals = Meal::all(); // Fetch all meals to populate the select dropdown
        return view('meals/view-meals', ['meals'=> $meals]);
    }

    public function showRecipe($id){
        $meal = Meal::find($id); // Fetch all meals to populate the select dropdown
        return view('meals/view-recipe', ['meal'=> $meal]);
    }
}
