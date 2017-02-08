<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->middleware('lang');

Route::get('/changeLang/{locale}', function ($locale) {
    App::setLocale(Session::put('lang',$locale));
    return response()->json(['status' => 'true']);
})->middleware('lang');

Route::get('/category', 'CategoryController@index')->middleware('lang');

Route::get('/post/{id}', 'PostController@index')->middleware('lang');

Route::post('/comment', 'CommentController@save')->middleware('lang');

Route::get('/listcategory/{id}', 'ByCategoryController@index')->middleware('lang');

Route::get('/listlatestnews', 'ByCategoryController@news')->middleware('lang');

Route::get('/listsearch', 'ByCategoryController@search')->middleware('lang');

Route::get('/complaints', function(){
  return \View::make('complaints');
})->middleware('lang');

Route::post('/svcomplaints', 'ComplaintsController@save')->middleware('lang');
Route::post('/complaintInfo', 'ComplaintsController@complaintInfo');


Route::get('/weblinks/{id}', 'WebLinksController@index')->middleware('lang');

// ****************** ADMIN ROUTES *************************

Auth::routes();

// ---- BEGIN SECTION CATEGORY -------------

Route::get('/admin/category', 'Admin\CategoryController@index');
Route::post('/admin/category/index', 'Admin\CategoryController@indexA');
Route::post('/admin/category/save', 'Admin\CategoryController@save');
Route::post('/admin/category/remove', 'Admin\CategoryController@remove');

Route::get('/admin/datatables.data', 'Admin\CategoryController@anyData');


// ---- END SECTION CATEGORY -------------

// WebLinks
Route::get('/admin/weblink', 'Admin\WebLinkController@index');
Route::get('/admin/weblinklist', 'Admin\WebLinkController@weblinkList');
Route::post('/admin/weblinkregister', 'Admin\WebLinkController@register');
Route::post('/admin/weblinksave', 'Admin\WebLinkController@save');
Route::post('/admin/weblinkremove', 'Admin\WebLinkController@delete');

Route::get('/admin/decision', 'Admin\DecisionController@index');
Route::get('/admin/decisionlist', 'Admin\DecisionController@complaintsList');
Route::post('/admin/decisionregister', 'Admin\DecisionController@decisionregister');
Route::post('/admin/decisionsave', 'Admin\DecisionController@save');
// POLL
Route::get('/admin/poll', 'Admin\PollController@index');
Route::get('/admin/pollList', 'Admin\PollController@pollsList');
Route::post('/admin/pollregister', 'Admin\PollController@pollregister');
Route::post('/admin/pollsave', 'Admin\PollController@save');
Route::post('/admin/activepoll', 'Admin\PollController@activepoll');
Route::post('/admin/inactivepoll', 'Admin\PollController@inactivepoll');

Route::post('/submitpoll', 'PollController@submitpoll');

// ---- BEGIN BANNER UPLOAD -------------

Route::get('/admin/banner', 'Admin\BannerController@index');
Route::post('/admin/banner/index', 'Admin\BannerController@indexA');
Route::post('/admin/banner/save', 'Admin\BannerController@save');
Route::post('/admin/banner/remove', 'Admin\BannerController@remove');

Route::get('/admin/banner/data', 'Admin\BannerController@anyData');

// ---- END BANNER UPLOAD -------------

// ---- BEGIN SECTION UPLOAD -------------

Route::get('/admin/upload/{upload_type}', 'Admin\FileUploadController@index');
Route::post('/admin/upload/do', 'Admin\FileUploadController@upload');
Route::post('/admin/upload/thumbnail', 'Admin\FileUploadController@uploadThumbnail');
Route::post('/admin/upload/banner', 'Admin\FileUploadController@uploadBanner');

Route::any('/admin/gallery/{gType}', 'Admin\FileUploadController@gallery');

// ---- END SECTION UPLOAD -------------

// ---- END SECTION NEWS -------------

Route::get('/admin/news', 'Admin\NewsController@index');
Route::post('/admin/news/index', 'Admin\NewsController@indexA');
Route::post('/admin/news/save', 'Admin\NewsController@save');
Route::post('/admin/news/remove', 'Admin\NewsController@remove');

Route::get('/admin/news/data', 'Admin\NewsController@anyData');

// ---- END SECTION NEWS -------------

// ---- END SHORTER NEWS -------------

Route::get('/admin/shorter', 'Admin\ShorterController@index');
Route::post('/admin/shorter/index', 'Admin\ShorterController@indexA');
Route::post('/admin/shorter/save', 'Admin\ShorterController@save');

Route::get('/admin/shorter/data', 'Admin\ShorterController@anyData');

// ---- END SHORTER NEWS -------------

// NEWSCAT
Route::get('/admin/newscat', 'Admin\NewsCatController@index');
Route::post('/admin/savenewscat', 'Admin\NewsCatController@save');

// ---- BEGIN FILE TYPE CATEGORY -------------

Route::get('/admin/filetype', 'Admin\FileTypeController@index');
Route::post('/admin/filetype/index', 'Admin\FileTypeController@indexA');
Route::post('/admin/filetype/save', 'Admin\FileTypeController@save');
Route::post('/admin/filetype/remove', 'Admin\FileTypeController@remove');

Route::get('/admin/filetype/data', 'Admin\FileTypeController@anyData');


// ---- END FILE TYPE CATEGORY -------------

// ---- BEGIN FILE -------------

Route::get('/admin/file', 'Admin\UFileController@index');
Route::post('/admin/file/index', 'Admin\UFileController@indexA');
Route::post('/admin/file/save', 'Admin\UFileController@save');
Route::post('/admin/file/remove', 'Admin\UFileController@remove');

Route::get('/admin/file/data', 'Admin\UFileController@anyData');


// ---- END FILE -------------

// ---- BEGIN EXTERNAL -------------

Route::get('/admin/external', 'Admin\ExternalController@index');
Route::post('/admin/external/index', 'Admin\ExternalController@indexA');
Route::post('/admin/external/save', 'Admin\ExternalController@save');
Route::post('/admin/external/remove', 'Admin\ExternalController@remove');

Route::get('/admin/external/data', 'Admin\ExternalController@anyData');


// ---- END EXTERNAL -------------

// ---- BEGIN FILE LINKS -------------

Route::get('/admin/links', 'Admin\LinksController@index');
Route::post('/admin/linkssave', 'Admin\LinksController@save');

Route::get('/extranews/{count}', 'ExtraNewsController@index');

// ---- END FILE LINKS -------------
// ---- BEGIN FILE TITLE -------------

Route::get('/admin/title', 'Admin\TitleController@index');
Route::post('/admin/titlesave', 'Admin\TitleController@save');

// ---- END FILE TITLE -------------
// ---- BEGIN FILE USERS -------------

Route::get('/admin/users', 'Admin\UsersController@index');
Route::get('/admin/userslist', 'Admin\UsersController@userslist');
Route::post('/admin/newuser', 'Admin\UsersController@indexnewuser');
Route::post('/admin/usersave', 'Admin\UsersController@save');
Route::post('/admin/userremove', 'Admin\UsersController@remove');

// ---- END FILE USERS -------------


Auth::routes();

Route::get('/home', 'HomeController@index');
