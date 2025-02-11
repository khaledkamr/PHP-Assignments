<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit category Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
        }
        .card {
            background-color: #1e1e1e;
            border: 1px solid #333;
        }
        .card-header {
            background-color: #333;
        }
        .form-control {
            background-color: #2a2a2a;
            color: #ffffff;
            border: 1px solid #555;
        }
        .form-control:focus {
            background-color: #2a2a2a;
            color: #ffffff;
            border-color: #bb86fc;
            box-shadow: 0 0 5px #bb86fc;
        }
        .btn-success {
            background-color: #4caf50;
            border: none;
        }
        .btn-success:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        @endif
        <div class="card">
            <div class="card-header text-white">
                <h4>Edit Category</h4>
            </div>
            <div class="card-body">
                <form action={{route("updateCategory", $category->id)}} method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="mb-3">
                        <label for="categoryName" class="form-label text-light">Category Name</label>
                        <input type="text" class="form-control" id="categoryName" name="name" value="{{$category->name}}">
                    </div>

                    <div class="mb-3">
                        <label for="categoryDescription" class="form-label text-light">Category Description</label>
                        <textarea class="form-control" id="categoryDescription" name="desc" rows="3">{{$category->desc}}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="categoryImage" class="form-label text-light">Category Image</label>
                        <input type="file" class="form-control" id="categoryImage" name="image">
                        <img src="{{asset("storage/$category->image")}}" width=200px class="m-auto mt-3" alt="">
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
