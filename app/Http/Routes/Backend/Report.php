<?php

Route::group([
    'prefix'     => 'report',
    'namespace' => 'Report',//file path
//    'middleware' => 'access.routeNeedsPermission:manage-report',
], function()
{
    //master controller
    Route::get('master', 'MasterController@index')->name('admin.report.master');
    Route::get('master/data', 'MasterController@getDataTable')->name('admin.report.master.data');

    //agent controller
    Route::get('agent', 'AgentController@index')->name('admin.report.agent');
    Route::get('agent/data', 'AgentController@getDataTable')->name('admin.report.agent.data');



});
