<header class="">
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="{{asset("index.html")}}"><h2>Sixteen <em>Clothing</em></h2></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item {{ request()->routeIs('allProducts') ? 'active' : '' }}">
              <a class="nav-link" href="{{route('allProducts')}}">Home
                @if(request()->routeIs('allProducts'))
                  <span class="sr-only">(current)</span>
                @endif
              </a>
            </li> 
            <li class="nav-item ">
              <a class="nav-link" href="{{route('allProducts')}}">Our Products</a>
            </li>
            <li class="nav-item {{ request()->routeIs('showCart') ? 'active' : '' }}">
              <a class="nav-link" href="{{route('showCart')}}">My Cart</a>
            </li>
            <li class="nav-item {{ request()->routeIs('wishlist') ? 'active' : '' }}">
              <a class="nav-link" href="{{route('wishlist')}}">My Wishlist</a>
            </li>
            <li class="nav-item {{ request()->is('about.html') ? 'active' : '' }}">
              <a class="nav-link" href="{{asset("about.html")}}">About Us</a>
            </li>
            <li class="nav-item {{ request()->is('contact.html') ? 'active' : '' }}">
              <a class="nav-link" href="{{asset("contact.html")}}">Contact Us</a>
            </li>
        </ul>
      </div>
    </div>
  </nav>
</header>
