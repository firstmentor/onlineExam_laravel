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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin','AdminController@index');

//add category
Route::get('/admin/exam_category','AdminController@exam_category');
Route::post('/admin/add_new_category','AdminController@add_new_category');
Route::get('/admin/delete_category/{id}','AdminController@delete_category');
Route::get('/admin/edit_category/{id}','AdminController@edit_category');
Route::post('admin/edit_new_category','AdminController@edit_new_category');
Route::get('/admin/category_status/{id}','AdminController@category_status');


//exam MANAGE
Route::get('/admin/manage_exam','AdminController@manage_exam');
Route::post('admin/add_new_exam','AdminController@add_new_exam');
Route::get('/admin/exam_status/{id}','AdminController@exam_status');
Route::get('/admin/edit_exam/{id}','AdminController@edit_exam_master');
Route::post('admin/edit_new_exam','AdminController@edit_new_exam');
Route::get('/admin/delete_exam/{id}','AdminController@delete_exam');


//Manage Students
Route::get('/admin/manage_students','AdminController@manage_students');
Route::post('admin/add_new_student','AdminController@add_new_student');
Route::get('/admin/student_status/{id}','AdminController@student_status');
Route::get('/admin/edit_student/{id}','AdminController@edit_student');
Route::post('admin/edit_students_final','AdminController@edit_students_final');
Route::get('/admin/delete_student/{id}','AdminController@delete_student');



//Manage Portal

Route::get('admin/manage_Portal','AdminController@manage_Portal');
Route::post('admin/add_new_portal','AdminController@add_new_portal');
Route::get('/admin/portal_status/{id}','AdminController@portal_status');
Route::get('/admin/edit_portal/{id}','AdminController@edit_portal');
Route::post('admin/edit_portal_final','AdminController@edit_portal_final');
Route::get('/admin/delete_portal/{id}','AdminController@delete_portal');



///Portal  /////

Route::get('portal/signup','PortalController@portal_singup');
Route::post('portal/signup_sub','PortalController@signup_sub');
Route::get('portal/login','PortalController@login');
Route::post('portal/login_sub','PortalController@login_sub');

Route::get('portal/dashboard','PortalOperation@dashboard');
Route::get('portal/exam_from/{id}','PortalOperation@exam_from');
Route::post('portal/exam_from_submit','PortalOperation@exam_from_submit');
Route::get('portal/print/{id}','PortalOperation@print');
Route::get('portal/update_form','PortalOperation@update_form');
Route::get('portal/student_exam_info','PortalOperation@student_exam_info');
Route::post('portal/student_exam_info_edit','PortalOperation@student_exam_info_edit');
Route::get('portal/logout','PortalOperation@logout');




///student signup
Route::get('student/signup','StudentController@signup');
Route::post('student/login_sub','StudentController@login_sub');

///studentoperation
Route::get('student/dashboard','StudentOperation@dashboard');
Route::get('student/logout','StudentOperation@logout');
Route::get('student/exam','StudentOperation@exam');

//join exam
Route::get('student/join_exam','StudentOperation@join_exam');





