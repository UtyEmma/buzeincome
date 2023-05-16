<?php

namespace App\Http\Controllers;

use App\Library\Roles;
use App\Library\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    function index(){
        $admins = User::isAnAdmin()->get();

        return view('admins.admins', [
            'admins' => $admins
        ]);
    }

    function store(Request $request){

        $validated = $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'phone' => ['required', 'numeric'],
            'password' => ['required', 'string'],
            'status' => ['required', "in:".Status::ACTIVE.','.Status::BANNED.','.Status::SUSPENDED]
        ]);

        $user = User::create(collect($validated)->merge([
            'password' => Hash::make($request->password),
            'role' => Roles::ADMIN,
        ])->toArray());

        $user->email_verified_at = now();
        $user->save();

        // Send Email TO Vendor About Account Creation with login details

        Alert::success('Admin Account Created Successfully!');
        return back();
    }

    function update(Request $request, User $user) {
        $validated = $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'phone' => ['required', 'numeric'],
            'password' => ['nullable', 'string'],
            'status' => ['required', "in:".Status::ACTIVE.','.Status::BANNED.','.Status::SUSPENDED]
        ]);

        $user->update(collect($validated)->merge([
            'password' => $request->filled('password') ? $request->password : $user->password,
        ])->toArray());

        Alert::success('Admin Account Updated Successfully!');

        return back();
    }

    function destroy(User $user){
        $user->delete();
        
        Alert::success('Admin Account Deleted Successfully!');

        return back();
    }

    
}
