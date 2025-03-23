@include('user.app.head')

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    @include('user.app.navbar')
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    @include('user.app.banner')
    <!-- Banner Ends Here -->

    @yield('content')
    {{-- @include('user.app.body') --}}

    
@include('user.app.footer') 