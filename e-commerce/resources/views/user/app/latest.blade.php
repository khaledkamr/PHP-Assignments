<div class="latest-products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Latest Products</h2>
            <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>
          </div>
        </div>
        @foreach ($products as $product)
            <div class="col-md-4">
                <div class="product-item">
                    <a href="{{route('showProduct', $product->id)}}"><img src="{{asset("storage/$product->image")}}" alt=""></a>
                    <div class="down-content">
                      <a href="#"><h4>{{$product->name}}</h4></a>
                      <h6>${{$product->price}}</h6>
                      <p>{{$product->desc}}</p>
                      <ul class="stars">
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                      </ul>
                      <span>{{$product->quantity}}</span>
                      @php
                        $wishlist = session()->get('wishlist', []);
                        $isInWishlist = isset($wishlist[$product->id]);
                      @endphp
                      @if($isInWishlist)
                        <form action="{{route('removeFromWishlist', $product->id)}}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-danger mt-2">Remove from Wishlist</button>
                        </form>
                      @else
                        <form action="{{route('addToWishlist', $product->id)}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-secondary mt-2">Add to Wishlist</button>
                        </form>
                      @endif
                    </div>
                </div>
            </div>
        @endforeach
      </div>
    </div>
</div>