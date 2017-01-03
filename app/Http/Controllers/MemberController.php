<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Input;
use \Validator;
use \Session;
use \DB;
use \Response;


class MemberController extends Controller
{
	public function __construct()
	{
		// $this->middleware('guest');
	}
	
	public function LoginPage(){
		$data = array();
		
		return view('member.login',$data);
	}
}
