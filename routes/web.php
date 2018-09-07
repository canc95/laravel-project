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

Route::get('/', 'EscortController@index')->name('escort.index');

Route::get('/pickaplan', 'PlanController@pickplan')->name('dashboard.plan.pickplan');

Route::group([
  'prefix' => 'dashboard'
], function(){
  //Country Routes
  Route::group([
    'prefix' => 'country'
  ], function(){
      //index all countries
      Route::get('/', 'CountryController@index')->name('dashboard.country.index');
      //store a country
      Route::post('/store', 'CountryController@store')->name('dashboard.country.store');
      //update a Country
      Route::post('/update/{id}', 'CountryController@update')->name('dashboard.country.update');
  });
  //State routes
  Route::group([
    'prefix' => 'state'
  ], function(){
    //index all state
    Route::get('/', 'StateController@index')->name('dashboard.state.index');
    //store a state
    Route::post('/store', 'StateController@store')->name('dashboard.state.store');
    //update a state
    Route::post('/update/{id}', 'StateController@update')->name('dashboard.state.update');
  });
  // Plan routes
  Route::group([
    'prefix' => 'plan'
  ], function(){
    //index all plans
    Route::get('/', 'PlanController@index')->name('dashboard.plan.index');
    //store a plan
    Route::post('/store', 'PlanController@store')->name('dashboard.plan.store');
    //update a plan
    Route::post('/update/{id}', 'PlanController@update')->name('dashboard.plan.update');
  });
  //Escort route
  Route::group([
    'prefix' => 'escort'
  ], function(){
    //index all escorts
    Route::get('/', 'EscortController@dashboard')->name('escort.dashboard');
    //delete a escort
    Route::get('/escort/delete/{id}', 'EscortController@delete')->name('escort.delete');
  });
});

Route::group([
  'prefix' => 'escort'
], function(){
  //create escort
  Route::get('/create', 'EscortController@create')->name('escort.create');
  //store a escort
  Route::post('/store', 'EscortController@store')->name('escort.store');
  //edit escort
  Route::get('/edit/{id}', 'EscortController@edit')->name('escort.edit');
  //update a escort
  Route::post('/update/{id}', 'EscortController@update')->name('escort.update');
  //detail a escort
  Route::get('/show/{id}', 'EscortController@show')->name('escort.show');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
