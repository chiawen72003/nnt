<?php
Blade::setContentTags('[[', ']]'); 		// for variables and all things Blade
Blade::setEscapedContentTags('[[[', ']]]'); 	// for escaped data
Blade::setRawTags('[!', '!]');	// for raw data

Route::pattern('id', '[0-9]+');

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
Route::get('/Ad/LoginPG', ['middleware' => 'IsLoginCheck','as' => 'ad.loginpg', 'uses' => 'MemberController@AdLoginPage']);
Route::get('/Ad/LogOut', ['as' => 'ad.logout', 'uses' => 'MemberController@AdLogOut']);
Route::post('/Ad/LoginChk', ['middleware' => 'LoginDataCheck','as' => 'ad.loginchk', 'uses' => 'MemberController@AdLoginChk']);



//前端測驗
Route::get('/Mem/Exam', ['middleware' => 'MemSessionCheck','as' => 'mem.exam', 'uses' => 'ExamController@index']);
Route::post('/Mem/Exam/TestPG', ['middleware' => 'MemSessionCheck','as' => 'mem.exam.testpg', 'uses' => 'ExamController@testPage']);
Route::post('/Mem/Exam/ansAnaly', ['middleware' => 'MemSessionCheck','as' => 'mem.exam.ansanaly', 'uses' => 'ExamController@ansAnaly']);
Route::post('/Mem/Exam/GetModelPage', ['middleware' => 'MemSessionCheck','as' => 'mem.exam.getmodelpage', 'uses' => 'ExamController@GetModelPage']);

//給前端直接呼叫模組修改用
Route::get('/Mem/Exam/modelPage/{modelName}', ['as' => 'mem.exam.modelpage', 'uses' => 'ExamController@modelPage']);

Route::get('/Ad', ['as' => 'ad.index', 'uses' => 'AdController@index']);
Route::get('/Ad/Unit/Add/Page', ['as' => 'ad.unit.add.page', 'uses' => 'AdController@unitAddPage']);
Route::get('/Ad/Unit/Edit/Page/{id}', ['as' => 'ad.unit.edit.page', 'uses' => 'AdController@unitEditPage']);
Route::get('/Ad/Unit/List', ['as' => 'ad.unit.list', 'uses' => 'AdController@unitList']);
Route::post('/Ad/Unit/Delete', ['as' => 'ad.unit.delete', 'uses' => 'AdController@unitDelete']);
Route::post('/Ad/Unit/Add/Data', ['as' => 'ad.unit.add.data', 'uses' => 'AdController@unitAddData']);
Route::post('/Ad/Unit/Update/Data', ['as' => 'ad.unit.update.data', 'uses' => 'AdController@unitUpdateData']);
