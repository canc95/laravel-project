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

Route::get('/scegli-un-piano', 'PlanController@pickplan')->name('dashboard.plan.pickplan');

Route::get('/cambia-password/{id}', 'UserController@changePassword')->name('change.password');
Route::post('/change-pass/{id}', 'UserController@changedPassword')->name('changePass');

Route::group([
  'prefix' => 'cruscotto',
], function(){
  //State routes
  Route::group([
    'prefix' => 'stato',
    'middleware' => ['permission:index-state'],
  ], function(){
    //index all state
    Route::get('/', 'StateController@index')->name('dashboard.state.index');
    //negozio a state
    Route::post('/negozio', 'StateController@store')->name('state.store');
    //aggiornare a state
    Route::post('/aggiornare/{id}', 'StateController@update')->name('state.update');
    // delete a state
    Route::get('/elimina/{id}', 'StateController@delete')->name('state.delete');
  });
  // User routes
  Route::group([
    'prefix' => 'utenti',
    'middleware' => ['permission:index-user'],
  ], function(){
    //index all state
    Route::get('/', 'UserController@index')->name('user.index');
    //negozio a user
    Route::post('/negozio', 'UserController@store')->name('user.store');
    //aggiornare a user
    Route::post('/aggiornare/{id}', 'UserController@update')->name('user.update');
    // delete a user
    Route::get('/elimina/{id}', 'UserController@delete')->name('user.delete');
  });
  // Plan routes
  Route::group([
    'prefix' => 'piano',
    'middleware' => ['permission:index-plan'],
  ], function(){
    //index all plans
    Route::get('/', 'PlanController@index')->name('dashboard.plan.index');
    //negozio a plan
    Route::post('/negozio', 'PlanController@store')->name('plan.store');
    //aggiornare a plan
    Route::post('/aggiornare/{id}', 'PlanController@update')->name('plan.update');
    //elimina a plan
    Route::get('/plan/elimina/{id}', 'PlanController@delete')->name('plan.delete');
  });
  //Escort route
  Route::group([
    'prefix' => 'escorta',
    'middleware' => ['permission:index-escort'],
  ], function(){
    //index all escorts
    Route::get('/', 'EscortController@dashboard')->name('dashboard.escort.dashboard');
    //elimina a escort
    Route::get('/elimina/{id}', 'EscortController@delete')->name('escort.delete');
    // edit status of a escort
    Route::post('/aggiornare/{id}', 'EscortController@admin_update')->name('escort.admin_update');
  });
  // Country route
  Route::group([
    'prefix' => 'nazione',
    'middleware' => ['permission:index-country'],
  ], function(){
    //index all countries
    Route::get('/', 'CountryController@index')->name('dashboard.country.index');
    //Add new country
    Route::post('/negozio', 'CountryController@store')->name('country.store');
    //Edit a country
    Route::post('/modificare/{id}', 'CountryController@update')->name('country.update');
    //Delete a country
    Route::get('/elimina/{id}', 'CountryController@delete')->name('country.delete');
  });
  Route::group([
    'prefix' => 'pubblicita',
    'middleware' => ['permission:index-advertising'],
  ], function(){
    //index all advertising
    Route::get('/', 'AdvertisingController@index')->name('advertising.index');
    //store advertising
    Route::post('/negozio', 'AdvertisingController@store')->name('advertising.store');
    //update a advertising
    Route::post('/modificare/{id}', 'AdvertisingController@update')->name('advertising.update');
    //Delete a advertising
    Route::get('elimina/{id}', 'AdvertisingController@delete')->name('advertising.delete');
  });
});

Route::group([
  'prefix' => 'escorta'
], function(){
  Route::group(['middleware' => ['permission:create-escort']], function(){
    //create escort
    Route::get('/creare/{id}', 'EscortController@create')->name('escort.create');
    //negozio a escort
    Route::post('/negozio/{id}', 'EscortController@store')->name('escort.store');
  });
  Route::group(['middleware' => ['permission:edit-escort']], function(){
    //edit escort
    Route::get('/modificare/{id}', 'EscortController@edit')->name('escort.edit');
    //aggiornare a escort
    Route::post('/aggiornare/{id}', 'EscortController@update')->name('escort.update');
  });
  //detail a escort
  Route::get('/le-mie-escort/{id}', 'EscortController@my_escorts')->name('my.escorts');
  Route::get('/spettacolo/{id}', 'EscortController@show')->name('escort.show');
});

Route::group([
  'prefix' => 'vue'
], function(){
  // countries
  Route::get('/countries', 'VueController@countries');
  Route::get('/states', 'VueController@states');
  Route::get('/escorts', 'VueController@escorts');
  Route::get('/pubblicita-link', 'VueController@advertisinglinks');
  Route::get('/pubblicita-escort', 'VueController@advertisingescorts');
});

Auth::routes();
