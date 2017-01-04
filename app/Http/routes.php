<?php
Blade::setContentTags('[[', ']]'); 		// for variables and all things Blade
Blade::setEscapedContentTags('[[[', ']]]'); 	// for escaped data
Blade::setRawTags('[!', '!]');	// for raw data

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//會員管理
Route::get('/Mem/LoginPG', ['middleware' => 'IsLoginCheck','as' => 'mem.loginpg', 'uses' => 'MemberController@LoginPage']);
Route::get('/Mem/LogOut', ['as' => 'mem.logout', 'uses' => 'MemberController@LogOut']);
Route::post('/Mem/LoginChk', ['middleware' => 'LoginDataCheck','as' => 'mem.loginchk', 'uses' => 'MemberController@LoginChk']);

//前端測驗
Route::get('/Mem/Exam', ['middleware' => 'MemSessionCheck','as' => 'mem.exam', 'uses' => 'ExamController@index']);
Route::post('/Mem/Exam/TestPG', ['middleware' => 'MemSessionCheck','as' => 'mem.exam.testpg', 'uses' => 'ExamController@testPage']);

