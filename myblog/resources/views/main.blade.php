<!doctype html>
<html lang="en">
<head>
@include('partials._head')
</head>
<body>
<!--Default Bootstrape Navbar-->
@include('partials._nav')
<div class="container">
    @include('partials._messages')



  @yield('content')
    <hr>
@include('partials._footer')

</div><!--end of .Container-->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
@include('partials._javascript')
@yield('scripts')
</body>
</html>