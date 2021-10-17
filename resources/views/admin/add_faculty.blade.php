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
                <h3 class="card-title">Add Faculty</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              

              <form id="frm-add-section" method="post" action="{{ URL::to('/add-faculty-fild') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="choose_type">Choose Type</label>
                    <select id="choose_type" name="choose_type" class="form-control">
                      @if(count($types) > 0)
                        @foreach($types as $index=>$type)
                          <option value="{{ $type->id }}">{{ $type->type }}</option>
                        @endforeach
                      @endif
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="faculty_name">Name</label>
                    <input type="text" class="form-control" id="faculty_name" name="faculty_name" placeholder="Enter Faculty Name">
                  </div>
               
                  <div class="form-group">
                    <label for="faculty_email">Email</label>
                   <input type="email" name="faculty_email" id="faculty_email" placeholder="Enter Faculty Email" class="form-control">
                  </div>

                  <div class="form-group">
                    <label for="faculty_designation">Designation</label>
                   <input type="text" name="faculty_designation" id="faculty_designation" placeholder="Enter Faculty Designation" class="form-control">
                  </div> 

                  <div class="form-group">
                    <label for="faculty_phone">Phone no</label>
                   <input type="number" name="faculty_phone" id="faculty_phone" placeholder="Enter Faculty Phone number" class="form-control">
                  </div>   

                  <div class="form-group">
                    <label for="faculty_gender">Gender</label>
                    <select id="faculty_gender" name="faculty_gender" class="form-control">
                      @if(count($genders) > 0)
                        @foreach($genders as $index=>$gender)
                          <option value="{{ $gender->id }}">{{ $gender->type }}</option>
                        @endforeach
                      @endif
                    
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="faculty_photo">Profile Photo</label>
                   <input type="file" name="faculty_photo" id="faculty_photo" class="form-control">
                  </div> 

                   <div class="form-group">
                    <label for="faculty_photo">Address</label>
                    <textarea class="form-control" name="fac_address" id="fac_address"></textarea>
                  </div>  

                  <div class="form-group">
                    <label for="faculty_status">Status</label>
                    <select id="faculty_status" name="faculty_status" class="form-control">
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
                    </select>
                  </div>
                  
               
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>

              @if(count($errors) > 0)
                  @foreach($errors->all() as $error)
                    <div class="btn btn-danger">
                      {{ $error }}
                    </div>  
                  @endforeach
              @endif

              @if(session()->has("msg"))
                <div class="btn btn-success">
                    {{ session("msg") }}
                </div>  
              @endif
            </div>
         </div>  
     </div>
     </div>
     </div>
     </div>

  @endsection

