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
Route::get('/', 'PublicController@block')->name('block');

Route::get('/home', 'EscortController@index')->name('escort.index');

Route::get('/pickaplan', 'PlanController@pickplan')->name('dashboard.plan.pickplan')->middleware('guest');

Route::group([
  'prefix' => 'dashboard',
], function(){
  //State routes
  Route::group([
    'prefix' => 'state',
    'middleware' => ['permission:index-state'],
  ], function(){
    //index all state
    Route::get('/', 'StateController@index')->name('dashboard.state.index');
    //store a state
    Route::post('/store', 'StateController@store')->name('state.store');
    //update a state
    Route::post('/update/{id}', 'StateController@update')->name('state.update');
    // delete a state
    Route::get('/delete/{id}', 'StateController@delete')->name('state.delete');
  });
  // Plan routes
  Route::group([
    'prefix' => 'plan',
    'middleware' => ['permission:index-plan'],
  ], function(){
    //index all plans
    Route::get('/', 'PlanController@index')->name('dashboard.plan.index');
    //store a plan
    Route::post('/store', 'PlanController@store')->name('plan.store');
    //update a plan
    Route::post('/update/{id}', 'PlanController@update')->name('plan.update');
    //delete a plan
    Route::get('/plan/delete/{id}', 'PlanController@delete')->name('plan.delete');
  });
  //Escort route
  Route::group([
    'prefix' => 'escort',
    'middleware' => ['permission:index-escort'],
  ], function(){
    //index all escorts
    Route::get('/', 'EscortController@dashboard')->name('dashboard.escort.dashboard');
    //delete a escort
    Route::get('/delete/{id}', 'EscortController@delete')->name('escort.delete');
    // edit status of a escort
    Route::post('/update/{id}', 'EscortController@admin_update')->name('escort.admin_update');
  });
  // Country route
  Route::group([
    'prefix' => 'country',
    'middleware' => ['permission:index-country'],
  ], function(){
    //index all countries
    Route::get('/', 'CountryController@index')->name('dashboard.country.index');
    //Add new country
    Route::post('/store', 'CountryController@store')->name('country.store');
    //Edit a country
    Route::post('/edit/{id}', 'CountryController@update')->name('country.update');
    //Delete a country
    Route::get('/delete/{id}', 'CountryController@delete')->name('country.delete');
  });
});

Route::group([
  'prefix' => 'escort'
], function(){
  Route::group(['middleware' => ['permission:create-escort']], function(){
    //create escort
    Route::get('/create/{id}', 'EscortController@create')->name('escort.create');
    //store a escort
    Route::post('/store/{id}', 'EscortController@store')->name('escort.store');
  });
  Route::group(['middleware' => ['permission:edit-escort']], function(){
    //edit escort
    Route::get('/edit/{id}', 'EscortController@edit')->name('escort.edit');
    //update a escort
    Route::post('/update/{id}', 'EscortController@update')->name('escort.update');
  });
  //detail a escort
  Route::get('/show/{id}', 'EscortController@show')->name('escort.show');
});

Route::group([
  'prefix' => 'vue'
], function(){
  // countries
  Route::get('/countries', 'VueController@countries');
  Route::get('/states', 'VueController@states');
  Route::get('/escorts', 'VueController@escorts');
});

Auth::routes();
