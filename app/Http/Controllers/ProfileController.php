<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function show()
{
    return view('profile');
}

    public function edit()
    {
        $user = Auth::user();
        return view('edit-profile', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'gender' => ['required', Rule::in(['male', 'female', 'other'])],
            'birthdate' => 'required|date',
            'address' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'mobile' => 'required|string|max:20',
        ]);

        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->gender = $request->input('gender');
        $user->birthdate = $request->input('birthdate');
        $user->address = $request->input('address');
        $user->email = $request->input('email');
        $user->mobile = $request->input('mobile');

        $user->save();

        return redirect()->route('edit-profile')->with('success', 'Profile updated successfully.');
    }
}
