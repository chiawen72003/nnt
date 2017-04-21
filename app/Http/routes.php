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

//學生登入登出
Route::get('/Mem/LoginPG', ['middleware' => 'IsLoginCheck','as' => 'mem.loginpg', 'uses' => 'MemberController@LoginPage']);
Route::get('/Mem/LogOut', ['as' => 'mem.logout', 'uses' => 'MemberController@LogOut']);
Route::post('/Mem/LoginChk', ['middleware' => 'LoginDataCheck','as' => 'mem.loginchk', 'uses' => 'MemberController@LoginChk']);

//學生端 測驗
Route::get('/Mem', ['middleware' => 'MemSessionCheck','as' => 'mem.index', 'uses' => 'ExamController@index']);
Route::get('/Mem/Exam', ['middleware' => 'MemSessionCheck','as' => 'mem.exam', 'uses' => 'ExamController@examList']);
Route::get('/Mem/Exam/View/Record/list/{id}', ['middleware' => 'MemSessionCheck','as' => 'mem.exam.viewrecord.list', 'uses' => 'ExamController@viewExamRecordList']);
Route::post('/Mem/Exam/TestPG', ['middleware' => 'MemSessionCheck','as' => 'mem.exam.testpg', 'uses' => 'ExamController@testPage']);
Route::post('/Mem/Exam/GetModelPage', ['middleware' => 'MemSessionCheck','as' => 'mem.exam.getmodelpage', 'uses' => 'ExamController@GetModelPage']);
Route::post('/Mem/Exam/UpdateRecord', ['middleware' => 'MemSessionCheck','as' => 'mem.exam.updateRecord', 'uses' => 'ExamController@setExamRecord']);
Route::get('/Mem/Exam/View/Record/{id}', ['middleware' => 'MemSessionCheck','as' => 'mem.exam.viewrecord', 'uses' => 'ExamController@viewExamRecord']);
Route::post('/Mem/Exam/semantic/analysis', ['middleware' => 'MemSessionCheck','as' => 'mem.exam.semantic.analysis', 'uses' => 'ExamController@getSemanticAnalysis']);

//學生端 成果查詢
Route::get('/Mem/Achievement', ['middleware' => 'MemSessionCheck','as' => 'mem.achievement', 'uses' => 'ExamController@Achievement']);
Route::get('/Mem/Achievement/List/{id}', ['middleware' => 'MemSessionCheck','as' => 'mem.achievement.list', 'uses' => 'ExamController@AchievementList']);

//學生端 系統公告
Route::get('/Mem/News', ['middleware' => 'MemSessionCheck','as' => 'mem.news', 'uses' => 'MemController@News']);
Route::get('/Mem/News/{id}', ['middleware' => 'MemSessionCheck','as' => 'mem.news.detail', 'uses' => 'MemController@NewsDetail']);
Route::get('/Mem/News/download/{id}', ['middleware' => 'MemSessionCheck','as' => 'mem.news.file', 'uses' => 'MemController@NewsFileDownload']);

//給前端直接呼叫模組修改用
Route::get('/Mem/Exam/modelPage/{modelName}', ['as' => 'mem.exam.modelpage', 'uses' => 'ExamController@modelPage']);

//管理員端 登入、登出
Route::get('/Ad/LoginPG', ['middleware' => 'IsAdLoginCheck','as' => 'ad.loginpg', 'uses' => 'MemberController@LoginPage']);
Route::get('/Ad/LogOut', ['as' => 'ad.logout', 'uses' => 'MemberController@LogOut']);

//管理員端 管理員列表
Route::get('/Mem/Admin/List', ['as' => 'mem.admin.list', 'uses' => 'MemberController@adminList']);
Route::post('/Mem/Admin/Add', ['as' => 'mem.admin.add', 'uses' => 'MemberController@adminAdd']);
Route::post('/Mem/Admin/Update', ['as' => 'mem.admin.update', 'uses' => 'MemberController@adminUpdate']);
Route::delete('/Mem/Admin/Delete', ['as' => 'mem.admin.delete', 'uses' => 'MemberController@adminDelete']);

//管理員端 系統公告列表
Route::get('/Ad/News/List', ['as' => 'ad.news.list', 'uses' => 'AdController@newsList']);
Route::get('/Ad/News/Add/Page', ['as' => 'ad.news.add.page', 'uses' => 'AdController@newsAddPage']);
Route::get('/Ad/News/Edit/Page/{id}', ['as' => 'ad.news.edit.page', 'uses' => 'AdController@newsEditPage']);
Route::post('/Ad/News/Add', ['as' => 'ad.news.add', 'uses' => 'AdController@newsAdd']);
Route::post('/Ad/News/Update', ['as' => 'ad.news.update', 'uses' => 'AdController@newsUpdate']);
Route::post('/Ad/News/Delete', ['as' => 'ad.news.delete', 'uses' => 'AdController@newsDelete']);

