<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
     @include('home.css')
     <style>
        .center{
            margin: auto;
            width: 70%;
            padding: 30px;
            text-align: center;
        }
        table,th,td{
            border: 1px solid black;
        }
        .th_des{
            padding: 10px;
            background-color: skyblue;
            font-size: 20px;
            font-weight: bold;
        }
        </style>
   </head>
   <body>

         <!-- header section strats -->
        @include('home.heder')
         <!-- end header section -->


      <div class="center">
        <table >
            <tr>
                <th class="th_des">Prodct Title</th>
                <th class="th_des">Quantity</th>
                <th class="th_des">Price</th>
                <th class="th_des">Payment Status</th>
                <th class="th_des">Delivery Status</th>
                <th class="th_des">Image</th>
                <th class="th_des">Cancel Order</th>


            </tr>
            @foreach($order as $r)
            <tr>
                <td>{{$r->product_title}}</td>
                <td>{{$r->qty}}</td>
                <td>{{$r->price}}</td>
                <td>{{$r->payment_status}}</td>
                <td>{{$r->delivery_status}}</td>
                <td><img src="/product/{{$r->image}}" style="width: 200px;height:200px;"></td>


                <td>
                    @if($r->delivery_status=='processing')
                    <a onclick="return confirm('Are you sure you want to cancel')" href="{{url('cancel_order',$r->id)}}" class="btn btn-danger" style="color:white">Cancel</a>

                @else
                <p>Cancel</p>


                @endif

                </td>
            </tr>

            @endforeach
        </table>
      </div>

      <!-- jQery -->
     @include('home.js')
   </body>
</html>
