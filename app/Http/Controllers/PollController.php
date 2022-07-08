<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poll;
use App\Models\Choice;

class PollController extends Controller
{
    public function index()
    {
        $poll = Poll::all();
        return view('poll.index', compact('poll'));
    }

    public function create()
    {
        $now = now()->toDateTimeLocalString();
        return view('poll.create', compact('now'));
    }

    public function store(Request $request)
    {
        // dd(count($request->choices));
        $now = now()->toDateTimeLocalString();
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'deadline' => 'required|after:'.$now,
            'choices' => 'required|array'
        ]);

        $poll = Poll::create([
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'created_by' => auth()->user()->id
        ]);

        // UNTUK MELAKUKAN PERULANGAN, COUNT UNTUK MENGHITUNG JUMLAH CHOICES DIGUNAKAN SEBAGAI BATAS LOOPINGAN
        for ($i=0; $i < count($request->choices) ; $i++) { 
        // UNTUK MENYIMPAN DATA YANG SUDAH DI LOOPING SERTA MENAMBAHKAN poll_id, YANG DIPETIK DISAMAKAN DENGAN KOLOM DI TABLE CHOICES
            $arr[] = [
                'choice' => $request->choices[$i],
                'poll_id' => $poll->id
            ];
        }
        // MEMASUKAN DATA DENGAN BENTUK ARRAY KEDALAM TABLE CHOICES
        Choice::insert($arr);

        return redirect('/poll');
    }

    public function edit(Poll $id)
    {
        return view('poll.edit', compact('id'));
    }

    public function update(Request $request, Poll $id)
    {
        
        // dd($id);
        $now = now()->toDateTimeLocalString();
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'deadline' => 'required|after:'.$now,
            'choices' => 'required|array'
        ]);

        $id->update([
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
        ]);

        // MENGHAPUS CHOICE DENGAN poll_id SAMA DENGAN POLL YANG DI PILIH 
        Choice::where('poll_id', $id->id )->delete();
        
        for ($i=0; $i <count($request->choices) ; $i++) { 
            $arr[] = [
                'choice' => $request->choices[$i],
                'poll_id' => $id->id
            ];
        }
        Choice::insert($arr);

        return redirect('/poll');
    }

    public function destroy(Poll $id)
    {
        $id->delete();
        return back();
    }
}
