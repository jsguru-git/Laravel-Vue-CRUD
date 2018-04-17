<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {
    Route::resource('partners', 'PartnersController', ['except' => ['create', 'edit']]);
    Route::resource('partnerfieldmapper', 'PartnerFieldTransformsController', ['except' => ['create', 'edit']]);
    Route::resource('partnerfield', 'PartnerFieldsController', ['except' => ['create', 'edit']]);
    Route::get('partnerfieldmapper', 'PartnerFieldTransformsController@find');
    Route::get('partnerfield', 'PartnerFieldsController@find');
});