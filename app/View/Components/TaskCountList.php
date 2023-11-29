<?php

namespace App\View\Components;

use App\Models\Task;
use Illuminate\View\Component;

class TaskCountList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.task-count-list',[
            'allCount' => Task::count(),
            'progressCount' => Task::where('status', 0)->count(),
            'completeCount' => Task::where('status', 1)->count(),
            'trashCount' => Task::where('status', 2)->count()
        ]);
    }
}
