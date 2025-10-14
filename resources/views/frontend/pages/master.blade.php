
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Carbook - @yield('frontend_title')</title>
@include('frontend.layout.inc.style')

  </head>
  <body>
    
@include('frontend.layout.inc.nav')
    <!-- END nav -->
    
@include('frontend.layout.inc.hero_section')
<div>
@yield('frontend_main_content')	
</div>
@include('frontend.layout.inc.footer')
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/>
    </svg>
  </div>


@include('frontend.layout.inc.script')


  </body>
</html>