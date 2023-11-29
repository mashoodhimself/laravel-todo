<x-layout>

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="card">

                    <div class="card-header">
                        <strong>Add New Task</strong>
                    </div>

                    <div class="card-body">

                        <form action="/task/add" method="post">
                    
                            @csrf
            
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="task_name" style="border-radius: 0px;" placeholder="Task name">
                                </div>
                            </div>
        
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <textarea style="border-radius:0px;" name="task_desc" id="task_desc" cols="30" rows="10" class="form-control" placeholder="Task description"></textarea>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <input type="date" name="due_date" id="due_date" class="form-control">
                                </div>
                            </div>

                            <div class="row mt-2">

                                <div class="col-md-12 d-flex">

                                    <div class="form-group">
                                        <label for="low">Low</label>
                                        <input type="radio" id="low" name="priority" value="3">
                                    </div>

                                    <div class="form-group" style="margin-left: 10px;">
                                        <label for="medium">Medium</label>
                                        <input type="radio" id="medium" name="priority" value="2">
                                    </div>

                                    <div class="form-group" style="margin-left: 10px;">
                                        <label for="high">High</label>
                                        <input type="radio" id="high" name="priority" value="1">
                                    </div>

                                </div>
                            </div>
                
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <button class="btn btn-primary">Add</button>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <a href="/">Go Back</a>
                                </div>
                            </div>
            
                        </form>

                    </div>

                </div>



            </div>

        </div>

    </div>

</x-layout>