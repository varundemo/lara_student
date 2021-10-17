@extends('admin.layouts.layout')

@section('title','AdminLTE 3 | Dashboard')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header" >
      <div class="container-fluid" >
 <div class="row" >
 <div class="col-sm-12"  >	      
    <div class="card card-primary" style="background: green;">
              <div class="card-header">
                <h3 class="card-title">Student List</h3>
              </div>
              <!-- /.card-header -->
              <table class="table table-bordered" id="student-list"  style="background: orange;">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Sr No.</th>
                        <th>Registration No.</th>
                        <th>Gender</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roll No</th>
                        <th>Phone No</th>
                        <th>Adress</th>
                        <th>Profile Photo</th>
                        <th>Father Name</th>
                        <th>Mother Name</th>
                        <th>Age</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>   
                              
              </table>
              <!-- form start -->
        
            <!-- </div> -->
         </div>  
     </div>
     </div>
     </div>
     </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script>
     $(document).on("click",".stu-del",function(e){
      e.preventDefault();
      // let id = e.currentTarget.dataset.id;
      var ele = $(this);
      var id = $(this).attr("data-id");
      console.log(id);
      var postdata = {
        "_token":"{{ csrf_token() }}",
        "stu_id":id
      }
      $.post("{{ route('del_stu') }}",postdata,function(response){
            if(response == 1){
              console.log("data delete");
                  ele.parent().parent().fadeOut();
            }else{
              console.log("unable to delete data");
            }
      });
     });
   </script>

  @endsection

