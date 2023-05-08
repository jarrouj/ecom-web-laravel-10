<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
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

.div-center{
   text-align: center;
   padding-top: 40px;
  position: relative;
  left: 200px;
}
.h2_f{
    font-size: 40px;
    padding-bottom: 40px;

}
.text_color{
    color: black;
    padding-bottom: 20px;
}
label{
    display: inline-block;
    width: 200px;

}
.div_design{
    padding-bottom: 15px;

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
            <div class="div-center">
                @if(session()->has('msg'))

                <div class="alert alert-success">
                    <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('msg')}}

                </div>
                @endif

                <h2 class="h2_f">Update Product</h2>

                <form action="{{url('update_product_confirm',$product->id)}}" method="POST" enctype="multipart/form-data">
                 @csrf
                <div class="div_design">
                <label>Product Title:</label>
                <input type="text" name="title" placeholder="Write a title" class="text_color" required value="{{$product->title}}">
</div>
<div class="div_design">
    <label>Product Description:</label>
    <input type="text" name="description" placeholder="Write a Description" class="text_color" required value="{{$product->description}}">
</div>
<div class="div_design">
    <label>Product price:</label>
    <input type="number" name="price" placeholder="Enter price" class="text_color" required value="{{$product->price}}">
</div>
<div class="div_design">
    <label>Discount Price:</label>
    <input type="number" name="discount" placeholder="Enter discount" class="text_color" value="{{$product->discount_price}}">
</div>
<div class="div_design">
    <label>Product Quantity:</label>
    <input type="number" name="qty" placeholder="Enter qty" min="0" class="text_color" required value="{{$product->qty}}">
</div>

<div class="div_design">
    <label>Product Category:</label>
   <select class="text_color" name="catagory" required >
    <option value="{{$product->catagory}}" selected="">{{$product->catagory}}</option>

    @foreach($catagory as $r)
    <option value="{{$r->catagory_name}}">{{$r->catagory_name}}</option>
    @endforeach
   </select>
</div>

<div class="div_design">
    <label>current Product Image :</label>
    <img src="/product/{{$product->image}}" height="100" width="100" style="margin:auto;">
</div>




<div class="div_design">
    <label>Change Product Image :</label>
    <input type="file" name="image" >
</div>



            <div class="div_design">
                <input type="submit" value="Update Product" class="btn btn-primary">
            </div>
                </form >
            </div>
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
