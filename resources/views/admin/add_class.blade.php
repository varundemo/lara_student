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
                <h3 class="card-title">Add Class</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="frm-add-section" method="post" action="{{ route('add_class_fields') }}">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="class_name">Class Name</label>
                    <input type="text" class="form-control" name="new_class_name" id="class_name" placeholder="Enter Section Name">
                  </div>

                  <div class="form-group">
                    <label for="choose_sec">Choose Section</label>
                    <select class="form-control" id="choose_sec" name="choose_sec">
                        <option value="-1">Select Section</option>
                     @if(count($sec) > 0)
                        @foreach($sec as $index=>$sect)
                          <option value="{{ $sect->id }}">{{ $sect->section }}</option>
                        @endforeach
                      @endif
                
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="seat_ava">Seat Available</label>
                    <input type="number" class="form-control" name="seat_ava" id="seat_ava" placeholder="Seat Available">
                  </div>

                  <div class="form-group">
                    <label for="sec_status">Status</label>
                    <select id="sec_status" name="class_status" class="form-control">
                    	<option value="1">Active</option>
                    	<option value="0">InActive</option>
                    </select>
                  </div>
                  
               
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>

                @if(count($errors) > 0)
                  @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                  @endforeach
                @endif

                @if(session()->has("msg"))
                   <div class="alert alert-success">
                      {{ session('msg') }}
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

