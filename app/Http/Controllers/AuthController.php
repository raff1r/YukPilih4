<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Models\Division;
use App\Models\User;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
           'username' => 'required',
           'password' => 'required' 
        ]);

        $user = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (auth()->attempt($user)) {
            if (Hash::check('12345',auth()->user()->password)) {
                return redirect('/changepassword');
            } else {
                return redirect('/');
            }
        } else {
            return back();
        }
        
    }

    public function showRegisterForm()
    {
        $division = Division::all();
        return view('auth.register', compact('division'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,username',
            'division_id' => 'required|exists:divisions,id'
        ]);

        $user = User::create([
            'username' => $request->username,
            'role' => 'user',
            'password' => bcrypt('12345'),
            'division_id' => $request->division_id
        ]);

        return redirect('/login');
    }

    public function showChangePass()
    {
        return view('auth.changepass');
    }

    public function changePass(Request $request)
    {
        $request->validate([
            'oldpass' => 'required',
            'newpass' => 'required|confirmed'
        ]);

        // CEK APAKAH OLD PASSWORD DENGAN PASSWORD SAAT INI COCOK ATAU TIDAK
        if (Hash::check($request->oldpass, auth()->user()->password)) {
            // MENCARI DATA USER YANG AKAN UBAH
            $user = User::where('id', auth()->user()->id)->first();
            // MEMPERBARUI PASSWORD
            $user->update([
                'password' => bcrypt($request->newpass)
            ]);
            return redirect('/logout');
        } else {
            return back();
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/login');
    }
}