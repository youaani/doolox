<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array(
    'as' => 'doolox.dashboard',
    'before' => 'auth.doolox:doolox.view',
    'uses' => 'DooloxController@dashboard',
));

Route::post('login', array(
    'as' => 'user.login',
    'uses' => 'UserController@login',
));

Route::get('login', array(
    'as' => 'user.login',
    function() {
        return View::make('login');
    }
));

Route::get('logout', array(
    'as' => 'user.logout',
    function () {
        Sentry::logout();
        return Redirect::route('user.login');
    }
));

Route::get('wpsite/{id}', array(
    'as' => 'doolox.wpsite',
    'before' => 'owner',
    'uses' => 'DooloxController@wpsite',
));

Route::post('wpsite/{id}', array(
    'as' => 'doolox.wpsite',
    'before' => 'owner',
    'uses' => 'DooloxController@wpsite',
));

Route::get('wpsite-new', array(
    'as' => 'doolox.wpsite_new',
    'before' => 'auth.doolox:doolox.update',
    function () {
        return View::make('wpsite_new');
    }
));

Route::post('wpsite-new', array(
    'as' => 'doolox.wpsite_new',
    'before' => 'auth.doolox:doolox.update',
    'uses' => 'DooloxController@wpsite_new',
));

Route::get('wpsite-delete/{id}', array(
    'as' => 'doolox.wpsite_delete',
    'before' => 'auth.doolox:doolox.delete',
    'uses' => 'DooloxController@wpsite_delete',
));

Route::get('account', array(
    'as' => 'user.account',
    'before' => 'auth.doolox:doolox.view',
    function() {
        return View::make('account')->with('user', Sentry::getUser());
    }
));

Route::post('account', array(
    'as' => 'user.account',
    'before' => 'auth.doolox:doolox.view',
    'uses' => 'UserController@account',
));

Route::get('wpsite-rmuser/{id}/{user_id}', array(
    'as' => 'doolox.wpsite_rmuser',
    'before' => 'owner',
    'uses' => 'DooloxController@wpsite_rmuser',
));

Route::post('wpsite-adduser/{id}', array(
    'as' => 'doolox.wpsite_adduser',
    'before' => 'owner',
    'uses' => 'DooloxController@wpsite_adduser',
));

Route::get('users', array(
    'as' => 'user.manage_users',
    'before' => 'user-management',
    'uses' => 'UserController@manage_users',
));

Route::get('user-new', array(
    'as' => 'user.user_new',
    'before' => 'user-management',
    function() {
        return View::make('user_new');
    }
));

Route::post('user-new', array(
    'as' => 'user.user_new',
    'before' => 'user-management',
    'uses' => 'UserController@user_new',
));

Route::get('user-delete/{id}', array(
    'as' => 'user.user_delete',
    'before' => 'user-management',
    'uses' => 'UserController@user_delete',
));

Route::get('user-update/{id}', array(
    'as' => 'user.user_update',
    'before' => 'user-management',
    function($id) {
        return View::make('user_update')->with('user', User::findOrFail((int) $id));
    }
));

Route::post('user-update/{id}', array(
    'as' => 'user.user_update',
    'before' => 'user-management',
    'uses' => 'UserController@user_update',
));

Route::get('getk', array(
    'as' => 'doolox.get_key',
    'before' => 'auth.doolox:doolox.view',
    'uses' => 'DooloxController@get_key',
));

Route::get('wpsite-install', array(
    'as' => 'doolox.wpsite_install',
    'before' => 'auth.doolox:doolox.view',
    function() {
        return View::make('wpsite_install');
    }
));

Route::get('check-domain/{domain}', array(
    'as' => 'doolox.check_domain',
    'before' => 'auth.doolox:doolox.view',
    'uses' => 'DooloxController@check_domain',
));