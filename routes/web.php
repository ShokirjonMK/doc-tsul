<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/clear', function () {
    return Artisan::call('config:cache');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

/*
*   Routes documents
*
*/
Route::group([
    'prefix' => 'mk',
    'namespace' => 'Mk',
    'middleware' => ['web', 'auth']
], function () {

    Route::get('/', 'AdminController@index')->name('mk');

    Route::post('/search', 'DocController@search')->name('search');
    Route::post('/mk-search', 'DocController@mk_search')->name('mk_search');

    Route::get('/mydoc', 'DocController@mydoc')->name('mk.doc.mydoc');
    Route::get('/myshow/{id}', 'DocController@myshow')->name('mk.doc.myshow');
    // 
    Route::post('/search-com', 'DocComController@search')->name('search.com');
    Route::post('/mk-search-com', 'DocComController@mk_search')->name('mk_search.com');

    Route::get('/mydoc-com', 'DocComController@mydoc')->name('mk.doc.mydoc.com');
    Route::get('/myshow-com/{id}', 'DocComController@myshow')->name('mk.doc.myshow.com');

    Route::resource('user', 'UserController');
    Route::resource('doc', 'DocController');
    Route::resource('doc-com', 'DocComController');

    Route::post('/mk-comment', 'DocComController@comment')->name('doc-com.comment');
    Route::get('/comment/{id}', 'DocComController@allcomments')->name('mk.allcomment');
});
