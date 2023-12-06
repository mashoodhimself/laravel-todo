<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function store(Task $task)
    {
        request()->validate([
            'note' => 'required'
        ]);

        $task->note()->create([
            'user_id' => auth()->id(),
            'body' => request('note')
        ]);

        return back();
    }
}
