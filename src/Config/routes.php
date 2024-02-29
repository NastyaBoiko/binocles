<?php

return [
    '~^hello/(.*)$~' => [\Src\Controllers\MainController::class, 'sayHello'],
    '~^products/all$~' => [\Src\Controllers\ProductController::class, 'all'],
    '~^product/(.*)$~' => [\Src\Controllers\ProductController::class, 'show'],
    '~^articles/all$~' => [\Src\Controllers\ArticlesController::class, 'all'],
    '~^articles/add$~' => [\Src\Controllers\ArticlesController::class, 'add'],
    '~^articles/(\d+)/edit$~' => [\Src\Controllers\ArticlesController::class, 'edit'],
    '~^articles/(\d+)/delete$~' => [\Src\Controllers\ArticlesController::class, 'delete'],
    '~^articles/(\d+)$~' => [\Src\Controllers\ArticlesController::class, 'view'],
    '~^users/all$~' => [\Src\Controllers\UsersController::class, 'all'],
    '~^users/register$~' => [\Src\Controllers\UsersController::class, 'signUp'],
    '~^users/login$~' => [\Src\Controllers\UsersController::class, 'login'],
    '~^$~' => [\Src\Controllers\MainController::class, 'main'],
];