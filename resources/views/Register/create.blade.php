<x-layout>

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="card">

                    <div class="card-header">
                        <strong> Register </strong>
                    </div>

                    <div class="card-body">

                        @if ( session()->has('success') )
                            <div class="alert alert-success" >
                                {{ session('success') }}
                            </div>
                        @endif
                        
                        <form action="/register" method="POST">

                            @csrf

                            <div class="form-group mt-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                                @error('name')
                                    <small class="text-danger" > {{ $message }} </small>
                                @enderror
                            </div>
    
                            <div class="form-group mt-3">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}" >
                                @error('email')
                                    <small class="text-danger" > {{ $message }} </small>
                                @enderror
                            </div>
    
                            <div class="form-group mt-3">
                                <label for="password">Password</label>
                                <input type="text" name="password" id="password" class="form-control">
                            </div>
    
                            <div class="form-group mt-3">
                                <button class="btn btn-success" type="submit" >Register</button>
                            </div> 

                        </form>



                    </div>

                </div>

            </div>
        </div>
    </div>
</x-layout>