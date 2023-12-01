<x-layout>


    <div class="container">
        <div class="card">
    
            <div class="card-header">
               <strong>Tasks</strong>
            </div>
    
            <div class="card-body">
    
                <div class="row">
    
                    <div class="col-md-12">
    
                        <div class="row mb-4">
    
                            <div class="col-md-6">
    
                                <form action="" method="get"> 
                                    
                                    <div class="form-group d-flex">
                                        <input type="text" name="search" id="search" class="form-control" placeholder="Search by keywords">
                                        <button type="submit" class="btn btn-success">Search</button>
                                    </div>
    
                                </form>
    
                            </div>

                            <div class="col-md-6">

                                <form action="" method="get">
                                    <div class="form-group d-flex">
                                        <input type="date" name="date" id="date" class="form-control">
                                        <button class="btn btn-success">Filter</button>
                                    </div>
                                </form>

                            </div>
    
                        </div>

                        <div class="row">

                            <div class="col-md-12 d-flex justify-content-between">

                                <x-task-count-list />

                                <div>
                                    <a href="/task/add">New Task</a>
                                </div>

                            </div>

                        </div>

                        <hr>

                        @if ($tasks->count())

                            <div class="row">
                
                                <div class="col-md-12" style="display: flex;flex-direction: column;gap: 16px;">
                
                                    @foreach ($tasks as $task)
        
                                        <x-task-item :task="$task"  />
        
                                        @if (!$loop->last)
                                        <hr>    
                                        @endif
        
                                    @endforeach
        
                                </div>
                
                            </div>
                            
                        @else

                            <div class="row">
                                <div class="col-md-12">
                                    No Task exists
                                </div>
                            </div>

                        @endif
    
                        
                    </div>
    
                </div>
    
            </div>

            <div class="card-footer">
                <div style="width: 20%; margin: 0px auto;" >
                    {{ $tasks->links() }}
                </div>
            </div>
    
        </div>
    </div>



    <script>
        
        let path = "http://127.0.0.1:8000/task/ajax";

        async function markTask() {
                const response = await fetch(path)
                const responseJson = await response.json()
                console.log(responseJson)
        }


    </script>


</x-layout>
