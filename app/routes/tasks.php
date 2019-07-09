<?php 

// tasks routes start

Route::middleware('auth')->resource("tasks", "TasksController");

// tasks routes end