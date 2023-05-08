<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />


    <style>
        .title_des{
            font-size: 35px;
            text-align: center;
            font-weight: bold;
            margin-left: 100px;
            padding-bottom: 40px;
        }


        .table_des{
            border: 2px solid white;
            width: 70%;

            padding-top: 50px;
            text-align: center;
            position: relative;
            left: 50px;

        }

        th{
            font-size: 20px;
            padding: 25px;
        }



        

        </style>

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
       @include('admin.nav')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">



                <h1 class="title_des">All Orders</h1>

            <div style="padding-left:600px; padding-bottom:30px;">

                <form action="{{url('search')}}" method="get">
                    @csrf
                    <input type="text" name="search" placeholder="Search..." style="color:black;">
                    <input type="submit" value="search" class="btn btn-outline-primary">
                </form>
            </div>

                <table class="table_des">

                    <tr style="background: skyblue;">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Product Title</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Payment Status</th>
                        <th>Delivery Status</th>
                        <th>Image</th>
                        <th>Delivered</th>
                    </tr>

                    @forelse ($order as $r)


                    <tr>

                        <td>{{$r->name}}</td>
                        <td>{{$r->email}}</td>
                        <td>{{$r->address}}</td>
                        <td>{{$r->phone}}</td>
                        <td>{{$r->product_title}}</td>
                        <td>{{$r->qty}}</td>
                        <td>{{$r->price}}</td>
                        <td>{{$r->payment_status}}</td>
                        <td>{{$r->delivery_status}}</td>
                        <td>
                            <img src="/product/{{$r->image}}" style="width: 200px;height:100px;">
                        </td>
                        <td>
                        @if($r->delivery_status=='processing')

                        <a href="{{url('ordered',$r->id)}}" class="btn btn-primary" onclick="return confirm('Are you sure this product is delivered')">Delivered</a>


                        @else
                       <p style="color:green">Delivered</p>
                        </td>
                        @endif

                    </tr>

                    @empty

                   <tr>
                    <td colspan="14"> No Data Found ...
                    </td>
                   </tr>
                    @endforelse
                </table>









            </div>
        </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         @include('admin.footer')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.js')
    <!-- End custom js for this page -->
  </body>
</html>
