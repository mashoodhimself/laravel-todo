<x-layout>

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="card">
            
                    <div class="card-header">
                        <strong>Edit Task</strong>
                    </div>
            
                    <div class="card-body">
            
                        <form action="/edit/task/{{$task->id}}" method="post">
            
                            @csrf
            
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="task_name" style="border-radius: 0px;" value="{{ $task->name }}">
                                </div>
                            </div>
            
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <textarea style="border-radius:0px;" name="task_desc" id="task_desc" cols="30" rows="10" class="form-control" placeholder="Task description">{{ $task->description }}</textarea>
                                </div>
                            </div>
            
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <button class="btn btn-primary" style="border-radius:0px;">Update</button>
                                </div>
                            </div>
            
                        </form>
            
                        <a class="mt-5" href="/">Go Back</a>
            
                    </div>
                </div>


            </div>

        </div>

    </div>


</x-layout>
