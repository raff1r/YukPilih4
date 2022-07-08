<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\User;

class DivisionController extends Controller
{
    public function index()
    {
        $division = Division::all();
        return view('division.index',compact('division'));
    }

    public function create()
    {
        return view('division.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        Division::create([
            'name' => $request->name
        ]);

        return redirect('/division');
    }

    public function edit(Division $id)
    {
        return view('division.edit', compact('id'));
    }

    public function update(Request $request, Division $id)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        $id->update([
            'name' => $request->name
        ]);

        return redirect('/division');
    }

    public function destroy(Division $id)
    {
        $user_count = User::where('division_id',$id->id)->count();
        
        if ($user_count == 0 ) {
            $id->delete();
        } else {
            return abort(500);
        }
        
        return back();
    }

}
