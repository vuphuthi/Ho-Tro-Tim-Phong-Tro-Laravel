<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 8/9/22 .
 * Time: 1:21 AM .
 */


Route::group(['namespace' => 'User','prefix' => 'user','middleware' => 'checkLoginUser'], function (){
    Route::get('cap-nhat.html','UserProfileController@index')->name('get_user.profile.index');
    Route::post('cap-nhat.html','UserProfileController@update');

    Route::get('cap-nhat-so-dien-thoai.html','UserProfileController@updatePhone')->name('get_user.profile.update_phone');
    Route::post('cap-nhat-so-dien-thoai.html','UserProfileController@processUpdatePhone');

    Route::post('send-code','UserProfileController@sendCode')->name('post_user.send_code');


    Route::group(['prefix' => 'room'], function () {
        Route::get('','UserRoomController@index')->name('get_user.room.index');
        Route::get('create','UserRoomController@create')->name('get_user.room.create');
        Route::post('create','UserRoomController@store');

        Route::get('pay/{id}','UserRoomController@payRoom')->name('get_user.room.pay');
        Route::post('pay/{id}','UserRoomController@savePayRoom');
        Route::get('hide/{id}','UserRoomController@hideRoom')->name('get_user.room.hide');
        Route::get('active/{id}','UserRoomController@activeRoom')->name('get_user.room.active');
        Route::get('update/{id}','UserRoomController@edit')->name('get_user.room.update');
        Route::get('delete-img/{id}','UserRoomController@deleteImage')->name('get_user.room.delete_image');
        Route::post('update/{id}','UserRoomController@update');
    });

    Route::get('lich-su-nap-tien.html','UserRechargeController@rechargeHistory')->name('get_user.recharge.history');
    Route::get('lich-su-thanh-toan.html','UserRechargeController@paymentHistory')->name('get_user.payment.history');
    Route::get('{slug}-{id}','UserRechargeController@switchRecharge')->name('get_user.recharge.switch')
        ->where(['slug' => '[a-z-0-9-]+', 'id' => '[0-9]+',]);

    Route::group(['prefix' => 'nap-tien'], function () {
        Route::get('','UserRechargeController@index')->name('get_user.recharge.index');
        Route::get('atm-internet-banking','UserRechargeController@atmInternet')->name('get_user.recharge.atm');
        Route::post('atm-internet-banking','UserRechargeController@processAtmInternet');
        Route::get('post-back-atm-internet-banking','UserRechargeController@postbackAtm');
        Route::get('{slug}-{id}','UserRechargeController@switchRecharge')->name('get_user.recharge.switch')
            ->where(['slug' => '[a-z-0-9-]+', 'id' => '[0-9]+',]);
    });
});
