<?php

Route::group(['prefix' => 'users_hashes', 'as' => 'users_hashes.'], function () {
	Route::post('/',  'UsersHashes\UsersHashesCreate')->name('create');
	Route::get('/user',  'UsersHashes\UsersHashesGetUserHashes')->name('get.user');
});
