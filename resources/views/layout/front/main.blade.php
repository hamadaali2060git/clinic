<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layout.front.head')
  </head>
  @if(Route::is(['map-grid']))
  <body class="map-page">
  @endif
@include('layout.front.header')
@yield('content')
@if(!Route::is(['chat-doctor','map-grid','map-list','chat','voice-call','video-call']))
@include('layout.front.footer')
@endif
@include('layout.front.footer-scripts')
  </body>
</html>
<script>
$(document).ready(function(){
  // alert(1);
 /*$('.submenu li a').click(function(){
   $(.submenu li a).removeClass("active");
   $(this).addClass("active");
   $('.has-submenu a').removeClass("active");
   $('.has-submenu a').addClass("active");

   //$(this).toggleClass("active");
 });*/
});
</script>
