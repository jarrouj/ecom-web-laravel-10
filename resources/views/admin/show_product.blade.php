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
    .center{
        margin: auto;
        width: 50%;
        border: 2px solid white;
        text-align: center;
        margin-top: 40px;
        position: relative;
        left:200px;
        border-spacing: 100px 0;
    }
    .font-size{
        text-align: center;
        font-size: 40px;
        padding-top: 20px;
        margin-left: 350px;
    }
th{
    padding:30px;
}
.img_size{
    width: 150px;
    height: 150px;
}
.th_color{
    background-color:skyblue;
}
.mid{
    margin-left: 400px;
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
<div class="mid">
                @if(session()->has('msg'))

                <div class="alert alert-success">
                    <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('msg')}}

                </div>
                @endif
</div>
                <h2 class="font-size">All Products</h2>

                <table class="center">
                    <tr class="th_color">
                        <th>Product title</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Catagory</th>
                        <th>Price</th>
                        <th>Discount price</th>
                        <th>Product image</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>

                    @foreach ($products as $r )


                    <tr >
                        <td>{{$r->title}}</td>
                        <td>{{$r->description}}</td>
                        <td>{{$r->qty}}</td>
                        <td>{{$r->catagory}}</td>
                        <td>{{$r->price}}</td>
                        <td>{{$r->discount_price}}</td>
                        <td>
                            <img class="img_size" src="product/{{$r->image}}">
                        </td>

                        <td>
                            <a class="btn btn-primary" href="{{url('edit',$r->id)}}">Edit</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this')" href="{{url('delete_product',$r->id)}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
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
