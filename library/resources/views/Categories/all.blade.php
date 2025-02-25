@extends("../layout");
@section('css')
<style>
    body {
        background-color: #121212;
        color: #ffffff;
        font-family: Arial, sans-serif;
    }
    .container {
        margin-top: 50px;
    }
    .card {
        background-color: #1e1e1e;
        border: 1px solid #333;
        margin-bottom: 15px;
    }
    .card a {
        color: #bb86fc;
        text-decoration: none;
        font-weight: bold;
    }
    .card a:hover {
        text-decoration: underline;
    }
</style>
@endsection

@section('content')
<div class="container">
    @if(session()->has("success"))
        <div class="alert alert-success">{{session()->get("success")}}</div>
    @endif
    <h2 class="text-center mb-4">All Categories</h2>
    <a class="p-3" href={{route("createCategory")}}>create new category</a>
    @foreach($categories as $cat)
        <div class="card p-3 text-light">
            <h5>{{$loop->iteration}}. <a href={{route("showCategory", $cat->id)}}>{{$cat->name}}</a></h5>
            <p>{{$cat->desc}}</p>
            <div class="d-flex">
                <a class="me-2" href={{route("editCategory", $cat->id)}}>
                    <button class="btn btn-primary">edit</button>
                </a>
                <form action={{route("deleteCategory", $cat->id)}}} method="post">
                    @csrf
                    @method("DELETE")
                    <button class="btn btn-danger" type="submit">delete</button>
                </form>
            </div>
        </div>
    @endforeach
    {{$categories->links()}}
</div>
@endsection
