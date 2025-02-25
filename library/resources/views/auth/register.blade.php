@extends('../layout')
@section('content')
<div class="w-100 vh-100 bg-dark">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form action="{{route('register')}}" method="post" class="mt-5 bg-dark text-light p-4 rounded-3">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" >
                        @error('name') 
                            <span class="alert alert-danger text-center">
                                {{$message}}
                            </span>
                        @enderror 
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" >
                        @error('email') 
                            <span class="alert alert-danger text-center">
                                {{$message}}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" >
                        @error('password') 
                            <span class="alert alert-danger text-center">
                                {{$message}}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="confirm-password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm-password" name="password_confirmation" >
                        @error('password_confirmation') 
                            <span class="alert alert-danger text-center">
                                {{$message}}
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection