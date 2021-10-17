<?php

namespace App\Http\Controllers;

use App\Models\Student;

use App\Models\Gender;
use Illuminate\Http\Request;
use Validator;
use DataTables;
use DB;
use URL;

class StudentController extends Controller
{
    public function addstudent(){
        $genders = Gender::where(['status'=>1])->get();
        return view('admin.add_student',['genders'=>$genders]);
    }
    public function liststudent(){
        return view('admin.student_list');
    }
    // public function liststudentall(){
    // 	re
    // }
    public function liststudent_all(){
    	$student_list = DB::table("tbl_students as student")->select("student.*","gender.type")->leftJoin("tbl_genders as gender","student.gender_id","=","gender.id")->get();
    	return DataTables::of($student_list)->addIndexColumn()->addColumn('stu_action',function($student_list){
          return '<a href="'.URL::to('/stu_edit/'.$student_list->id).'" class="btn btn-warning mr-2" data-id="'.$student_list->id.'">Edit</a><a href="" class="btn btn-danger stu-del" name="data" data-id="'.$student_list->id.'">Delete</a>';
      })->editColumn('type',function($student_list){
    			return strtolower($student_list->type);
    	})->editColumn("profile_photo",function($student_list){
            if(($student_list)->profile_photo){
                return '<img src="'.$student_list->profile_photo.'" class="stu-img"></img>';
            }
        })->rawColumns(["profile_photo","stu_action"])->make(true);
    }

    public function stulistfield(Request $request){
          $valid = Validator::make(array(
          "reg_no"=>$request->reg_no,
          "gender_id"=>$request->student_gender,
          "name"=>$request->student_name,
          "email"=>$request->student_email,
          "roll_no"=>$request->student_roll_no,
          "phone_no"=>$request->student_phone,
          "address"=>$request->stu_add,
          "father_name"=>$request->student_father_name,
          "mother_name"=>$request->student_mother_name,
          "age"=>$request->student_age,
          "status"=>$request->stu_status
             ),array(
                  "reg_no"=>"required",
                  "gender_id"=>"required",
                  "name"=>"required",
                  "email"=>"required",
                  "roll_no"=>"required",
                  "phone_no"=>"required",
                  "address"=>"required",
                  "father_name"=>"required",
                  "mother_name"=>"required",
                  "age"=>"required",
                  "status"=>"required",
             ));
             if($valid->fails()){
              return redirect('add_student')->withErrors($valid)->withInput();
              // return "This is wrong";
             }

              

                $stu_obj = new Student;
                $stu_obj->reg_no = $request->reg_no;
                $stu_obj->gender_id = $request->student_gender;
                $stu_obj->name = $request->student_name;
                $stu_obj->email = $request->student_email;
                $stu_obj->roll_no = $request->student_roll_no;
                $stu_obj->phone_no = $request->student_phone;
                $stu_obj->address = $request->stu_add;
                if($request->hasfile("student_photo")){
                    // return "image exist";
                   $profile_img = $request->student_photo;
                   $imgName = time().".".$profile_img->getClientOriginalName();
                   $profile_img->move("resources/assets/images/student/",$imgName);
                   $uploadimg = "resources/assets/images/student/".$imgName;
                   $stu_obj->profile_photo = $uploadimg;
               }
                $stu_obj->father_name = $request->student_father_name;
                $stu_obj->mother_name = $request->student_mother_name;
                $stu_obj->age = $request->student_age;
                $stu_obj->status = $request->stu_status;

                $stu_obj->save();
                $request->session()->flash("msg","Student Data Added");
                return redirect('add_student');

                // print_r($request->all());


    }

    public function stuedit($id = null){
      $genders = Gender::where(['status'=>1])->get();
      $stu_data = Student::find($id);
      return view("admin.stu_edit",['stu_data'=>$stu_data,'genders'=>$genders]);
    }

    public function update_stu(Request $request){
             $valid = Validator::make(array(
          "reg_no"=>$request->reg_no,
          "gender_id"=>$request->student_gender,
          "name"=>$request->student_name,
          "email"=>$request->student_email,
          "roll_no"=>$request->student_roll_no,
          "phone_no"=>$request->student_phone,
          "address"=>$request->stu_add,
          "father_name"=>$request->student_father_name,
          "mother_name"=>$request->student_mother_name,
          "age"=>$request->student_age,
          "status"=>$request->stu_status
             ),array(
                  "reg_no"=>"required",
                  "gender_id"=>"required",
                  "name"=>"required",
                  "email"=>"required",
                  "roll_no"=>"required",
                  "phone_no"=>"required",
                  "address"=>"required",
                  "father_name"=>"required",
                  "mother_name"=>"required",
                  "age"=>"required",
                  "status"=>"required",
             ));
      $stu_id = $request->stu_id;  
      // echo $stu_id;     
             if($valid->fails()){
              return redirect('stu_edit/'.$stu_id)->withErrors($valid)->withInput();
              // return "This is wrong";
             }
             else{
                  $stu_obj = Student::find($stu_id);
                  $stu_obj->reg_no = $request->reg_no;
                  $stu_obj->gender_id = $request->student_gender;
                  $stu_obj->name = $request->student_name;
                  $stu_obj->email = $request->student_email;
                  $stu_obj->roll_no = $request->student_roll_no;
                  $stu_obj->phone_no = $request->student_phone;
                  $stu_obj->address = $request->stu_add;
                 if($request->hasfile("student_photo")){
                      // return "image exist";
                     $profile_img = $request->student_photo;
                     $imgName = time().".".$profile_img->getClientOriginalName();
                     $profile_img->move("resources/assets/images/student/",$imgName);
                     $uploadimg = "resources/assets/images/student/".$imgName;
                     $stu_obj->profile_photo = $uploadimg;
                 }
                  $stu_obj->father_name = $request->student_father_name;
                  $stu_obj->mother_name = $request->student_mother_name;
                  $stu_obj->age = $request->student_age;
                  $stu_obj->status = $request->stu_status;

                  $stu_obj->save();
                  $request->session()->flash("msg","Student Data Added");
                  return redirect('stu_edit/'.$stu_id);
             }
    }

    public function delstu(Request $request){
       $id = $request->stu_id;
       $stu_data = Student::find($id);
       if(isset($stu_data)){
        // return $stu_data;
            // $stu_data->delete();
            return 1;
       }
       else{
          return "unable to delete";
       }
    }
}
