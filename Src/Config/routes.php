<?php

return [
    '~^hello/(.*)$~' => [\Src\Controllers\MainController::class, 'sayHello'],
    // '~^products/all$~' => [\Src\Controllers\ProductController::class, 'all'],
    // '~^product/(.*)$~' => [\Src\Controllers\ProductController::class, 'show'],
    '~^articles/all$~' => [\Src\Controllers\ArticlesController::class, 'all'],
    '~^articles/add$~' => [\Src\Controllers\ArticlesController::class, 'add'],
    '~^articles/(\d+)/edit$~' => [\Src\Controllers\ArticlesController::class, 'edit'],
    '~^articles/(\d+)/delete$~' => [\Src\Controllers\ArticlesController::class, 'delete'],
    '~^articles/(\d+)$~' => [\Src\Controllers\ArticlesController::class, 'view'],
    '~^users/all$~' => [\Src\Controllers\UsersController::class, 'all'],
    '~^users/register$~' => [\Src\Controllers\UsersController::class, 'signUp'],
    '~^users/login$~' => [\Src\Controllers\UsersController::class, 'login'],
    '~^users/logout$~' => [\Src\Controllers\UsersController::class, 'logout'],
    '~^categories/all$~' => [\Src\Controllers\CategoriesController::class, 'all'],
    '~^categories/(\d+)$~' => [\Src\Controllers\CategoriesController::class, 'view'],
    '~^products/(\d+)$~' => [\Src\Controllers\ProductsController::class, 'view'],
    '~^search$~' => [\Src\Controllers\CategoriesController::class, 'search'],
    '~^$~' => [\Src\Controllers\MainController::class, 'main'],
];