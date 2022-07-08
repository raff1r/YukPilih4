<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Models\Poll;
use App\Models\Vote;


class VoteController extends Controller
{
    public function index()
    {   
        $poll = Poll::with('User','Choices')->latest()->get();
        return view('dashboard', compact('poll'));
    }

   public function voting(Request $request)
   {
       $request->validate([
           'poll_id' => 'required|exists:polls,id',
           'choice_id' => 'required|exists:choices,id'
       ]);

       Vote::create([
            'choice_id' => $request->choice_id,
            'poll_id'   =>$request->poll_id,
            'user_id'   =>auth()->user()->id,
            'division_id' => auth()->user()->division_id
       ]);

       return back();
   } 
    
}
