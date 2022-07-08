<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Division;

class UserController extends Controller
{
    public function index()
    {
        $user = User::with('Division')->get();
        return view('user.index', compact('user'));
    }

    public function create()
    {
        $division = Division::all();
        return view('user.create', compact('division'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:users,username',
            'role' => 'required',
            'division_id' => 'required|exists:divisions,id'
        ]);

        User::create([
            'username' => $request->name,
            'role' => $request->role,
            'division_id' => $request->division_id,
            'password' => bcrypt('12345')
        ]);

        return redirect('/user');
    }

    public function edit(User $id)
    {
        $division = Division::all();
        return view('user.edit', compact('id','division'));
    }

    public function update(Request $request, User $id)  
    {
        $request->validate([
            'name' => 'required|string|unique:users,username,'.$id->username,
            'role' => 'required',
            'division_id' => 'required|exists:divisions,id',
            'password' => 'required|min:8'
        ]);

        $id->update([
            'username' => $request->name,
            'role' => $request->role,
            'password' => bcrypt($request->password),
            'division_id' => $request->division_id
        ]);
 
        return redirect('/user');
    }

    public function destroy(User $id)
    {
        $id->delete();
        return back();
    }

}
