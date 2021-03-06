<?php

/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                                                                                                              
    ██╗ ██████╗     ██╗   ██╗███████╗███████╗██████╗ ███████╗
    ██║██╔═══██╗    ██║   ██║██╔════╝██╔════╝██╔══██╗██╔════╝
    ██║██║   ██║    ██║   ██║███████╗█████╗  ██████╔╝███████╗
    ██║██║   ██║    ██║   ██║╚════██║██╔══╝  ██╔══██╗╚════██║
    ██║╚██████╔╝    ╚██████╔╝███████║███████╗██║  ██║███████║
    ╚═╝ ╚═════╝      ╚═════╝ ╚══════╝╚══════╝╚═╝  ╚═╝╚══════╝
                                                            
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

Route::group(['prefix' => 'admin', 'middleware' => ['web','admin'], 'as' => 'admin.'],function(){
    Route::group(['prefix' => 'user'], function () {
        Route::get('/','UserController@index');
        Route::get('list', 'UserController@list');
        Route::post('create', 'UserController@create');
        Route::get('createActivation/{userId}', 'UserController@createActivation');
        Route::get('delete/{id}', 'UserController@delete');			
        Route::post('update/{id}', 'UserController@update');
        Route::get('view/{id}', 'UserController@view');
    });
});

Route::group(['middleware' => ['web']],function(){
    Route::get('admin/user/activate/{userId}/{token}', 'UserController@activate')->name('user.activate');
});



