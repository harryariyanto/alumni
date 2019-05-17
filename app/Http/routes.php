<?php
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

Route::get('/', 'IndexController@index');
Route::get('about', 'AboutController@index');
Route::get('news', 'NewsController@index');
Route::get('news/{id}', 'NewsController@view');
Route::get('discussions', 'DiscussionController@index');
Route::get('discussions/{id}', 'DiscussionController@view');
Route::get('members', 'MemberController@index');
Route::get('blog', 'BlogController@index');
Route::get('contact', 'ContactController@index');
Route::get('profile', 'MemberController@profile');
/////////////////////////////////////////////////////////////////////////////////
//                              ADMIN CONTROLLER                              //
///////////////////////////////////////////////////////////////////////////////
Route::get('/admin', 'AdminController@index');
Route::get('summernoteTest', 'SummernoteController@index');
Route::get('/admin/blank', 'BlankController@index');

Route::get('/admin/member', 'AdminController@member');
Route::patch('/updateUserStatus/{id}','AdminController@updateUserStatus');
Route::get('/admin/detailUser/{id}', 'AdminController@detailUser');
Route::get('/admin/insertUser/', 'AdminController@createUser');
Route::post('/admin/insertUser/', 'AdminController@postUser');
Route::post('/admin/upload-excel', 'AdminController@upload_excel');
Route::get('/admin/download-excel', 'AdminController@download_excel');

Route::get('/admin/news/', 'AdminController@showAllNews');//view for news form
Route::get('/admin/news/create', 'NewsController@createView');//view for news form
Route::post('/admin/news/create', 'NewsController@createNews')->name('createNews');//view for news form
Route::get('/admin/news/update/{id}', 'NewsController@updateNewsView');//view for news form
Route::put('/admin/news/update/', 'NewsController@updateNewsPut')->name('updateNewsPut');//view for news form
Route::patch('/admin/news/updateNewsStatus/', 'AdminController@updateNewsStatus');
Route::post('/admin/news/createComment', 'NewsController@createComment')->name('createComment');//view for news form
Route::delete('/news/comment/delete/{id}', 'NewsController@deleteComment')->name('deleteNewsComment');//view for news form


Route::patch('/admin/about', 'AdminController@updateAbout');

Route::post('/discussions/createComment/{id}','DiscussionController@createComment');
Route::post('/discussions/create','DiscussionController@create');
Route::post('/discussions/delete','DiscussionController@delete');
Route::post('/discussions/deleteComment','DiscussionController@deleteComment');

Route::get('filter-category', 'MemberController@filterCategory');
Route::get('filter-year', 'MemberController@filterYear');

Route::post('update-profile', 'MemberController@update_profile');
Route::post('change-password', 'MemberController@change_password');
Route::post('upload-picture', 'MemberController@upload_picture');

/////////////////////////////////////////////////////////////////////////////////
//                                  Auth                                      //
///////////////////////////////////////////////////////////////////////////////
Route::auth();
Route::get('home', 'HomeController@index');
Route::get('404', 'IndexController@notFound')->name('notFound');
Route::get('{any?}', function ($any = null) {
    return redirect('404');
})->where('any', '.*');