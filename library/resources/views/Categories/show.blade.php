<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
            max-width: 600px;
        }
        .card {
            background-color: #1e1e1e;
            border: 1px solid #333;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card text-light">
            <h2>{{$category->name}}</h2>
            <p>{{$category->desc}}</p>
            <img src="{{asset("storage/$category->image")}}" width=200px class="m-auto mb-3" alt="">
            <div class="d-flex justify-content-center">
                <a class="me-2" href={{route("editCategory", $category->id)}}>
                    <button class="btn btn-primary">edit</button>
                </a>
                <form action={{route("deleteCategory", $category->id)}} method="post">
                    @csrf
                    @method("DELETE")
                    <button class="btn btn-danger" type="submit">delete</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
