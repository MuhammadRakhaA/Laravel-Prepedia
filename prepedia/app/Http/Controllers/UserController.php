<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_model;
use App\Http\Requests\LoginRequest;

class UserController extends Controller
{
    public function register(Request $request)
{
    $user = new user_model;
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->password = bcrypt($request->input('password'));
    $user->age = $request->input('age');
    $user->gender = $request->input('gender');
    $user->weight = $request->input('weight');
    $user->height = $request->input('height');
    $user->weight_goal = $request->input('weight_goal');
    $user->save();

    // You can add validation, error handling, and redirection here.
}
public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...

            // Fetch the user by email
            $user = user_model::where('email', $request->email)->first();

            // Redirect to /test if authentication successful
            return redirect('/test');
        }

        // Redirect back if authentication fails
        return back()->withErrors(['email' => 'Invalid email or password']);
    }

    public function getUserData($id){
        $user = user_model::find($id);
        return view('/test/{id}', ['user' => $user]);
    }

}
