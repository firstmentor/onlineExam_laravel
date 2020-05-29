<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\category;
use App\exam_master;
use App\students;
use App\portals;

class AdminController extends Controller
{
    public function index()
    {
    	return view ('admin.dashboard');
    }

    public function exam_category()
    {
    	$data['category'] =category::orderBy('id','desc')->get()->toArray();
    	// print_r($data['category']);
    	// die();
    	return view('admin.exam_category',$data);
    }

    public function add_new_category(Request $request)
    {
    	//print_r($request->all());
    	$validator =Validator::make($request->all(),['name'=>'required']);
    	if($validator->passes())
        {
        	$cat = new category();
        	$cat->name =$request->name;
        	$cat->status= 1;
        	$cat->save();
        	$arr= array('status'=>'true','message'=>'success','reload'=>url('admin/exam_category'));
        }
        else
        {
        	$arr=array('status'=>'true','message'=>$validator->errors()->all());
        }	
        echo json_encode($arr);
    }

    public function delete_category($id)
    {
    	$cat =category::where('id',$id)->get()->first();
    	$cat->delete();
    	return redirect(url('admin/exam_category'));
    }
    public function edit_category($id)
    {
    	// echo $id;
    	// die();
      $category =category::where('id',$id)->get()->first();
      // echo "<pre>";
      // print_r($category->name);
      return view('admin.edit_category',['category'=>$category]);
    }

    public function edit_new_category(Request $request)
    {
    	//print_r($request->all());
    	$cat =category::where('id',$request->id)->get()->first();
    	$cat->name=$request->name;
    	$cat->update();
    	echo  json_encode(array('status'=>'true','message'=>'category successfully update','reload'=>url('admin/exam_category')));
    }
    public function category_status($id)
    {
        //echo $id;
        $cat =category::where('id',$id)->get()->first();
        //print_r($cat);
        if($cat->status==1)
            $status=0;
        else
            $status=1;
        $cat1 =category::where('id',$id)->get()->first();
         //print_r($cat1);
        $cat1->status=$status;
       $cat1->update();
    }

    ////Exam MANAGE ////////////////////////////

    public function manage_exam()
    {
       $data['category'] =category::orderBy('id','desc')->where('status','1')->get()->toArray();
        // print_r($data['category']);
        // die();
       $data['exam']=exam_master::
       select(['exam_masters.*','categories.name as cat_name'])
       ->orderBy('id','desc')
       ->join('categories','exam_masters.category','=','categories.id')
       ->get()->toArray();
        return view('admin.manage_exam',$data);
    }
    public function add_new_exam(Request $request )
    {
        // echo "<pre>";
        // print_r($request->all());
        $validator =Validator::make($request->all(),['title'=>'required']);
        if($validator->passes())
        {
            $cat = new exam_master();
            $cat->title =$request->title;
            $cat->exam_date =$request->exam_date;
            $cat->category =$request->exam_category;

            $cat->status= 1;
            $cat->save();
            $arr= array('status'=>'true','message'=>'success','reload'=>url('admin/manage_exam'));
        }
        else
        {
            $arr=array('status'=>'true','message'=>$validator->errors()->all());
        }   
        echo json_encode($arr);
    }
    public function exam_status($id)
    {
         //echo $id;
        $cat =exam_master::where('id',$id)->get()->first();
        //print_r($cat);
        if($cat->status==1)
            $status=0;
        else
            $status=1;
        $cat1 =exam_master::where('id',$id)->get()->first();
         //print_r($cat1);
        $cat1->status=$status;
       $cat1->update();

    }
    public function edit_exam_master($id)
    {
        // echo $id;
        // die();
      $data['exam_master'] =exam_master::where('id',$id)->get()->first();
      $data['category'] =category::orderBy('id','desc')->where('status','1')->get()->toArray();
      // echo "<pre>";
      // print_r($exam_master->title);

      //die();
      return view('admin.edit_exam',$data);
    }
    public function edit_new_exam(Request $request)
    {
        $exam =exam_master::where('id',$request->id)->get()->first();
        $exam->title=$request->title;
        $exam->exam_date=$request->exam_date;
        $exam->category=$request->exam_category;

        $exam->update();
        echo  json_encode(array('status'=>'true','message'=>'category successfully update','reload'=>url('admin/manage_exam')));
    }
    public function delete_exam($id)
    {
        $cat =exam_master::where('id',$id)->get()->first();
        $cat->delete();
        return redirect(url('admin/manage_exam'));
    }


    ///// manage_students ////////

