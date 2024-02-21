<?php

return [
    '~^hello/(.*)$~' => [\Src\Controllers\MainController::class, 'sayHello'],
    '~^products/all$~' => [\Src\Controllers\ProductController::class, 'all'],
    '~^product/(.*)$~' => [\Src\Controllers\ProductController::class, 'show'],
    '~^articles/all$~' => [\Src\Controllers\ArticlesController::class, 'all'],
    '~^articles/(\d+)/edit$~' => [\Src\Controllers\ArticlesController::class, 'edit'],
    '~^articles/(\d+)$~' => [\Src\Controllers\ArticlesController::class, 'view'],
    '~^users/all$~' => [\Src\Controllers\UsersController::class, 'all'],
    '~^$~' => [\Src\Controllers\MainController::class, 'main'],
];