//管理員端 學校列表
Route::get('/Ad/School/List', ['as' => 'ad.school.list', 'uses' => 'AdController@schoolList']);
Route::get('/Ad/School/AddPage', ['as' => 'ad.school.addpage', 'uses' => 'AdController@schoolAddPage']);
Route::get('/Ad/School/EditPage/{id}', ['as' => 'ad.school.editpage', 'uses' => 'AdController@schoolEditPage']);
Route::post('/Ad/School/Add', ['as' => 'ad.school.add', 'uses' => 'AdController@schoolAdd']);
Route::post('/Ad/School/Update', ['as' => 'ad.school.update', 'uses' => 'AdController@schoolUpdate']);
Route::post('/Ad/School/Delete', ['as' => 'ad.school.delete', 'uses' => 'AdController@schoolDelete']);

//管理員端 新增使用者頁面
Route::get('/Ad/User/Add/Page', ['as' => 'ad.user.add.page', 'uses' => 'AdController@userAddPage']);


//管理員端 單元列表
Route::get('/Ad', ['middleware' => 'AdSessionCheck','as' => 'ad.index', 'uses' => 'AdController@index']);
Route::get('/Ad/Subject/List', ['middleware' => 'AdSessionCheck','as' => 'ad.subject.list', 'uses' => 'AdController@subjectList']);
Route::get('/Ad/Unit/Add/Page', ['middleware' => 'AdSessionCheck','as' => 'ad.unit.add.page', 'uses' => 'AdController@unitAddPage']);
Route::get('/Ad/Unit/Edit/Page/{id}', ['middleware' => 'AdSessionCheck','as' => 'ad.unit.edit.page', 'uses' => 'AdController@unitEditPage']);
Route::get('/Ad/Questions/Edit/{id}', ['middleware' => 'AdSessionCheck','as' => 'ad.questions.edit', 'uses' => 'AdController@questionsEdit']);
Route::get('/Ad/Questions/Next/{paper_id}/', ['middleware' => 'AdSessionCheck','as' => 'ad.questions.next', 'uses' => 'AdController@questionsNext']);
Route::get('/Ad/Questions/Back/{paper_id}/', ['middleware' => 'AdSessionCheck','as' => 'ad.questions.back', 'uses' => 'AdController@questionsBack']);
Route::put('/Ad/Questions/Update/', ['middleware' => 'AdSessionCheck','as' => 'ad.questions.update', 'uses' => 'AdController@questionsUpdate']);
Route::get('/Ad/ExamPaper/List/{id}', ['middleware' => 'AdSessionCheck','as' => 'ad.exampaper.list', 'uses' => 'AdController@examPaperList']);
Route::get('/Ad/ExamPaper/Add/Page/{id}', ['middleware' => 'AdSessionCheck','as' => 'ad.exampaper.add.page', 'uses' => 'AdController@examPaperAddPage']);
Route::post('/Ad/LoginChk', ['middleware' => 'LoginDataCheck','as' => 'ad.loginchk', 'uses' => 'MemberController@AdLoginChk']);
Route::post('/Ad/Unit/Delete', ['middleware' => 'AdSessionCheck','as' => 'ad.unit.delete', 'uses' => 'AdController@unitDelete']);
Route::post('/Ad/Unit/Add/Data', ['middleware' => 'AdSessionCheck','as' => 'ad.unit.add.data', 'uses' => 'AdController@unitAddData']);
Route::post('/Ad/Unit/Update/Data', ['middleware' => 'AdSessionCheck','as' => 'ad.unit.update.data', 'uses' => 'AdController@unitUpdateData']);
Route::post('/Ad/Subject/Add', ['middleware' => 'AdSessionCheck','as' => 'ad.subject.add', 'uses' => 'AdController@subjectAdd']);
Route::post('/Ad/Subject/Update', ['middleware' => 'AdSessionCheck','as' => 'ad.subject.update', 'uses' => 'AdController@subjectUpdate']);
Route::post('/Ad/ExamPaper/Delete', ['middleware' => 'AdSessionCheck','as' => 'ad.exampaper.delete', 'uses' => 'AdController@exampaperDelete']);
Route::post('/Ad/ExamPaper/Add/Data', ['middleware' => 'AdSessionCheck','as' => 'ad.exampaper.add.data', 'uses' => 'AdController@exampaperAddData']);
Route::post('/Ad/Questions/Add/', ['middleware' => 'AdSessionCheck','as' => 'ad.questions.add', 'uses' => 'AdController@questionsAdd']);
Route::delete('/Ad/Questions/Delete/{paper_id}/', ['middleware' => 'AdSessionCheck','as' => 'ad.questions.delete', 'uses' => 'AdController@questionsDelete']);
Route::delete('/Ad/Subject/Delete', ['middleware' => 'AdSessionCheck','as' => 'ad.subject.delete', 'uses' => 'AdController@subjectDelete']);
