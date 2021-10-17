<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassSection;
use App\Models\SchoolClass;
use App\Models\Faculty;
use App\Models\Student;
use DB;

class AdminHomeController extends Controller
{
    //
    public function dashboard(){
    	// $sec_no = ClassSection::where('status','=','1')->count();
    	$sec_no = ClassSection::count();
    	$class_no = SchoolClass::count();
    	$faculty_no = Faculty::count();
    	$stu_no = Student::count();
    	return view('admin.views.dashboard',['sec_no'=>$sec_no,'class_no'=>$class_no,'stu_no'=>$stu_no,'fac_no'=>$faculty_no,'stu_no'=>$stu_no]);
    }
}
