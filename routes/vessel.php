<?php

Route::group(['middleware' => ['preventbackbutton','auth']], function(){

    Route::group(['prefix' => 'vessel'], function () {
        Route::get('/', ['as' => 'vessel.index', 'uses' => 'Vessel\VesselController@index']);
        Route::get('/create', ['as' => 'vessel.create', 'uses' => 'Vessel\VesselController@create']);
        Route::post('/store', ['as' => 'vessel.store', 'uses' => 'Vessel\VesselController@store']);
        Route::get('/{vessel}/edit', ['as' => 'vessel.edit', 'uses' => 'Vessel\VesselController@edit']);
        Route::put('/{vessel}', ['as' => 'vessel.update', 'uses' => 'Vessel\VesselController@update']);
        Route::delete('/{vessel}/delete', ['as' => 'vessel.delete', 'uses' => 'Vessel\VesselController@destroy']);
    });
});

