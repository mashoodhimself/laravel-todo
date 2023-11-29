@props(['task'])


@php

    if($task->priority == 1) {

        $level = "High";
        $color = 'background-color:red;color:white !important;border-radius: 10px;padding: 0px 10px;';
   
    } elseif ($task->priority == 2) {

        $level = 'Medium';
        $color = 'background-color:yellow;color:black !important;border-radius: 10px;padding: 0px 10px;';
    
    } else {

        $level = 'Low';
        $color = 'background-color:green;color:white !important;border-radius: 10px;padding: 0px 10px;';
    }

@endphp

<div class="row">

    <div class="col-md-8">

        <div>
            <strong> {{$task->name}} </strong>
        </div>

        <div> {{ Str::substr($task->description, 0, 70) }} </div>

        <div><small>On {{ \Carbon\Carbon::parse($task->published_at)->format('Y-m-d')  }}</small></div>
        
        <div><small>Due Date: {{ \Carbon\Carbon::parse($task->due_date)->format('Y-m-d') }} </small></div>

        <div>
            <small style="{{ $color }}"> {{ $level }} </small>

            {!! $task->status == 1 ? "<small class='completed-state'>Completed</small>" : "<small class='pending-state'>Pending</small>" !!}
        </div>

        
    </div>

    <div class="col-md-4">
            
            @if ($task->status == 1)
                 <x-button @click="markTask"  class="btn btn-primary"><i class="fa-solid fa-xmark"></i></x-button>
            @else
                 <x-button @click="markTask"  class="btn btn-secondary"><i class="fa-solid fa-check"></i></x-button>
            @endif

            <x-link class="btn btn-warning" href="/edit/task/{{ $task->id }}"><i class="fa-solid fa-pen-to-square"></i></x-link>


            @if (request()->routeIs('trashed'))

                <x-button class="btn btn-danger" 
                    onclick="if(confirm('Are u sure to delete this?')){  document.getElementById('form-{{ $task->id }}').submit();  }">
                    <i class="fa-solid fa-delete-left"></i> 
                </x-button>  

                <form id="form-{{ $task->id }}" action="/delete/task/{{ $task->id }}" method="post">@csrf</form>

            @else

                <x-button class="btn btn-danger" 
                        onclick="if(confirm('Are u sure want to delete this temporarly?')){  document.getElementById('trash-form-{{ $task->id }}').submit();  }">
                        <i class="fa-solid fa-delete-left"></i> 
                </x-button>

                <form id="trash-form-{{ $task->id }}" action="/trash/task/{{ $task->id }}" method="post">@csrf</form>

            @endif

            
    </div>


</div>
