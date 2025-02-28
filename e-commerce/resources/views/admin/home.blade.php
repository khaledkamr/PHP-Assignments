@extends('admin.layout')
@section('body')
<table class="table">
    @if(Session::has("success"))
        <p class="alert alert-success">{{session::get('success')}}</p>
    @endif
    <thead>
        <tr>
            <th>#</th>
            <th>name</th>
            <th>price</th>
            <th>image</th>
            <th>quantity</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$product->name}}</td>
                <td class="text-right"> {{$product->price}} </td>
                <td class="text-right font-weight-medium">
                    <img src="{{asset("storage/$product->image")}}" alt="">
                </td>
                <td>{{$product->quantity}}</td>
                <td>
                    <div class="list-icon-function">
                        <div class="d-flex gap-3 align-items-center">
                            <a href="{{route('editProduct', $product->id)}}" class="btn btn-info">edit</a>
                            <form action="{{route('deleteProduct', $product->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">delete</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
  {{$products->links("pagination::bootstrap-5")}}
@endsection