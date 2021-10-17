<?php

namespace App\Http\Controllers;
// use App\Models\ClassSection;

use App\Models\SchoolClass;
use App\Models\ClassSection;
use Illuminate\Http\Request;
use DataTables;
use Validator;
use DB;
use URL;

class SchoolClassController extends Controller
{
   public function addcalss(){
    $sec = ClassSection::where(['status'=>1])->get();
    return view('admin.add_class',['sec'=>$sec]);
   }
   public function listcalss(){
    return view('admin.list_class');
   }

   public function class_field(Request $request){
        $valid = Validator::make(array(
            "name"=>$request->new_class_name,
            "class_section_id"=>$request->choose_sec,
            "seats_available"=>$request->seat_ava,
            "status"=>$request->class_status
        ),array(
            "name"=>"required",
            "class_section_id"=>"required",
            "seats_available"=>"required",
            "status"=>"required"
        ));
        if($valid->fails()){
          return redirect('/addclass')->withErrors($valid)->withInput();
        }
        else{
          $class_obj = new SchoolClass;
          $class_obj->name = $request->new_class_name;
          $class_obj->class_section_id = $request->choose_sec;
          $class_obj->seats_available = $request->seat_ava;
          $class_obj->status = $request->class_status;
          $class_obj->save();
          $request->session()->flash("msg","Class data Added");
          return redirect('/addclass');
        }
   }
   // public function listcalssall(){
   // 	 $list_class = SchoolClass::query();
   // 	 return DataTables::of($list_class)->editColumn('class_action',function($list_class){
   // 	 	return '<a href="" class="btn btn-info mr-2 class-list-edit" data-id="'.$list_class->id.'">Edit</a>'.'<a href="" class="btn btn-danger class-list-delete" data-id="'.$list_class->id.'">Delete</a>';
   // 	 })->rawColumns(['class_action'])->make(true);
   // }
   public function listcalssall(){
   		$class_query = DB::table("tbl_classes as class")->select("class.*","section.section")->leftJoin("tbl_class_sections as section","class.class_section_id","=","section.id")->get();
   		return DataTables::of($class_query)->addColumn('class_action',function($class_query){
            return '<a href="'.URL::to('/edit_class/'.$class_query->id).'" class="btn btn-info mr-2 class-section-edit" data-id="'.$class_query->id.'">Edit</a>'.'<a href="javascript:void(0)" class="btn btn-danger class-delete" data-id="'.$class_query->id.'">Delete</a>';
      })->editColumn('status',function($class_query){
              if($class_query->status){
                return '<button type="button" class="btn btn-success">Active</button>';
              }
              else{
                return '<button type="button" class="btn btn-danger">InActive</button>';
              }
      })->rawColumns(['class_action','status'])->make(true);
   }

   public function edit_class($id=null){
        $class_data = SchoolClass::find($id);
        $sec = ClassSection::where(['status'=>1])->get();
        return view('admin.edit-class',['classdata'=>$class_data,'sec'=>$sec]);
   }

   public function edit_class_field(Request $request){
    // print_r($request->all());
    // return $request->choose_sec;
          $valid = Validator::make(array(
                  "name"=>$request->class_new_name,
                  "class_section_id"=>$request->choose_sec,
                  "seats_available"=>$request->seat_ava,
                  "status"=>$request->class_status
          ),array(
                "name"=>"required",
                "class_section_id"=>"required|not_in:-1",
                "seats_available"=>"required",
                "status"=>"required"
          ));

          $class_id = $request->class_data_id;
          if($valid->fails()){
            return redirect('/edit_class/'.$class_id)->withErrors($valid)->withInput();
          }
          else{
                $class_edit_obj = SchoolClass::find($class_id);
                $class_edit_obj->name = $request->class_new_name;
                $class_edit_obj->class_section_id = $request->choose_sec;
                $class_edit_obj->seats_available = $request->seat_ava;
                $class_edit_obj->status = $request->class_status;

                $class_edit_obj->save();
                $request->session()->flash("msg","Data Updated");
                return redirect('/edit_class/'.$class_id);       
          }
   }

   public function delclass(Request $request){
        $id = $request->class_id;
        $class_data = SchoolClass::find($id);
        // return $class_data;
        if(isset($class_data)){
          // $class_data->delete();
          return 1;
        }
        else{
          return 0;
        }
   }
}
