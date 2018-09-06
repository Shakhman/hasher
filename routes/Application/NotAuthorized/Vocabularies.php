<?php

Route::group(['prefix' => 'vocabularies', 'as' => 'vocabularies.'], function () {
	Route::get('/',  'Vocabularies\VocabulariesGet')->name('get');
});
