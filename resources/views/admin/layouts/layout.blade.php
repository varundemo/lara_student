<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

 <!--  -->
@include('admin.layouts.styles') 


</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

@include('admin.layouts.header') 

  <!-- Main Sidebar Container -->
  @include('admin.layouts.left_sidebar')


  <!-- Content Wrapper. Contains page content -->
  @section('content')
  @show
  <!-- /.content-wrapper -->

@include('admin.layouts.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@include('admin.layouts.script')



</body>
</html>
