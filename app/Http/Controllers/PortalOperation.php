<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\exam_master;
use Validator;
use App\students;

class PortalOperation extends Controller
{
    public function dashboard()
    {   
    	if(!Session::get('portal_session'))
    	{
    		return redirect(url('portal/login'));
    	}	
    	//echo $session_data=Session::get('portal_session');
       $data =exam_master::select(['exam_masters.*','categories.name as cat_name'])->join('categories','exam_masters.category','=','categories.id')->orderBy('id','desc')->where('exam_masters.status','1')->get();
       // print_r($data);
       // die();

    //$data['portal_exams'] =exam_master::orderBy('id','desc')->where('status','1')->get()->toArray();
       //echo "<pre>";
       // print_r($data['portal_exams']);
       // exit();
    	 return view('portal.dashboard',compact('data'));
    }
    public function exam_from($id)
    {
       //echo $id;
        $data['id']=$id;
        $exam_info=exam_master::where('id',$id)->get()->first();
        $data['exam_title']=$exam_info->title;
        $data['exam_date']=$exam_info->exam_date;
        //die();
        return view('portal.exam_from',$data);
    }
    public function exam_from_submit(Request $request)
    {
        //print_r($request->all());
         // echo "<pre>";
        //print_r($request->all());
        $validator =Validator::make($request->all(),['name'=>'required']);
        if($validator->passes())
        {
            $std = new students();
            $std->name =$request->name;
            $std->email =$request->email;
           
            $std->mobile_no =$request->mobile_no;
             $std->exam =$request->id;
            $std->password =$request->password;
            $std->dob =$request->dob;

            
            $std->save();
            $arr= array('status'=>'true','message'=>'success','reload'=>url('portal/print/'.$std->id));
        }
        else
        {
            $arr=array('status'=>'true','message'=>$validator->errors()->all());
        }   
        echo json_encode($arr);
    }

    public function print($id)
    {
        //echo "string";
        $std_info=students::where('id',$id)->get()->first();
        //print_r($std_info);
        $exam_info=exam_master::where('id',$std_info->exam)->get()->first();
        $exam_title=$exam_info->title;
        $exam_date=$exam_info->exam_date;


        return view('portal.print',['std_info'=>$std_info,'exam_title'=>$exam_title,'exam_date'=>$exam_date]);
    }

    public function update_form()
    {  
        $data['exams']=exam_master::where('status','1')->get()->toArray();
        //print_r($data['exams']);
        return view('portal.update_form',$data);
    }
    public function student_exam_info()
    {
        //print_r($_GET);
        $exam_info=exam_master::where('id',$_GET['exam'])->get()->first();
        $student_info=students::where('mobile_no',$_GET['mobile_no'])->where('dob',$_GET['dob'])->where('exam',$_GET['exam'])->first();
        // echo "<pre>";
        // print_r($student_info);
        return view('portal.student_exam_info',compact('exam_info','student_info'));

    }
    public function student_exam_info_edit(Request $request)
    {
        //print_r($request->all());
        $std=students::where('id',$request->id)->get()->first();
        $std->name=$request->name;
        $std->email=$request->email;
        $std->mobile_no=$request->mobile_no;
        $std->dob=$request->dob;
        if($request->password)
        {
            $std->password=$request->password;
        } 
        $std->update();
        echo json_encode(array('status'=>'true','message'=>'success','reload'=>url('portal/update_form')));   
    }
    public function logout(Request $request)
    {
        $request->session()->forget('portal_session');
        return redirect(url('portal/login'));
    }
    
}
