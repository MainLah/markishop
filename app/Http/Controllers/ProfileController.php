<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $data = User::where('id', Auth::id())->get();
        return view('profile.index', compact('data'));
    }

    public function change_password(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6'
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();

        if (!$user) {
            return back()->with('error', 'User not authenticated');
        }
        
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->with('error', 'Incorrect old password!');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password changed!');
    }
}
