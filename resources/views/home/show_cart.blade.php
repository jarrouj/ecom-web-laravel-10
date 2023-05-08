<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
     @include('home.css')


<style>
  .center{
    margin: auto;
    width: 50%;
    text-align: center;
    padding: 30px;
  }
table,tr,th{
  border: 1px solid grey;

}



.th_des{
  font-size: 30px;
  padding: 5px;
  background: skyblue;
}

.img_des{
    height: 200px;
    width: 200px;
}
.total_des{
    font-size: 20px;
    padding: 40px;
}

</style>






   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.heder')
         <!-- end header section -->



<div class="center">
    @if(session()->has('msg'))

    <div class="alert alert-success">
        <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
        {{session()->get('msg')}}

    </div>
    @endif
 <table>
  <tr>
    <th class="th_des">Product title</th>
    <th class="th_des">Quantity</th>
    <th class="th_des">Price</th>
    <th class="th_des">Image</th>
    <th class="th_des">Action</th>
    </tr>

    <?php $totalprice=0; ?>
    @foreach ($cart as $r )


<tr>
<td>{{$r->product_title}}</td>
<td>{{$r->qty}}</td>
<td>${{$r->price}}</td>
<td><img src="/product/{{$r->image}}" class="img_des"></td>
<td>
    <a onclick="return confirm('Are tou sure to remove this product')" href="{{url('remove_cart',$r->id)}}"
       class="btn btn-danger"  ><i class="fa fa-trash"></i></td>

<?php $totalprice=$totalprice + $r->price; ?>
@endforeach
</tr>
</table>


<div>
    <h1 class="total_des">Total : ${{$totalprice}}</h1>

</div>
<div>
   <h1 style="font-size: 25px; padding-bottom:15px;">Proceed to order</h1>
   <a href="{{url('cash_order')}}" class="btn btn-success">Cash On Delivery</a>
   <a href="{{url('stripe',$totalprice)}}" class="btn btn-success">Pay Using Card</a>


</div>


</div>

      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

         </p>
      </div>
      <!-- jQery -->
     @include('home.js')
   </body>
</html>
