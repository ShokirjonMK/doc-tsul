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

Route::get('/test', function () {
    return view('welcome');
    // return "asdasds";
});
Route::get('/tree', function () {
    return view('tree');
    // return "asdasds";
});


Route::group([
    'prefix' => 'backoffice',
    'namespace' => 'Admin',
    'middleware' => ['web', 'auth']
], function () {


    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('/strc', 'StructureController@index')->name('structure.strc');
    Route::resource('structure', 'StructureController');
    Route::resource('department', 'DepartmentController');
    //    Route::get('index/{id}', 'DepartmentController@index')->name('department.index');
    Route::resource('ie', 'IeController');
    Route::resource('stdep', 'StDepController');
    Route::post('department/edit/', 'DepartmentController@edit')->name('department.tahrir');
    //staff
    Route::resource('staff', 'StaffController');
    Route::resource('university', 'UniversityController');
    Route::post('university/edit/', 'UniversityController@edit')->name('university.tahrir');

    Route::post('staff/relative/', 'StaffController@relative')->name('staff.relative');
    Route::post('staff/diplom/', 'StaffController@diplom')->name('staff.diplom');
    Route::post('staff/workplace/', 'StaffController@workplace')->name('staff.workplace');
    Route::post('staff/inactivity/', 'StaffController@inactivity')->name('staff.inactivity');
    Route::post('staff/qualification/', 'StaffController@qualification')->name('staff.qualification');
    Route::get('/resume-pdf/{id}', 'StaffController@pdf_for_staff')->name('pdf_for_staff');
    Route::post('staff/mukofot/', 'StaffController@mukofot')->name('staff.mukofot');
    Route::post('staff/get-staff/', 'StaffController@get_staff')->name('staff.get_staff');
    Route::post('staff/fire-staff/', 'StaffController@fire_staff')->name('staff.fire_staff');

    Route::get('/test', function () {
        return view('admin.welcome');
    })->name('test');
    // Route::get('/', 'AdminController@index')->name('admin');

    //
    Route::get('/resume', function () {
        return view('admin.pages.staff.resume');
    });


    //other
    Route::get('/get-areas/{id}', 'RegionController@get_areas')->name('get_areas');
    Route::get('/get-regions/{id}', 'RegionController@get_regions')->name('get_regions');
});


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

    Route::resource('user', 'UserController');
    Route::resource('doc', 'DocController');
});
