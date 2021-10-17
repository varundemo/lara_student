@extends('admin.layouts.layout')

@section('title','AdminLTE 3 | Dashboard')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
 <div class="row">
 <div class="col-sm-12">	      
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">List Faculty Type</h3>
              </div>
              <!-- /.card-header -->
              <table class="table table-bordered" id="faculty-type">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Section Name</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>                
              </table>
              <!-- form start -->
        
            </div>
         </div>  
     </div>
     </div>
     </div>
     </div>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script>
       $(document).on("click",".del-fac-type",function(){
              var fac_type = $(this);
              var fac_type_id = $(this).attr("data-id");
              console.log(fac_type_id);
              var postdata = {
                "_token":"{{ csrf_token() }}",
                "fac_type_id":fac_type_id
              }
              $.post("{{ route('delfactype') }}",postdata,function(response){
                    console.log(response);
              });
       });
     </script>
   

  @endsection

