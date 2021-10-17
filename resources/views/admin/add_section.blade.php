@extends('admin.layouts.layout')

@section('title','AdminLTE 3 | Dashboard')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
 <div class="row">
 <div class="col-sm-6">	      
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Section</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if(session()->has("msg"))
                {{ session('msg') }}
              @endif

              @if(count($errors) > 0)
                 @foreach($errors->all() as $error)
                      {{ $error }}
                 @endforeach
              @endif
              <form id="frm-add-section" action="{{ route('add-sec-field') }}">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="section_name">Section Name</label>
                    <input type="text" class="form-control" id="section_name" placeholder="Enter Section Name" name="section">
                  </div>
                  <div class="form-group">
                    <label for="dd_status">Status</label>
                    <select id="dd_status" class="form-control" name="dd_status">
                    	<option value="1">Active</option>
                    	<option value="0">InActive</option>
                    </select>
                  </div>
                 
               
               
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
         </div>  
     </div>
     </div>
     </div>
     </div>

  @endsection



