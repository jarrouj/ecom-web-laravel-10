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

.input_color{
    color: black;
}

.center{
  margin: auto;
  width: 50%;
  text-align: center;
  position: relative;
  left: 150px;
  top: 50px;
  border: 3px solid white;
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
                <h2 class="h2_f">Add Category</h2>

<form action="{{url('add_catagory')}}" method="POST">
    @csrf

    <input type="text" class="input_color" name="catagory" placeholder="Write Category name">
    <input type="submit" name="submit" class="btn btn-primary" value="Add Category">
</form>


            </div>
            <table class="center">


                <tr>
                    <td>Category Name</td>
                    <td>Action</td>
                </tr>


                @foreach ($data as $r )


                <tr>
                  <td>{{$r->catagory_name}}</td>
                  <td><a onclick="return confirm('Are you sure you want to Delete this')" class="btn btn-danger" href="{{url('delete_catagory',$r->id)}}">Delete</a>
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
