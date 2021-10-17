<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware'=>'admin'], function(){
		Route::get('/addclass', 'SchoolClassController@addcalss');
		Route::get('/', 'AdminHomeController@dashboard');
		
});
		Route::post('/add_class_field','SchoolClassController@class_field')->name('add_class_fields');
		Route::post('/del_class','SchoolClassController@delclass')->name('del_class');
		Route::get('/edit_class/{id?}','SchoolClassController@edit_class')->name('editclass');
		Route::post('/edit_class_field','SchoolClassController@edit_class_field')->name('edit-class-field');
		Route::get('/listclass', 'SchoolClassController@listcalss')->name('listclass');
		Route::get('/listclassall', 'SchoolClassController@listcalssall')->name('listclassall');

Route::get('/apiCheck', 'apicheckController@api');
Route::get('/checkres', function(){
	return view('checkres');
});
// class Route


// section Route
Route::get('/add_sec','ClassSectionController@add_sec');
Route::get('/edit_sec/{id?}','ClassSectionController@edit_sec');
Route::post('/update_sec','ClassSectionController@update_sec')->name('update_sec');
Route::get('/add_sec_field','ClassSectionController@add_sec_field')->name('add-sec-field');
Route::post('/delsec','ClassSectionController@delsec')->name('delsec');
Route::get('/list_sec','ClassSectionController@list_sec');
Route::get('/list_sec_data','ClassSectionController@list_all_sec')->name('listall');

// Route::get('/list_sec','ClassSectionController@list_sec');
Route::get('/add_faculty','FacultyController@addfaculty')->name('addfaculty');

Route::get('/list_faculty','FacultyController@listfaculty')->name('listfaculty');
Route::get('/list_faculty_all','FacultyController@listfacultyall')->name('list_faculty_all');
Route::post('/add-faculty-fild','FacultyController@addfacultyfild');

Route::get('/faculty_type','FacultyTypeController@facultytype');
Route::post('/fac_field','FacultyTypeController@facultyfield')->name('addfactypefield');
Route::get('/faculty_type_all','FacultyTypeController@facultytypeall');
Route::get('/edit_faculty_type/{id?}','FacultyTypeController@editfacultytype')->name("editfacultytype");
Route::post('/update_faculty_type','FacultyTypeController@updatefacultytype')->name("updatefactypefield");
Route::post('/del_faculty_type','FacultyTypeController@delfacultytype')->name("delfactype");

Route::get('/faculty_type_list','FacultyTypeController@facultytypelist')->name('facultytypelist');


Route::get('/add_student','StudentController@addstudent')->name('addstudent');
Route::get('/stu_edit/{id?}','StudentController@stuedit');
Route::get('/fac_edit/{id?}','FacultyController@facedit');

Route::post('/edit-faculty-fild','FacultyController@editfacfield');

Route::post('/update_stu','StudentController@update_stu')->name('update_stu');
Route::get('/list_student','StudentController@liststudent')->name('liststudent');

Route::post('/stu_list_field','StudentController@stulistfield');

Route::get('/list_student_all','StudentController@liststudent_all')->name('liststudentall');
Route::post('/del_stu','StudentController@delstu')->name('del_stu');
Route::get('/login','AdminController@loginadmin');
Route::post('/check-login','AdminController@checkLogin')->name('checklogin');

Route::get('/logout','AdminController@checkLogout')->name('checklogout');