<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\students;
use Session;
class StudentController extends Controller
{
    public function signup()
    {
    	return view('student.signup');
    }
    public function login_sub(Request $request)
    {
    	//print_r($request->all());
    	$resp=students::where('email',$request->email)->where('password',$request->password)->get()->first();
    	//print_r($resp);
    	if($resp)
    	{   
            $request->session()->put('id',$resp->id);
    		$arr=array('status'=>'true','message'=>'success','reload'=>url('student/dashboard'));
    	}
    	else
    	{
    		$arr=array('status'=>'false','message'=>'Email ANd password Not Match');
    	}	
    	echo json_encode($arr);
    }
}
