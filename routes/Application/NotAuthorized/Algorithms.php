<?php

Route::group(['prefix' => 'algorithms', 'as' => 'algorithms.'], function () {
	Route::get('/',  'Algorithms\AlgorithmsGet')->name('get');
});
