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
                <h3 class="card-title">List Class</h3>
              </div>
              <!-- /.card-header -->
              <table class="table table-bordered" id="list-classes">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Section</th>
                        <th>Seats Availabel</th>
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
      $(document).ready(function(){
        // $(".class-delete").mouseenter(function(e){
        $(".class-delete").click(function(e){
          console.log(e);
          // var no = e.target.attributes[2].nodeValue;
          var ele = $(this);
          
          var id = e.target.dataset.id;
          var no = e.type;
          // var data = $(this).fadeOut();
          console.log(no);
          data = {
            "_token":"{{ csrf_token() }}",
            "class_id":id
          }
          $.post("{{ route('del_class') }}",data,function(response){
                console.log(response);
                if(response == 1){
                    ele.parent().parent().fadeOut();
              }else{
                console.log("unable to delete data");
              }

          });
        })
      })
    </script> 

  @endsection

