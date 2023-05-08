<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
     @include('home.css')
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.heder')
         <!-- end header section -->
         <!-- slider section -->
         @include('home.slider')
         <!-- end slider section -->
      </div>
      <!-- why section -->
      @include('home.why')
      <!-- end why section -->

      <!-- arrival section -->
      @include('home.arrival')
      <!-- end arrival section -->

      <!-- product section -->
      @include('home.product')
      <!-- end product section -->

      <!-- subscribe section -->
      @include('home.subscibe')
      <!-- end subscribe section -->
      <!-- client section -->
     @include('home.client')
      <!-- end client section -->
      <!-- footer start -->
     @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

         </p>
      </div>
      <!-- jQery -->
     @include('home.js')
   </body>
</html>
