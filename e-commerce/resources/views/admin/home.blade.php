@extends('admin.layout')
@section('body')
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>name</th>
            <th>price</th>
            <th>image</th>
            <th>quantity</th>
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
            </tr>
        @endforeach
    </tbody>
  </table>
  {{$products->links("pagination::bootstrap-5")}}
@endsection