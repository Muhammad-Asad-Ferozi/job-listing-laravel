<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ManageUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd(Auth::user());
        return view('user.profile', [
            'user' => Auth::user()
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function updateName(Request $request)
    {
        $user = Auth::user();
        if (isset($user)) {
            $request->validate([
                'name' => 'required|string|max:255'
            ]);

            $user->name = $request->name;
            $user->save();

            return redirect('/user')->with(['success', 'Name updated successfully'], ['user', $user]);
        }
    }



    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Check if current password matches
        if (!Hash::check($request->current_password, $user->password)) {

            return redirect('/user')->with(['error', 'Current Password is incorrect'], ['user', $user]);
        }

        // Update to the new password
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/user')->with(['success', 'Password updated successfully'], ['user', $user]);
    }





    public function becomeEmployer(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|string'
        ]);
        $user = Auth::user();
        $employer = new Employer();
        $employer->name = $request->name;
        $employer->user_id = $user->id;
        $employer->save();
        $user->employer_id = $employer->id;
        $user->save();
        return redirect('/user')->with(['success' => 'You are now an employer', 'user' => $user]);
    }





    public function updateEmployer(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|string',
        ]);

        $user = Auth::user();
        $employer = $user->employer;

        if ($employer) {
            $employer->name = $request->name;
            $employer->save();
            return redirect('/user')->with([
                'success' => 'Employer updated successfully',
                'user' => $user,
            ]);
        } else {
            return redirect('/user')->with([
                'error' => 'No employer found for this user',
            ]);
        }
    }



    public function updateImg(Request $request)
    {
        $request->validate([
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();
        // Delete old profile picture if it exists
        if ($user->profile_picture) {
            Storage::disk('public')->delete($user->profile_picture);
        }

        // Store new profile picture
        $path = $request->file('picture')->store('profile_pictures', 'public');

        // Save path to user's profile
        $user->profile_picture = $path;
        $user->save();

        return redirect('/user')->with('success', 'Profile picture updated successfully!');
    }
}
