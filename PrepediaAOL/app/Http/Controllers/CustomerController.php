<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Admin;
use App\Models\Mealplan;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;

class CustomerController extends Controller
{
    use AuthenticatesUsers;
    public function register(Request $request)
    {
    $user = new Customer;
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->password = bcrypt($request->input('password'));
    $user->age = $request->input('age');
    $user->gender = $request->input('gender');
    $user->weight = $request->input('weight');
    $user->height = $request->input('height');
    $user->weight_goal = $request->input('weight_goal');

    $user->save();

    return redirect()->route('login');
    // You can add validation, error handling, and redirection here.
    }
    public function login(request $request)
        {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('customer')->attempt($credentials)) {
            return redirect()->intended('/customer');
        }

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('/view-user');
        }

        return redirect()->back()->with('error', 'Invalid credentials.');
        }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }

    public function getUserData($id){
        $user = Customer::find($id);
        return view('/test/{id}', ['user' => $user]);
    }

    public function showUsers(){
        $users = Customer::all();
        return view('Admin.view-user', ['users' => $users]);
    }
    
    public function showUser($id){
        $user = Customer::find($id);
        $mealplans = Mealplan::all();
        $userMealplanIds = $user->mealplans->pluck('id')->toArray();
        return view('Admin.edit-user', compact('user', 'mealplans', 'userMealplanIds'));
    }
    
    public function update_user(Request $request, $id)
    {
        $user = Customer::find($id);
        $user->mealplans()->sync($request->input('mealset', []));
    
        return redirect('/view-user');
    }
}
