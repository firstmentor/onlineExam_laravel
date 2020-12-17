<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\portals;
use Session;

class PortalController extends Controller
{
    public function portal_singup()
    {
        if(Session::get('portal_session'))
        {
            return redirect(url('portal/dashboard'));
        }
    	return view('portal.signup');
    }

    public function signup_sub(Request $request)
    {
    	 $validator =Validator::make($request->all(),['name'=>'required']);
        if($validator->passes())
        {   
            $is_existe=portals::where('email',$request->email)->get()->toArray();
            if($is_existe)
            {
                $arr=array('status'=>'false','message'=>'Email Already Exists');
            }
            else
            {
            $portal = new portals();
            $portal->name =$request->name;
            $portal->email =$request->email;
            $portal->mobile =$request->mobile_no;
            $portal->password =$request->password;
            $portal->status= 1;
            $portal->save();
            $arr= array('status'=>'true','message'=>'success','reload'=>url('portal/login'));
            }
        }
        else
        {
            $arr=array('status'=>'true','message'=>$validator->errors()->all());
        }   
        echo json_encode($arr);
    }   

    public function login()
    {  
        //session
        if(Session::get('portal_session'))
        {
            return redirect(url('portal/dashboard'));
        }

       return view('portal.login');
    } 

    public function login_sub(Request $request)
    {
        //  echo "<pre>";
        // print_r($request->all());
        $portal =portals::where('email',$request->email)->where('password',$request->password)->get()->toArray();
        if($portal)
        {
            //print_r($portal);
            if($portal[0]['status']==1){  //0 index par status 1 Array

            $c=$request->session()->put('portal_session',$portal[0]['id']);
            // print_r($c);
            // exit();
               
                //$arr=array('status'=>'true','message'=>'success','reload'=>url('portal/dashboard'));

            //echo "ok";
                return redirect('portal/dashboard')->with('message','Post successfully Added');  //flash message session
            }
            else
            {
                //$arr=array('status'=>'false','message'=>'Your Account Deactived');
                //echo "no";
                return redirect('/portal/login')->with('message','Your Account Deactived');
            }    

        } 
        else
        {
            //echo 0;
            // $arr=array('status'=>'false','message'=>'Email And Password Not Match');
             return redirect('/portal/login')->with('message','Email And Password Not Match');
        }  
        // echo json_encode($arr); 


    }
}
