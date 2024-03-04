<?php



Route::group(['namespace' => 'Admin','prefix' => 'admin','middleware' => ['checkLoginAdmin']], function (){
    Route::get('','AdminDashboardController@index')->name('get_admin.home.index')->middleware('permission:full|get_admin.index');

    Route::group(['prefix' => 'location'], function () {
        Route::get('','AdminLocationController@index')->name('get_admin.location.index')->middleware('permission:full|get_admin.location.index');
        Route::get('create','AdminLocationController@create')->name('get_admin.location.create')->middleware('permission:full|get_admin.location.create');
        Route::post('create','AdminLocationController@store');

        Route::get('update/{id}','AdminLocationController@edit')->name('get_admin.location.update')->middleware('permission:full|get_admin.location.update');
        Route::post('update/{id}','AdminLocationController@update');

        Route::get('delete/{id}','AdminLocationController@delete')->name('get_admin.location.delete')->middleware('permission:full|get_admin.location.delete');
    });



    Route::group(['prefix' => 'category'], function () {
        Route::get('','AdminCategoryController@index')->name('get_admin.category.index')->middleware('permission:full|get_admin.category.index');
        Route::get('create','AdminCategoryController@create')->name('get_admin.category.create')->middleware('permission:full|get_admin.category.create');
        Route::post('create','AdminCategoryController@store');

        Route::get('update/{id}','AdminCategoryController@edit')->name('get_admin.category.update')->middleware('permission:full|get_admin.category.update');
        Route::post('update/{id}','AdminCategoryController@update');

        Route::get('delete/{id}','AdminCategoryController@delete')->name('get_admin.category.delete')->middleware('permission:full|get_admin.category.delete');
    });

    Route::group(['prefix' => 'article'], function () {
        Route::get('','AdminArticleController@index')->name('get_admin.article.index')->middleware('permission:full|get_admin.article.index');
        Route::get('create','AdminArticleController@create')->name('get_admin.article.create')->middleware('permission:full|get_admin.article.create');
        Route::post('create','AdminArticleController@store');

        Route::get('update/{id}','AdminArticleController@edit')->name('get_admin.article.update')->middleware('permission:full|get_admin.article.update');
        Route::post('update/{id}','AdminArticleController@update');

        Route::get('delete/{id}','AdminArticleController@delete')->name('get_admin.article.delete')->middleware('permission:full|get_admin.article.delete');
    });

    Route::group(['prefix' => 'recharge'], function () {
        Route::get('','AdminRechargeController@index')->name('get_admin.recharge.index')->middleware('permission:full|get_admin.recharge.index');
        Route::get('pay','AdminRechargeController@indexPay')->name('get_admin.recharge_pay.index')->middleware('permission:full|get_admin.recharge_pay.index');

        Route::get('create','AdminRechargeController@create')->name('get_admin.recharge.create')->middleware('permission:full|get_admin.recharge.create');
        Route::post('create','AdminRechargeController@store');

        Route::get('update/{id}','AdminRechargeController@edit')->name('get_admin.recharge.update')->middleware('permission:full|get_admin.recharge.update');
        Route::post('update/{id}','AdminRechargeController@update');
    });

    Route::group(['prefix' => 'user'], function () {
        Route::get('','AdminUserController@index')->name('get_admin.user.index')->middleware('permission:full|get_admin.user.index');
        Route::get('update/{id}','AdminUserController@edit')->name('get_admin.user.update')->middleware('permission:full|get_admin.user.update');
        Route::get('view/{id}','AdminUserController@view')->name('get_admin.user.view')->middleware('permission:full|get_admin.user.view');
        Route::post('update/{id}','AdminUserController@update');
        Route::get('delete/{id}','AdminUserController@delete')->name('get_admin.user.delete')->middleware('permission:full|get_admin.user.delete');
    });

    Route::group(['prefix' => 'room'], function () {
        Route::get('','AdminRoomController@index')->name('get_admin.room.index')->middleware('permission:full|get_admin.room.index');
        Route::get('create','AdminRoomController@create')->name('get_admin.room.create')->middleware('permission:full|get_admin.room.create');
        Route::post('create','AdminRoomController@store');
        Route::get('detail/{id}','AdminRoomController@show')->name('room-admin.detail');

        Route::get('success/{id}','AdminRoomController@success')->name('get_admin.room.success')->middleware('permission:full|get_admin.room.success');
        Route::get('expires/{id}','AdminRoomController@expires')->name('get_admin.room.expires')->middleware('permission:full|get_admin.room.expires');
        Route::get('hide/{id}','AdminRoomController@hide')->name('get_admin.room.hide')->middleware('permission:full|get_admin.room.hide');
        Route::get('cancel/{id}','AdminRoomController@cancel')->name('get_admin.room.cancel')->middleware('permission:full|get_admin.room.cancel');
        Route::post('cancel/{id}','AdminRoomController@processCancelRoom')->middleware('permission:full|get_admin.room.processCancelRoom');

        Route::get('update/{id}','AdminRoomController@edit')->name('get_admin.room.update')->middleware('permission:full|get_admin.room.update');
        Route::post('update/{id}','AdminRoomController@update');

        Route::get('delete/{id}','AdminRoomController@delete')->name('get_admin.room.delete')->middleware('permission:full|get_admin.room.delete');
    });

    Route::group(['prefix' => 'permission'], function () {
        Route::get('','AdminPermissionController@index')->name('get_admin.permission.index')->middleware('permission:full|get_admin.permission.index');
        Route::get('create','AdminPermissionController@create')->name('get_admin.permission.create')->middleware('permission:full|get_admin.permission.create');
        Route::post('create','AdminPermissionController@store');

        Route::get('update/{id}','AdminPermissionController@edit')->name('get_admin.permission.update')->middleware('permission:full|get_admin.permission.update');
        Route::post('update/{id}','AdminPermissionController@update');

        Route::get('delete/{id}','AdminPermissionController@delete')->name('get_admin.permission.delete')->middleware('permission:full|get_admin.permission.delete');
    });

    Route::group(['prefix' => 'role'], function () {
        Route::get('','AdminRoleController@index')->name('get_admin.role.index')->middleware('permission:full|get_admin.role.index');
        Route::get('create','AdminRoleController@create')->name('get_admin.role.create')->middleware('permission:full|get_admin.role.create');
        Route::post('create','AdminRoleController@store');

        Route::get('update/{id}','AdminRoleController@edit')->name('get_admin.role.update')->middleware('permission:full|get_admin.role.update');
        Route::post('update/{id}','AdminRoleController@update');

        Route::get('delete/{id}','AdminRoleController@delete')->name('get_admin.role.delete')->middleware('permission:full|get_admin.role.delete');
    });

    Route::group(['prefix' => 'account'], function () {
        Route::get('','AdminAccountController@index')->name('get_admin.account.index')->middleware('permission:full|get_admin.account.index');
        Route::get('create','AdminAccountController@create')->name('get_admin.account.create')->middleware('permission:full|get_admin.account.create');
        Route::post('create','AdminAccountController@store');

        Route::get('update/{id}','AdminAccountController@edit')->name('get_admin.account.update')->middleware('permission:full|get_admin.account.update');
        Route::post('update/{id}','AdminAccountController@update');

        Route::get('delete/{id}','AdminAccountController@delete')->name('get_admin.account.delete')->middleware('permission:full|get_admin.account.delete');
    });

    Route::group(['prefix' => 'option'], function () {
        Route::get('','AdminOptionController@index')->name('get_admin.option.index')->middleware('permission:full|get_admin.option.index');
        Route::get('create','AdminOptionController@create')->name('get_admin.option.create')->middleware('permission:full|get_admin.option.create');
        Route::post('create','AdminOptionController@store');

        Route::get('update/{id}','AdminOptionController@edit')->name('get_admin.option.update')->middleware('permission:full|get_admin.option.update');
        Route::post('update/{id}','AdminOptionController@update');

        Route::get('delete/{id}','AdminOptionController@delete')->name('get_admin.option.delete')->middleware('permission:full|get_admin.option.delete');
    });
});
