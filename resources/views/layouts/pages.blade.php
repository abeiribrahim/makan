<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>

  
  @include('includes.spinner')
     
  @include('includes.navbar')

  @include('includes.header')


  @include('includes.search')
  @yield('content')
  @include('includes.footer')
</body>

</html>