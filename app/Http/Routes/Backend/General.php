<?php

Route::group([
    'namespace' => 'General',//file path
//    'middleware' => 'access.routeNeedsPermission:manage-report',
], function()
{
    //acccount controller
    Route::resource('account', 'AccountController', ['except' => ['show']]);
    Route::get('account/get', 'AccountController@get')->name('admin.account.get');

    //cash
    Route::resource('cash', 'CashController',['except' => ['show']]);
    Route::get('cash/get', 'CashController@get')->name('admin.cash.get');
    Route::get('cash/get', 'CashController@get')->name('admin.cash.get');

    //cheque
    Route::resource('cheque', 'ChequeController',['except' => ['show']]);
    Route::get('cheque/get', 'ChequeController@get')->name('admin.cheque.get');

});
