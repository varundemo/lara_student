<?php

namespace App\Http\Controllers;

use App\Models\FacultyType;
use Illuminate\Http\Request;
use DataTables;
use URL;
use Validator;
// use DB;

class FacultyTypeController extends Controller
{
   public function facultytype(){
    return view('admin.add_faculty_type');
   }
   public function facultytypelist(){
    return view('admin.list_faculty_type');
   }
   // public function facultytypeall(){
   // 		$faculty_list = FacultyType::query();
   // 		return DataTables::of($faculty_list)->addColumn('edit_btn',function(){
   // 			return '<a href="">Edit</a>';
   // 		})->rawColumns('edit_btn')->make(true);
   // }
      public function facultytypeall(){
         $faculty_list = FacultyType::query();
         return DataTables::of($faculty_list)->addColumn('edit_btn',function($faculty_list){
            return '<a href="'.URL::to("/edit_faculty_type/".$faculty_list->id).'" data-id="'.$faculty_list->id.'" class="btn btn-warning mr-2">Edit</a><a href="javascript:void(0)" data-id="'.$faculty_list->id.'" class="btn btn-danger del-fac-type">Delete</a>';
         })->editColumn('status',function($faculty_list){ 
                           if($faculty_list->status){
                              return '<button class="btn btn-success">Active</button>'; 
                           }else{
                              return '<button class="btn btn-danger">InActive</button>';
                           } })->rawColumns(['edit_btn','status'])->make(true);
   }
   public function facultyfield(Request $request){
      $valid = Validator::make(array(
               "faculty_type"=>$request->faculty_type
      ),array(
               "faculty_type"=>"required"
      ));
      if($valid->fails()){
         return redirect('/faculty_type')->withErrors($valid)->withInput();
      }
   	else{
         $fac_type = new FacultyType;
         $fac_type->type = $request->faculty_type;
         $fac_type->status = $request->faculty_status;
         $fac_type->save();
         $request->session()->flash("msg","Faculty Type Added");
         return redirect('/faculty_type');
      }
   	
   	
   }
   public function editfacultytype($id=null){
      $facultytype = FacultyType::find($id);
      return view('admin.edit_faculty_type',['facultytype'=>$facultytype]);
   }

   public function updatefacultytype(Request $request){
      $validator = Validator::make(array(
               "type"=>$request->faculty_type
      ),array(
               "type"=>"required"
      ));
      $faculty_id = $request->faculty_type_id;
      if($validator->fails()){
         return redirect('/edit_faculty_type/'.$faculty_id)->withErrors($validator)->withInput();
      }else{
         $fac_type_obj = FacultyType::find($faculty_id);
         $fac_type_obj->type = $request->faculty_type;
         $fac_type_obj->status = $request->faculty_status;
         $fac_type_obj->save();
         $request->session()->flash("msg","Faculty Type Updated");
         return redirect('/edit_faculty_type/'.$faculty_id);
      }

   }

   public function delfacultytype(Request $request){
         $id = $request->fac_type_id;
         $fac_type_data = FacultyType::find($id);
         if(isset($fac_type_data)){
            $fac_type_data->delete();
            return "data deleted";
         }else{
            return "Unable to delete";
         }
   }
}
