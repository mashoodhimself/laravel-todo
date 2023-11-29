<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return view('tasks.show', [

            "tasks" => Task::filter(request(['search', 'date', 'progress', 'completed', 'trashed']))
                            ->with('user')
                            ->orderBy("priority")
                            ->get()
        ]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $task = new Task;
        $task->user_id = 1;
        $task->name = $request->task_name;
        $task->description = $request->task_desc;
        $task->slug = Str::slug($request->task_name, "-");
        $task->priority = $request->priority;
        $task->due_date = $request->due_date;
        $task->published_at = date('Y-m-d H:i:s');
        $task->save();
        
        return redirect('/');
    }

    public function task_by_author($user)
    {
        return view('tasks.show', [
            "tasks" => Task::where('user_id', $user)->get()
        ]);
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', [
            'task' => $task
        ]);
    }

    public function update(Request $request, Task $task)
    {
        $update_data = [
            'user_id' => 1,
            'name' => $request->task_name,
            'due_date' => $request->due_date,
            'priority' => $request->priority,
            'description' => $request->task_desc
        ];
    
        $task->update($update_data);
        return redirect("/");
    }

    public function trash(Task $task)
    {
        $task->update([
            'status' => 2
        ]);

        return redirect('/');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/');
    }
}
