<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function destroy()
    {
        $user = Auth::user();

        // Log the user out before deleting the account
        Auth::logout();

        // Delete the user account
        $user->delete();

        // You can customize the redirection URL and success message
        return redirect('/')->with('success', 'Your account has been deleted.');
    }
}
