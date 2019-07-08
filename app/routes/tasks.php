<?php 

// tasks routes start

Route::get('/tasks', 'TasksController@index')->name('task_list');

Route::post('/tasks/store', 'TasksController@store')->name('task_store');

Route::get('/tasks/create', 'TasksController@create')->name('task_create');

Route::get('/tasks/edit/{id}', 'TasksController@edit')->name('task_edit');

Route::post('/tasks/update', 'TasksController@update')->name('task_update');

Route::post('/tasks/del', 'TasksController@del')->name('task_delete');

// tasks routes end