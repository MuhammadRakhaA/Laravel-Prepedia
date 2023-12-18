<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mealplan;
use App\Models\Meal;
use App\Models\Customer;

class MealPlanController extends Controller
{
    //show a mealplan for admin
    public function show($id)
    { 
    $mealplan = Mealplan::with('meals')->find($id);
    return view('mealplans.show', compact('mealplan'));
    }

    //show all mealplan for admin
    public function index()
    {
        $mealplans = Mealplan::with('meals')->get();
        return view('mealplans.index', compact('mealplans'));
    }


    //delete mealplan for admin
    public function destroy($id)
    {
        Mealplan::destroy($id);
        return redirect()->route('mealplans.index')->with('success', 'Meal Plan deleted successfully.');
    }

    //entering an edit mealplan page for admin
    public function edit($id)
    {
        $mealplan = Mealplan::with('meals')->find($id);
        $meals = Meal::all(); // Retrieve all meals
        return view('mealplans.edit', compact('mealplan', 'meals'));
    }

    //edit mealplan for admin
    public function update(Request $request, $id)
    {
        $mealplan = Mealplan::find($id);
        $mealplan->update($request->all());

        // Sync the associated meals
        $mealplan->meals()->sync($request->input('meals'));

        return redirect()->route('mealplans.index', $id)->with('success', 'Meal Plan updated successfully.');
    }

    //create mealplan for admin
    public function create()
    {
    $meals = Meal::all();
    return view('meals.create-mealplan', ['meals'=> $meals]);
    }

    public function store(Request $request)
    {
        $mealplan = Mealplan::create([
            'name' => $request->input('name'),
        ]);
    
        $mealplan->meals()->attach($request->input('meals'));
    
        return redirect()->route('mealplans.index', $mealplan->id);
    }


    //show mealplans for customer
    public function indexCustomer()
    {
        $user = auth()->user();
        //$user = Customer::find(3); 
        $mealplans = $user ? $user->mealplans : collect();
        $firstMealplan = $mealplans->first();

        // Get images from meals inside the first mealplan
        $mealplanImages = $firstMealplan ? $firstMealplan->meals->pluck('image') : collect();

        return view('Customer.homepage', compact('mealplans', 'mealplanImages'));
    }

    //show meals in mealplan for customer
    public function showCustomer($id)
    {
        $mealplan = Mealplan::findOrFail($id);

        return view('Customer.view-mealplan-detail', compact('mealplan'));
    }
}
