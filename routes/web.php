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
    return view('Welcome');
});

/**
 * Authenticated Routes
 */

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Pages in the system
 * @they are connected to their controller 
 */

Route::resource('countries',"CountryController");

/**
 * Form field route
 */
Route::resource('fleet',"FleetController");

/**
 * Dashboard Route
 */
Route::resource('fleetdash',"FleetdashController");


/**
 * all routs for country/city/state 
 * @dropdown
 */
Route::resource('country',"CountryController");

Route::resource('allstates',"StateController");

Route::resource('allcities',"CityController");

/**
 * all the information concerning routes
 */

Route::resource('cargoinfo',"CargoinfoController");

Route::resource('pickupinfo',"PickupinfoController");

Route::resource('clientsinfo',"ClientinfoController");

/**
 * Country State/Region/Provinces city
 * @the controlller holds the serch of the state 
 * @and the city
 */
 Route::get('states',"Countrystatecity@states");
 Route::get('cities',"Countrystatecity@cities");


