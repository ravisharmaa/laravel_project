<?php
Auth::routes();
Route::get('/logout','Auth\\LoginController@logout')->name('logout');
Route::group(['prefix'=>'admin/', 'as'=>'admin.'], function (){

    Route::get('dashboard', 'Admin\\DashboardController@index')->name('dashboard.index');

    //Site Configuration Routes
    Route::get('site-configs/index', 'Admin\\SiteConfigController@index')->name('site-configs.index');
    Route::get('site-configs/create', 'Admin\\SiteConfigController@create')->name('site-configs.create');
    Route::get('site-configs/delete/{id}', 'Admin\\SiteConfigController@delete')->name('site-configs.delete');
    Route::post('site-configs/create', 'Admin\\SiteConfigController@save')->name('site-configs.save');
    Route::post('site-configs/status', 'Admin\\SiteConfigController@changeStatus')->name('site-configs.status');
    Route::get('site-configs/edit/{id}', 'Admin\\SiteConfigController@edit')->name('site-configs.edit');
    Route::patch('site-configs/update/{id}', 'Admin\\SiteConfigController@update')->name('site-configs.update');

    //User Profiles Routes
    Route::get('user-profile/index','Admin\\UserProfileController@index')->name('user-profile.index');
    Route::get('user-profile/create','Admin\\UserProfileController@create')->name('user-profile.create');
    Route::post('user-profile/save','Admin\\UserProfileController@save')->name('user-profile.save');
    Route::get('user-profile/{imagename}','Admin\\UserProfileController@retrieveImage')->name('user-profile.serve');
    Route::get('user-profile/edit/{id}','Admin\\UserProfileController@edit')->name('user-profile.edit');
    Route::get('user-profile/delete/{id}','Admin\\UserProfileController@delete')->name('user-profile.delete');
    Route::patch('user-profile/update/{id}','Admin\\UserProfileController@update')->name('user-profile.update');

    Route::get('menu/index','Admin\\MenuController@index')->name('menu.index');
    Route::get('menu/create','Admin\\MenuController@create')->name('menu.create');
    Route::post('menu/save','Admin\\MenuController@save')->name('menu.save');
    Route::get('menu/edit/{id}','Admin\\MenuController@edit')->name('menu.edit');
    Route::get('menu/delete/{id}','Admin\\MenuController@delete')->name('menu.delete');
    Route::patch('menu/update/{id}','Admin\\MenuController@update')->name('menu.update');

    Route::resource('slider','Admin\\SliderController');


});




//Route::get('/home', 'HomeController@index')->name('home');
