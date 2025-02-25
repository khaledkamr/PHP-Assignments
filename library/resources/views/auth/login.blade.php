@extends('../layout')
@section('content')
<div class="w-100 vh-100 bg-dark">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form action="{{route('login')}}" method="POST" class="mt-5 bg-dark text-light p-4 rounded-3">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection