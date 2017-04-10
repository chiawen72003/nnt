<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Input;
use \Validator;
use \Session;
use \DB;
use \Response;
use App\Http\Providers\MemberClass;
use App\Http\Providers\MemberAdminClass;

class MemberController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest');
    }

    public function LoginPage()
    {
        $data = array();

        return view('student.member.login', $data);
    }

    public function LoginChk()
    {
        $member_class_obj = new MemberClass();
        $check_data = $member_class_obj -> chk_login_data();
        if ($check_data['check_result']) {
            $user_data = $check_data['user_data'];
            session(['user_data' => $user_data]);

            return redirect()->route('mem.index');
        }

        return redirect()->back()->with('error', ['your message,here']);
    }

    public function LogOut()
    {
        app('request')->session()->flush();

        return redirect()->route('mem.loginpg');
    }

    /**
     * 管理員登入頁面
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function AdLoginPage()
    {

        $data = array();

        return view('admin.member.login', $data);
    }

    /**
     * 管理員登入檢查
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function AdLoginChk()
    {
        $member_class_obj = new MemberClass();
        $check_data = $member_class_obj -> chk_ad_login_data();
        if ($check_data['check_result']) {
            $user_data = $check_data['user_data'];
            session(['admin_data' => $user_data]);

            return redirect()->route('ad.index');
        }

        return redirect()->back()->with('error', ['your message,here']);
    }

    /**
     * 管理員登出
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function AdLogOut()
    {
        app('request')->session()->flush();

        return redirect()->route('ad.loginpg');
    }

    /**
     * 管理員列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminList()
    {
        $member_admin_obj = new MemberAdminClass();
        $data = array();
        $data['user_data'] = app('request')->session()->get('user_data');
        $data['list_data'] = $member_admin_obj -> get_list();

        return view('admin.admin_list', $data);
    }

    /**
     * 新增一筆管理員的資料
     *
     */
    public function adminAdd()
    {
        $fp = Input::all();
        $member_admin_obj = new MemberAdminClass($fp);
        $member_admin_obj -> add();

        return '';
    }

    /**
     * 更新一筆管理員的資料
     *
     */
    public function adminUpdate()
    {
        $fp = Input::all();
        $member_admin_obj = new MemberAdminClass($fp);
        $member_admin_obj -> update_data();

        return '';
    }

    /**
     * 移除一個管理員
     *
     */
    public function adminDelete()
    {
        $fp = Input::all();
        $member_admin_obj = new MemberAdminClass($fp);
        $member_admin_obj -> delete_data();

        return;
    }

}
