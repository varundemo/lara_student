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
                <h3 class="card-title">Add Faculty Type</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="frm-add-section" action="{{ route('addfactypefield') }}" method="post">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="faculty_type">Faculty Type</label>
                    <input type="text" class="form-control" name="faculty_type" id="faculty_type" placeholder="Enter Faculty Type">
                  </div>
               
                  <div class="form-group">
                    <label for="faculty_status">Status</label>
                    <select id="faculty_status" name="faculty_status" class="form-control">
                    	<option value="1">Active</option>
                    	<option value="0">InActive</option>
                    </select>
                  </div>
                  
               
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                     @if(session()->has('msg'))
                <div class="alert alert-success mt-2">
                    {{ session('msg') }}
                </div>
                    @endif

                    @if(count($errors) > 0)
                        @foreach($errors->all() as $error)
                           <div class="alert alert-danger mt-2">
                            {{ $error }}
                        @endforeach
                          </div>
                    @endif
              </form>
            </div>
         </div>  
     </div>
     </div>
     </div>
     </div>

  @endsection

