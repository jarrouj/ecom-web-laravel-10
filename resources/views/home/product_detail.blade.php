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



        <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; width:50%; padding:30px;">
            <div class="box">
               <div class="option_container">
                  <div class="options">
                     {{-- <a href="{{url('product_detail',$product->id)}}" class="option1">
                     Product detail
                     </a>
                     <a href="" class="option2">
                     Buy Now
                     </a> --}}
                  </div>
               </div>
               <div class="img-box" style="padding: 20px;">
                  <img src="/product/{{$product->image}}" alt="">
               </div>
               <div class="detail-box">
                  <h5>
                     {{$product->title}}
                  </h5>

                  @if($product->discount_price!=null)

                  <h6 style="color: red">
                   Discount Price:
                   <br>
                   ${{$product->discount_price}}

                   <h6 style="text-decoration:line-through; color:blue;">
                       Price:
                       <br>
                       ${{$product->price}}
                    </h6>

                    @else
                    <h6 style="color: black;">
                       Price:
                       <br>
                       ${{$product->price}}
                    </h6>
                </h6>

                @endif
                <h6>Product Catagory:{{$product->catagory}}</h6>
                <h6>Product details:{{$product->description}}</h6>
                <h6>Available Quantity:{{$product->qty}}</h6>

                <form action="{{url('add_cart',$product->id)}}" method="POST">
                    @csrf
                    <div class="row">

                        <div class="col-md-3">
                    <input type="number" name="qty" value="1" min="1" style="width: 55px;">
                        </div>

                        <div class="col-md-3">
                    <input type="submit" value="Add to cart">
                        </div>

                    </div>
                  </form>


               </div>
            </div>
         </div>









      <!-- why section -->

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
