<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function store(Task $task)
    {

        request()->validate([
            'note' => 'required',
            'attachment' => 'image'
        ]);

        $attributes = [
            'user_id' => auth()->id(),
            'body' => request('note')
        ];

        if(request()->file('attachment')) {
            $attributes['attachment'] = request()->file('attachment')->store('attachments');
        }

        $task->note()->create($attributes);

        return back();
    }
}
