<?php
/**
 * Created by PhpStorm.
 * User: Nimesh
 * Date: 10/20/2016
 * Time: 12:01 PM
 */
Route::group([
    'namespace'  => 'General',
], function()
{
    //cash
    Route::POST('loginApp', 'AppController@login');
    Route::POST('registerApp', 'AppController@register');
    Route::get('userinfo/cash', 'AppController@cash');
    Route::get('userinfo/cheque', 'AppController@cheque');
    Route::get('userinfo/bulkcheque', 'AppController@bulkcheque');
    Route::get('test',function(){
        return '1.3';
    });

    Route::any('up', 'AppController@up');

    Route::any('upload', 'AppController@upload');


});