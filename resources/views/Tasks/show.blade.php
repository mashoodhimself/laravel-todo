<x-layout>


    <div class="container">
        <div class="card">
    
            <div class="card-header">

                <div class="d-flex justify-content-between" >
                    <strong>Tasks</strong>
                    <ul>
                        @guest
                            <li><a href="/register">Register</a></li>
                            <li><a href="/login">Login</a></li>
                        @endguest

                        @auth
                            <li> <form action="/logout" method="POST">@csrf <button type="submit" >Logout</button></form> </li>
                        @endauth

                    </ul>
                </div>

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

                        <div class="row">

                            <div class="col-md-12">
                                {{ $task->name }}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                {{ $task->description }}
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                {{ $task->status }}
                            </div>

                            <div class="col-md-6">
                                {{ $task->priority }}
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                {{ $task->due_date }}
                            </div>
                        </div>

                        <div class="row mt-4 mb-4">
                            <div class="col-md-12">

                                <form action="/task/{{ $task->id }}/note" method="POST" enctype="multipart/form-data">

                                    @csrf

                                    <div class="form-group">
                                        <textarea name="note" id="note" cols="30" rows="10" class="form-control" placeholder="Add your note here"></textarea>
                                    </div>

                                    @error('note')
                                        <span class="text-danger" > {{ $message }} </span>
                                    @enderror
                                    
                                    <div class="form-group mt-3">
                                        <input type="file" name="attachment" id="attachment" class="form-control">
                                    </div>

                                    @error('attachment')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror

                                    <div class="form-group mt-2">
                                        <button type="submit" class="btn btn-success">Add</button>
                                    </div>
                                    
                                </form>

                                

                            </div>
                        </div>

                        @if (($task->note)->count())

                            <h5 class="mt-3">Notes</h5>

                            @foreach ($task->note as $note)
                                <x-task-note :note="$note" />
                            @endforeach

                        @endif


                    

                    </div>
    
                </div>
    
            </div>

            <div class="card-footer">

                <div class="row">

                    <div class="col-md-12">

                        <div style="max-width: 50%;margin: 0px auto;padding:10px;" class="text-center" >

                            <h4 class="mb-3" >Subscribe to Our Newsletter</h4>
                            <form action="/newsletter" method="POST">
                                @csrf
                                <input type="email" name="email" id="email" class="form-control">
                                
                                @error('email')
                                    <small class="text-danger d-block mt-3"> {{ $message }} </small>
                                @enderror

                                
                                <button class="btn btn-primary mt-3" type="submit">Subscribe</button>
                            </form>

                        </div>

                        

                    </div>

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
