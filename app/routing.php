<?php

$app->get('/', 'App\Controllers\HomeController:index');

$app->get('/users', 'App\Controllers\UserController:getAll')->setName('user');

$app->get('/users/add', 'App\Controllers\UserController:getAdd')->setName('user.add');

$app->post('/users/add', 'App\Controllers\UserController:add')->setName('user.add.post');



 ?>
