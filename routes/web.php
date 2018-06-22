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



Route::get('/', 'APIController@index');
Route::get('api/get-state-list', 'APIController@getStateList');
Route::get('api/get-city-list', 'APIController@getCityList');

Auth::routes();

    Route::get('testified', 'TestimonyController@getMyTestimony');
    Route::put('/testimony/approve/{id}',
        [
            'as' => 'approve_testimony',
            'uses' => 'TestimonyController@approve'
        ]);
    Route::resource('testimony', 'TestimonyController');

    Route::get('announced', 'AnnouncementController@getMyAnnouncement');
    Route::put('/announcement/approve/{id}',
        [
            'as' => 'approve_announcement',
            'uses' => 'AnnouncementController@approve'
        ]);

    Route::resource('announcement', 'AnnouncementController');

    Route::put('/homecell/approve/{id}',
        [
            'as' => 'approve_homecell',
            'uses' => 'HomecellController@approve'
        ]);
    Route::resource('homecell', 'HomecellController');
    Route::resource('cellmember', 'HomeCellMembersController');


    Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/home/profile', 'HomeController@getUserProfile');
        Route::get('/profile/{user}', 'HomeController@getProfile');
    Route::put('/home/profile/{id}',
        [
            'as' => 'update_profile',
            'uses' => 'HomeController@updateProfile'
        ]);
        Route::put('/home/location/{id}',
        [
            'as' => 'update_location',
            'uses' => 'HomeController@updateUserLocation'
        ]);
        Route::put('/home/login/{id}',
        [
            'as' => 'update_password',
            'uses' => 'HomeController@updateUserLogin'
        ]);
        Route::get('/home/team', 'HomeController@getUserTeam');
        Route::get('/home/login', 'HomeController@getLoginForm');
        Route::get('/home/location', 'HomeController@getLocationForm');

    Route::resource('team', 'user\TeamController');
    Route::resource('teamMember', 'user\TeamMemberController');
    Route::resource('newconvert', 'user\NewConvertController');
    Route::resource('actionable', 'user\NewConvertActionController');
});


Route::group(['prefix' => 'admin', 'namespace' => 'admin', 'middleware' => 'admin'], function(){
    Route::get('/', 'AdminController@dashboard');

    Route::get('user', 'UserController@index');
    Route::get('user/team-leaders', 'UserController@getTeamLeaders');
    Route::get('user/home-cell-exco', 'UserController@getHomeCellExco');
    Route::get('user/new-converts', 'UserController@getNewConverts');
    Route::get('user/church-admin', 'UserController@getChurchAdmin');
});
    Route::get('/super-admin', 'admin\SuperAdminController@dashboard');
