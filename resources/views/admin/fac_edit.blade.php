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
              

              <form id="frm-add-section" method="post" action="{{ URL::to('/edit-faculty-fild') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                 <input type="hidden" class="form-control" id="fac_id" name="fac_id" placeholder="Enter student Name" value="{{ $fac_data->id }}">
                <div class="card-body">
                  <div class="form-group">
                    <label for="choose_type">Choose Type</label>
                    <select id="choose_type" name="choose_type" class="form-control">
                    		@foreach($factype as $type)
                          <option value="{{ $fac_data->faculty_type_id }}" @if($fac_data->faculty_type_id == $type->id) selected="selected" @endif>{{ $type->type }}</option>
                      		@endforeach
                    </select>
                  </div>

                  	<?php  
                  	$str = $fac_data->faculty_type_id;
                  		$newarr = explode(",",$str);
                  		if(in_array(1, $newarr)){
                  			echo "selected";
                  		}
                  		else{
                  			echo "no value";
                  		}
                  	?>
                  	<div>
			       <select name="cars" id="cars" multiple>
						@foreach($factype as $type)
                          <option value="" @if(in_array($type->id,$newarr)) selected="selected" @endif>{{ $type->type }}</option>
                      		@endforeach
					</select>
					</div>

                  <div class="form-group">
                    <label for="faculty_name">Name</label>
                    <input type="text" class="form-control" id="faculty_name" name="faculty_name" placeholder="Enter Faculty Name" value="{{ $fac_data->name }}">
                  </div>
               
                  <div class="form-group">
                    <label for="faculty_email">Email</label>
                   <input type="email" name="faculty_email" id="faculty_email" placeholder="Enter Faculty Email" class="form-control" value="{{ $fac_data->email }}">
                  </div>

                  <div class="form-group">
                    <label for="faculty_designation">Designation</label>
                   <input type="text" name="faculty_designation" id="faculty_designation" placeholder="Enter Faculty Designation" class="form-control" value="{{ $fac_data->designation }}">
                  </div> 

                  <div class="form-group">
                    <label for="faculty_phone">Phone no</label>
                   <input type="number" name="faculty_phone" id="faculty_phone" placeholder="Enter Faculty Phone number" class="form-control" value="{{ $fac_data->phone_no }}">
                  </div>   

                  <div class="form-group">
                    <label for="faculty_gender">Gender</label>
                    <select id="faculty_gender" name="faculty_gender" class="form-control">
                   			@foreach($gender as $gen)
                          <option value="{{ $fac_data->gender_id }}" @if($gen->id == $fac_data->gender_id) selected="selected" @endif>{{ $gen->type }}</option>
                      		@endforeach
                    
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="faculty_photo">Profile Photo</label>
                   <input type="file" name="faculty_photo" id="faculty_photo" class="form-control">
                   <div class="mt-2 mx-5">
	                   <img src="{{ url('/') }}/{{ $fac_data->profile_photo }}" width="100px" height="100px">
                   </div>
                  </div> 

                   <div class="form-group">
                    <label for="faculty_photo">Address</label>
                    <textarea class="form-control" name="fac_address" id="fac_address">{{ $fac_data->address }}</textarea>
                    
                  </div>  

                  <div class="form-group">
                    <label for="faculty_status">Status</label>
                    <select id="faculty_status" name="faculty_status" class="form-control">
                      <option value="1" @if($fac_data->status) selected="selected" @endif>Active</option>
                      <option value="0" @if(!$fac_data->status) selected="selected" @endif>Inactive</option>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
   $(document).on("click",".class-section-delete",function(){
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

