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
	
	Route::group(['prefix' => 'vesselSchedule'], function () {
        Route::get('/', ['as' => 'vesselSchedule.index', 'uses' => 'Vessel\VesselScheduleController@index']);
        Route::get('/create', ['as' => 'vesselSchedule.create', 'uses' => 'Vessel\VesselScheduleController@create']);
        Route::post('/store', ['as' => 'vesselSchedule.store', 'uses' => 'Vessel\VesselScheduleController@store']);
        Route::get('/{vesselSchedule}/edit', ['as' => 'vesselSchedule.edit', 'uses' => 'Vessel\VesselScheduleController@edit']);
        Route::put('/{vesselSchedule}', ['as' => 'vesselSchedule.update', 'uses' => 'Vessel\VesselScheduleController@update']);
        Route::delete('/{vesselSchedule}/delete', ['as' => 'vesselSchedule.delete', 'uses' => 'Vessel\VesselScheduleController@destroy']);
    });
	
});

