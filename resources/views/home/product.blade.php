<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
       </div>


       <div>
        <form action="{{url('product_search')}}" method="GET">
            <input type="text" name="search" placeholder="Search..." style="width:500px;">
            <input type="submit" value="search">
        </form>
       </div>













       <div class="row">
        @foreach ($product as $r )


          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="{{url('product_detail',$r->id)}}" class="option1">
                      Product detail
                      </a>
                      <form action="{{url('add_cart',$r->id)}}" method="POST">
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
                <div class="img-box">
                   <img src="/product/{{$r->image}}" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                      {{$r->title}}
                   </h5>

                   @if($r->discount_price!=null)

                   <h6 style="color: red">
                    Discount Price:
                    <br>
                    ${{$r->discount_price}}

                    <h6 style="text-decoration:line-through; color:blue;">
                        Price:
                        <br>
                        ${{$r->price}}
                     </h6>

                     @else
                     <h6 style="color: black;">
                        Price:
                        <br>
                        ${{$r->price}}
                     </h6>
                 </h6>

                 @endif

                </div>
             </div>
          </div>
          @endforeach

          <span style="padding-top:20px;">
          {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
          </span>

    </div>


         <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>


 </section>







 

