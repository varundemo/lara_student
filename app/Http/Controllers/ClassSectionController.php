<?php

namespace App\Http\Controllers;

use App\Models\ClassSection;
// use App\Models\ClassSection;
use Illuminate\Http\Request;
use DataTables;
use Validator;
use URL;


class ClassSectionController extends Controller
{
   public function add_sec(){
     return view('admin.add_section');
   }
   public function list_sec(){
    return view('admin.list_section');
   }
   public function list_all_sec(){
   		$student_sec = ClassSection::query();
    	return DataTables::of($student_sec)->addIndexColumn()->addColumn('action_btn',function($student_sec){
    				return '<a href="'.URL::to("/edit_sec/".$student_sec->id).'" class="btn btn-info mr-2" data-id="'.$student_sec->id.'">Edit</a>'.'<a href="javascript:void(0)" class="btn btn-danger class-section-delete" data-id="'.$student_sec->id.'">Delete</a>';
    	})->editColumn('status',function($student_sec){
            if($student_sec->status){
                return '<button class="btn btn-success">Active</button>';
          }else{
                return '<button class="btn btn-danger">InActive</button>';
          }
      })->rawColumns(['action_btn','status'])->make(true);
    	// return DataTables::of($student_sec)->make(true);
   }

   public function add_sec_field(Request $request){
     $valid = Validator::make(array(
          "section"=>$request->section
     ),array(
          "section"=>"required"
     ));
     if($valid->fails()){
      return redirect('add_sec')->withErrors($valid)->withInput();
      // return "This is wrong";
     }
     else{
          $sec_obj = new ClassSection;
         $sec_obj->section = $request->section;
         $sec_obj->status = $request->dd_status;
         $sec_obj->save();
         $request->session()->flash("msg","Section Added");
         return redirect('add_sec');
     }
   
   }

   public function edit_sec($id= null){
        $sec_data = ClassSection::find($id);
    return view("admin.edit_sec",['sec_data'=>$sec_data]);
   }

   public function update_sec(Request $request){
         // echo $request->sec_id;
          $valid = Validator::make(array(
                "section"=>$request->section,
                "status"=>$request->dd_status
          ),array(
                "section"=>"required",
                "status"=>"required"
          ));
        $sec_id = $request->sec_id;
        // $sec_data = ClassSection::find($sec_id);  
      if($valid->fails()){
        return redirect('edit_sec/'.$sec_id)->withErrors($valid)->withInput();
      }
      else{
        $sec_data = ClassSection::find($sec_id);
        $sec_data->section = $request->section;
        $sec_data->status = $request->dd_status;
        $sec_data->save();
        $request->session()->flash("msg","Section Data Updated");
        return redirect('edit_sec/'.$sec_id);
      }
   }

   public function delsec(Request $request){
        $id = $request->sec_id;
        $sec_data = ClassSection::find($id);
        if(isset($sec_data->id)){
          // $sec_data->delete();
          return 1;
        }
        else{
          return 0;
        }

      // return "new page";
   }

   
}
