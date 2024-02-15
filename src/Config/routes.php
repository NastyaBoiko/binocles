<?php

return [
    '~^hello/(.*)$~' => [\Src\Controllers\MainController::class, 'sayHello'],
    '~^products/all$~' => [\Src\Controllers\ProductController::class, 'all'],
    '~^product/(.*)$~' => [\Src\Controllers\ProductController::class, 'show'],
    '~^articles/all$~' => [\Src\Controllers\ArticlesController::class, 'all'],
    '~^articles/(\d+)$~' => [\Src\Controllers\ArticlesController::class, 'view'],
    '~^$~' => [\Src\Controllers\MainController::class, 'main'],
];