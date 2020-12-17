<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\students;
use App\exam_master;
class StudentOperation extends Controller
{
    public function dashboard()
    {   
    	if(!Session::get('id'))
    	{
            return redirect(url('student/signup'));
            die();
    	}	
    	//echo Session::get('id');
    	return view('student.dashboard');
    }

    public function exam()
    {   
    	//$student_info=students::where('id',Session::get('id'))->get()->first();
    	$student_info=students::select(['students.*','exam_masters.title','exam_masters.exam_date'])->join('exam_masters','students.exam','=','exam_masters.id')->where('students.id',Session::get('id'))->get()->first();
    	// echo "<pre>";
    	// print_r($student_info);
    	// die();
    	// echo Session::get('id');
    	return view('student/exam',compact('student_info'));
    }

    public function join_exam()
    {
    	return view('student.join_exam');
    }

    public function logout(Request $request)
    {
       $request->session()->forget('id');
       return redirect(url('student/signup'));
    }
}
