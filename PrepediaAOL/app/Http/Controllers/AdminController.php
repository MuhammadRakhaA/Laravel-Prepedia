<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Mealplan;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        $mealplans = Mealplan::all();

        return view('Admin.assign-mealplan', compact('customers', 'mealplans'));
    }

    public function assign(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'mealplans' => 'required|array',
            'mealplans.*' => 'exists:mealplans,id',
        ]);

        $customer = Customer::findOrFail($request->customer_id);
        $customer->mealplans()->sync($request->mealplans);

        return redirect()->route('assignmealplan.index')->with('success', 'Meal plans assigned successfully.');
    }
    public function showAdminRegisterForm()
    {
        return view('auth.admin-register');
    }

    public function registerAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:admins|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Admin::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect('/login')->with('success', 'Admin registered successfully!');
    }
}
