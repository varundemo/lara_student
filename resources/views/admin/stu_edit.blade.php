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
                <h3 class="card-title">Edit Student</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if(session()->has("msg"))
              <div class="alert alert-success">
                  {{ session('msg') }}
              </div>    
              @endif

              @if(count($errors) > 0)
                  @foreach($errors->all() as $error)
              <div class="alert alert-danger">
                      {{ $error }}
               </div>       
                  @endforeach
              @endif

              <form id="frm-add-section" method="post" action="{{ route('update_stu') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" class="form-control" id="stu_id" name="stu_id" placeholder="Enter student Name" value="{{ $stu_data->id }}">
                <div class="card-body">
                  <div class="form-group">
                    <label for="faculty_reg_no">Registration Number</label>
                    <input type="text" class="form-control" id="faculty_reg_no" name="reg_no" placeholder="Enter student Name" value="{{ $stu_data->reg_no }}">
                  </div>

                  <div class="form-group">
                    <label for="student_gender">Gender</label>
                    <select id="student_gender" name="student_gender" class="form-control" >
                      @if(isset($genders) > 0)
                          @foreach($genders as $index=>$gender)
                              <option value="{{ $gender->id }}" @if($stu_data->gender_id == $gender->id) selected="selected" @endif>{{ $gender->type }}</option>
                          @endforeach
                      @endif
                      
                    </select>
                  </div>

                   <div class="form-group">
                    <label for="student_name">Name</label>
                    <input type="text" class="form-control" id="student_name" name="student_name" placeholder="Enter student Name" value="{{ $stu_data->name }}">
                  </div>

                  <div class="form-group">
                    <label for="student_email">Email</label>
                   <input type="email" name="student_email" id="student_email" placeholder="Enter student Email" class="form-control" value="{{ $stu_data->email }}">
                  </div>

                  <div class="form-group">
                    <label for="student_roll_no">Roll Number</label>
                    <input type="text" class="form-control" id="student_roll_no" name="student_roll_no" placeholder="Enter student Roll Number" value="{{ $stu_data->roll_no }}">
                  </div>

                   <div class="form-group">
                    <label for="student_phone">Phone no</label>
                   <input type="text" name="student_phone" id="student_phone" placeholder="Enter student Phone number" class="form-control" value="{{ $stu_data->phone_no }}">
                  </div> 

                  <div class="form-group">
                    <label for="student_photo">Address</label>
                    <textarea class="form-control" name="stu_add">{{ $stu_data->address }}</textarea>
                  </div> 

                   <div class="form-group">
                    <label for="student_photo">Profile Photo</label>
                   <input type="file" name="student_photo" id="student_photo" class="form-control" value="{{url('/')}}/{{$stu_data->profile_photo}}">
                   <img src="{{url('')}}/{{$stu_data->profile_photo}}" width="20%">
                  </div> 

                  <div class="form-group">
                    <label for="student_father_name">Father's Name</label>
                    <input type="text" class="form-control" id="student_father_name" name="student_father_name" placeholder="Enter student Father Name" value="{{ $stu_data->father_name }}">
                  </div>

                  <div class="form-group">
                    <label for="student_mother_name">Mother's Name</label>
                    <input type="text" class="form-control" id="student_mother_name" name="student_mother_name" placeholder="Enter student mother Name" value="{{ $stu_data->mother_name }}">
                  </div>

                  <div class="form-group">
                    <label for="student_age">Student Age</label>
                    <input type="text" class="form-control" id="student_age" name="student_age" placeholder="Enter student Age" value="{{ $stu_data->age }}">
                  </div>

                  <div class="form-group">
                    <label for="faculty_status">Status</label>
                    <select id="faculty_status" name="stu_status" class="form-control">
                      <option value="1" @if($stu_data->status) selected='selected' @endif>Active</option>
                      <option value="0" @if(!$stu_data->status) selected='selected' @endif>Inactive</option>
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

