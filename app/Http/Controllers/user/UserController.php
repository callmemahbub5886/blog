<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function admin()
    {
        $users = User::first();
        return view('dashboard.admin.admin', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'profile' => 'nullable|mimes:png,jpg|max:2048',
            'username' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:users,email,' . $id,
            'password' => 'nullable|min:8',
        ]);

        $user = User::findOrFail($id);
        if ($request->hasFile('profile')) {

            // if ($user->profile) {
            //     $oldImagePath = public_path('dashboard/assets/images/profile/') . $user->profile;
            //     if ($oldImagePath) {
            //         unlink($oldImagePath);
            //     }
            // }

            $profileName = Auth::user()->name . '-' . time() . '-' . rand(0, 9999) . '.' . $request->file('profile')->extension();
            $request->profile->move(public_path('dashboard/assets/images/profile'), $profileName);

            DB::table('users')->where('id', $id)->update([
                'profile' => $profileName,
                'name' => $request->username ?? $user->name,
                'email' => $request->email ?? $user->email,
                'password' => $request->filled('password') ? Hash::make($request->password) : $user->password,
            ]);
        }else{
            DB::table('users')->where('id', $id)->update([
                'name' => $request->username ?? $user->name,
                'email' => $request->email ?? $user->email,
                'password' => $request->filled('password') ? Hash::make($request->password) : $user->password,
            ]);
        }

        return redirect()->route('admin')->with('success', "Admin info updated successfully!");
    }
}
