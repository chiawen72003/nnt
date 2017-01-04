<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Input;
use \Validator;
use \Session;
use \DB;
use \Response;
use App\Http\Providers\MemberClass;

class MemberController extends Controller
{
	public function __construct()
	{
		// $this->middleware('guest');
	}
	
	public function LoginPage(){
		$data = array();
		
		return view('student.member.login',$data);
	}
	
	public function LoginChk(){
		$data = array();
		$fp = Input::all();
		$check_data = MemberClass::chk_login_data($fp);
		if($check_data['check_result']){
			$user_data = $check_data['user_data'];
			if($user_data['level'] == '91'){
				return view('student.member.login',$data);
			}
			if($user_data['level'] == '9'){
				session(['user_data' => $user_data]);
				return redirect()->route('mem.exam');
			}
		}
		
		return redirect()->back()->with('error', ['your message,here']); 
	}

	public function LogOut(){
		app('request')->session()->flush();
		
		return redirect()->route('mem.loginpg');
	}
	
}
