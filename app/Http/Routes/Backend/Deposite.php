<?php

Route::group([
    'namespace'  => 'General',
], function()
{
    //cash
    Route::post('cash', 'CashController@store');

    //cheque
    Route::post('cheque', 'ChequeController@store');

});
