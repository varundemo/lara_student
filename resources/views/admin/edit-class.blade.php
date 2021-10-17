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
                <h3 class="card-title">Edit Class</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if(session()->has('msg'))
              		{{ session('msg') }}
              @endif
              
              @if(count($errors) > 0)
              		@foreach($errors->all() as $error)
              				{{ $error }}
              		@endforeach
              @endif
              <form id="frm-add-section" method="post" action="{{ route('edit-class-field') }}">
              	{{ csrf_field() }}

              	<input type="hidden" name="class_data_id" value="{{ $classdata->id }}">
                <div class="card-body">
                  <div class="form-group">
                    <label for="section_name">Class Name Field</label>
                    <input type="text" class="form-control" name="class_new_name" id="section_name" placeholder="Enter Section Name" value="{{ $classdata->name }}">
                  </div>
                  <div class="form-group">
                    <label for="choose_sec" class="{{ $classdata->id }}">Choose Section</label>
                    <select class="form-control" id="choose_sec" name="choose_sec">
                    	<option value="-1">Select Option</option>
                    	@if(count($sec) > 0)
                        @foreach($sec as $index=>$sect)
                          <option value="{{ $sect->id }}" @if($classdata->class_section_id == $sect->id) selected="selected" @endif >{{ $sect->section }}</option>
                        @endforeach
                      @endif
              
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="seat_ava">Seat Available</label>
                    <input type="number" class="form-control" name="seat_ava" id="seat_ava" placeholder="Seat Available" value="{{ $classdata->seats_available }}">
                  </div>
                  <div class="form-group">
                    <label for="sec_status">Status</label>
                    <select id="sec_status" name="class_status" class="form-control">
                    	<option value="1" @if($classdata->status) selected="selected" @endif>Active</option>
                    	<option value="0" @if(!$classdata->status) selected="selected" @endif>InActive</option>
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