    public function manage_students()
    {  
        $data['exams'] =exam_master::orderBy('id','desc')->where('status','1')->get()->toArray();
        $data['student']= students::orderBy('id','desc')
        ->select(['students.*','exam_masters.title as ex_name','exam_masters.exam_date'])
        ->join('exam_masters','students.exam','=','exam_masters.id')
        ->get()->toArray();
        // print_r($data['stud']);
        // die();
        return view('admin.manage_students',$data);
    }
     public function add_new_student(Request $request )
    {
        // echo "<pre>";
        // print_r($request->all());
        $validator =Validator::make($request->all(),['name'=>'required']);
        if($validator->passes())
        {
            $std = new students();
            $std->name =$request->name;
            $std->email =$request->email;
            $std->mobile_no =$request->mobile_no;
            
            $std->exam =$request->exam;
            $std->password =$request->password;
            $std->dob =$request->dob;

            
            $std->save();
            $arr= array('status'=>'true','message'=>'success','reload'=>url('admin/manage_students'));
        }
        else
        {
            $arr=array('status'=>'true','message'=>$validator->errors()->all());
        }   
        echo json_encode($arr);
    }
    public function student_status($id)
    {
         //echo $id;
        $cat =students::where('id',$id)->get()->first();
        //print_r($cat);
        if($cat->status==1)
            $status=0;
        else
            $status=1;
        $cat1 =students::where('id',$id)->get()->first();
         //print_r($cat1);
        $cat1->status=$status;
       $cat1->update();

    }
    public function delete_student($id)
    {
        $cat =students::where('id',$id)->get()->first();
        $cat->delete();
        return redirect(url('admin/manage_students'));
    }
     public function edit_student($id)
    {
        // echo $id;
        // die();
     
      $exams =exam_master::orderBy('id','desc')->where('status','1')->get()->toArray();
      $std =students::where('id',$id)->get()->first();
      // echo "<pre>";
      // print_r($std->name);

      // die();
      return view('admin.edit_student',['student'=>$std,'exams'=>$exams]);
    }
     public function edit_students_final(Request $request)
    {
        // print_r($request->all());
        // die();
        $std =students::where('id',$request->id)->get()->first();
        $std->name =$request->name;
        $std->email =$request->email;
        $std->mobile_no =$request->mobile_no;
            
        $std->exam =$request->exam;
        $std->password =$request->password;
        $std->dob =$request->dob;

        $std->update();
        echo  json_encode(array('status'=>'true','message'=>'Student successfully update','reload'=>url('admin/manage_students')));
    }

    //Manage Portal ///////////////////////////////////

    public function manage_Portal()
    {  
        $data['portal']=portals::orderBy('id','desc')->get()->toArray();

        // print_r($data['portal']);
        // die();

        return view('admin.manage_portal',$data);
    }
    public function add_new_portal(Request $request )
    {
        // echo "<pre>";
        // print_r($request->all());
        $validator =Validator::make($request->all(),['name'=>'required']);
        if($validator->passes())
        {
            $portal = new portals();
            $portal->name =$request->name;
            $portal->email =$request->email;
            $portal->mobile =$request->mobile;
            $portal->password =$request->password;
            $portal->status= 1;
            $portal->save();
            $arr= array('status'=>'true','message'=>'success','reload'=>url('admin/manage_Portal'));
        }
        else
        {
            $arr=array('status'=>'true','message'=>$validator->errors()->all());
        }   
        echo json_encode($arr);


    }
    public function portal_status($id)
    {
         //echo $id;
        $cat =portals::where('id',$id)->get()->first();
        //print_r($cat);
        if($cat->status==1)
            $status=0;
        else
            $status=1;
        $cat1 =portals::where('id',$id)->get()->first();
         //print_r($cat1);
        $cat1->status=$status;
       $cat1->update();

    }
     public function delete_portal($id)
    {
        $cat =portals::where('id',$id)->get()->first();
        $cat->delete();
        return redirect(url('admin/manage_Portal'));
    }
    public function edit_portal($id)
    {
        // echo $id;
        // die();
     
     // $exams =portals::orderBy('id','desc')->where('status','1')->get()->toArray();
      $portal =portals::where('id',$id)->get()->first();
      // echo "<pre>";
      // print_r($portal->name);

      // die();
      return view('admin.edit_portal',['p'=>$portal]);
    }
     public function edit_portal_final(Request $request)
    {
        // print_r($request->all());
        // die();
        $std =portals::where('id',$request->id)->get()->first();
        $std->name =$request->name;
        $std->email =$request->email;
        $std->mobile =$request->mobile;
        $std->password =$request->password;
       

        $std->update();
        echo  json_encode(array('status'=>'true','message'=>'Student successfully update','reload'=>url('admin/manage_Portal')));
    }

}
