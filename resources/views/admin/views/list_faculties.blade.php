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
                <h3 class="card-title">List Faculty</h3>
              </div>
              <!-- /.card-header -->
              <table class="table table-bordered" id="faculty">
                    <thead>
                      <tr>
                         <th>ID</th>
                        <th>Sr No.</th>
                        <th>Faculty Type Name</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Designation</th>
                        <th>Phone Number</th>
                        <th>Gender</th>
                        <th>Profile Photo</th>
                        <th>Adress</th>
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

   

  @endsection

