<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\FacultyType;
use App\Models\Gender;
use Illuminate\Http\Request;
use DataTables;
use DB;
use Validator;
use URL;

class FacultyController extends Controller
{
    public function addfaculty(){
        $types = FacultyType::where(['status'=>1])->get();
        $genders = Gender::where(['status'=>1])->get();
        return view('admin.add_faculty',['types'=>$types,'genders'=>$genders]);
    }
    public function listfaculty(){
        return view('admin.views.list_faculties');
    }
    public function listfacultyall(){
    	$faculty = DB::table("tbl_faculties as faculty")->select("faculty.*","faculty_type.type as fac_type","gender.type as gen_type")->leftJoin("tbl_genders as gender","gender.id","=","faculty.gender_id")->leftJoin("tbl_faculty_types as faculty_type","faculty.faculty_type_id","=","faculty_type.id")->where(["faculty.status"=>1])->get(true);
    	return DataTables::of($faculty)->addIndexColumn()->addColumn('fac_action',function($faculty){
          return '<a href="'.URL::to('/fac_edit/'.$faculty->id).'" class="btn btn-warning mr-2" data-id="'.$faculty->id.'">Edit</a><a href="" class="btn btn-danger del-fac" name="data" data-id="'.$faculty->id.'">Delete</a>';
      })->editColumn('profile_photo',function($faculty){
            return '<img src="'.URL::to($faculty->profile_photo).'" alt="Images" width="50%"></img>';
      })->rawColumns(['fac_action','profile_photo'])->make(true);
    }

    public function addfacultyfild(Request $request){
          // print_r($request->faculty_photo);
        $valid = Validator::make(array(
          "faculty_type_id"=>$request->choose_type,
          "name"=>$request->faculty_name,
          "email"=>$request->faculty_email,
          "designation"=>$request->faculty_designation,
          "phone_no"=>$request->faculty_phone,
          "gender_id"=>$request->faculty_gender,
          "profile_photo"=>$request->faculty_photo,
          "address"=>$request->fac_address,
          "status"=>$request->faculty_status
     ),array(
          "faculty_type_id"=>"required",
          "name"=>"required",
          "email"=>"required",
          "designation"=>"required",
          "phone_no"=>"required",
          "gender_id"=>"required",
          "profile_photo"=>"required",
          "address"=>"required",
          "status"=>"required"
     ));
     if($valid->fails()){
      return redirect('add_faculty')->withErrors($valid)->withInput();
      // return "This is wrong";
     }
     else{
        $fac_add_obj = new Faculty;
        $fac_add_obj->faculty_type_id  = $request->choose_type;
        $fac_add_obj->name = $request->faculty_name;
        $fac_add_obj->email = $request->faculty_email;
        $fac_add_obj->designation = $request->faculty_designation;
        $fac_add_obj->phone_no = $request->faculty_phone;
        $fac_add_obj->gender_id = $request->faculty_gender;
        
     //    //adding profile photo
        if($request->hasfile("faculty_photo")){
          $profile_img = $request->faculty_photo;
          $imgName = time().".".$profile_img->getClientOriginalName();
          $profile_img->move("resources/assets/images/faculty/",$imgName);
          $upload = "resources/assets/images/faculty/".$imgName;
          print_r($upload);
          $fac_add_obj->profile_photo = $upload;
        }
     //    // adding profile photo

        $fac_add_obj->address = $request->fac_address;
        $fac_add_obj->status = $request->faculty_status;
        $fac_add_obj->save();
        $request->session()->flash("msg","Faculty Data Added");
        return redirect('add_faculty');
     }
    }

    public function facedit($id = null){
      // return "This is faculty page";
      $factype = FacultyType::all();
      $gend = Gender::all();
      // print_r($factype);
      // die();
      $fac_data = Faculty::find($id);
      return view('admin.fac_edit',['fac_data'=>$fac_data,'factype'=>$factype,'gender'=>$gend]);
      // $stu_data = Student::find($id);
      // echo "<pre>";
      // print_r($fac_data);
      // echo "</pre>";

    }

    public function editfacfield(Request $request){
      // echo "<pre>";
      // echo "Photo value";
      // print_r($request->faculty_photo);
      // echo "<pre>";
      // die();
      $valid = Validator::make(array(
            'choose_type'=>$request->choose_type,
            'faculty_name'=>$request->faculty_name,
            'faculty_email'=>$request->faculty_email,
            'faculty_designation'=>$request->faculty_designation,
            'faculty_phone'=>$request->faculty_phone,
            'faculty_photo'=>$request->faculty_photo,
            'faculty_gender'=>$request->faculty_gender,
            'fac_address'=>$request->fac_address,
            'faculty_phone'=>$request->faculty_status,
      ), array(
            'choose_type'=>'required',
            'faculty_name'=>'required',
            'faculty_email'=>'required',
            'faculty_designation'=>'required',
            'faculty_photo'=>'required',
            'faculty_phone'=>'required',
            'faculty_gender'=>'required',
            'fac_address'=>'required',
            'faculty_phone'=>'required',
      ));
      $fac_id = $request->fac_id;  

      if($valid->fails()){
        return redirect('fac_edit/'.$fac_id)->withErrors($valid)->withInput(); 
      }
      else{
          $fac_obj = Faculty::find($fac_id);
          $fac_obj->faculty_type_id = $request->choose_type;
          $fac_obj->name = $request->faculty_name;
          $fac_obj->email = $request->faculty_email;
          $fac_obj->designation = $request->faculty_designation;
          $fac_obj->phone_no = $request->faculty_phone;
          $fac_obj->gender_id = $request->faculty_gender;
          if($request->hasfile("faculty_photo")){
                      // return "image exist";
                     $profile_img = $request->faculty_photo;
                     $imgName = time().".".$profile_img->getClientOriginalName();
                     $profile_img->move("resources/assets/images/faculty/",$imgName);
                     $uploadimg = "resources/assets/images/faculty/".$imgName;
                     $fac_obj->profile_photo = $uploadimg;
                }
          $fac_obj->address = $request->fac_address;          
          $fac_obj->status = $request->faculty_status;    

          $fac_obj->save();
          $request->session()->flash("msg","Faculty Data Updated");
          return redirect('fac_edit/'.$fac_id);      
      }
    }
}

                   

