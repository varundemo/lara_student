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
                <h3 class="card-title">List Section</h3>
              </div>
              <!-- /.card-header -->
              <table class="table table-bordered" id="class-section">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Sr No.</th>
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
   $(document).on("click",".del-fac",function(){
            var sec_fil = $(this);
            var sec_id = $(this).attr("data-id");
            var postdata = {
              "_token":"{{ csrf_token() }}",
              "sec_id":sec_id
            }
            $.post("{{ route('delsec') }}",postdata,function(response){
                  if(response == 1){
                    sec_fil.parent().parent().fadeOut();
                    console.log(response);
                  }
                  else{
                    console.log(response);
                  }
                  
            });
   })

   

  </script> 

  @endsection



