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
Route::get('/test', function(){
    return view('pages.test');
});
Route::get('asd','Auth\RegisterController@register');
Route::get('/accounts','AccountsController@accounts')->middleware('superadmin');
Route::put('/results','AccountsController@search')->middleware('superadmin');
Route::put('/update_account_status','AccountsController@update')->middleware('superadmin');
Route::get('life_accounts','AccountsController@lifeAccounts')->middleware('superadmin');
Route::get('non-life_accounts','AccountsController@nonLifeAccounts')->middleware('superadmin');
Route::get('admin_accounts','AccountsController@adminAccounts')->middleware('superadmin');

Route::put('/isle_update','DocumentsController@isleUpdate');
Route::put('/search','DocumentsController@search');
Route::get('/create','Auth\RegisterController@registerAccount');
Route::get('/register_account',function(){return view('pages.super_admin.registerAccount');});
Route::get('/non_life_dept', 'DocumentsController@nonLive')->middleware('nonlife');
Route::get('/life_dept', 'DocumentsController@live')->middleware('life');
Route::get('/life_documents', 'DocumentsController@adminLife')->middleware('admin');
Route::get('/non_life_documents', 'DocumentsController@adminNonLife')->middleware('admin');
Route::get('/', function () {
    return view('auth.login');
});

Route::put('/upload_nonlife','DocumentsController@store')->middleware('nonlife');
Route::put('/upload_life','DocumentsController@store')->middleware('life');
Route::get('/folder1_upload_file','PagesController@folder1_upload');
Route::get('/folder1','DocumentsController@folder1');

Route::get('/folder1/{id}','DocumentsController@show');
Route::get('/folder2/{id}','DocumentsController@show');
Route::get('/folder1/download/{$file}','DocumentsController@download');

Route::get('/folder2','DocumentsController@folder2');

Route::put('/update_file', 'DocumentsController@update');
// Route::get('/main', function(){
//     return view('layout.app');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
