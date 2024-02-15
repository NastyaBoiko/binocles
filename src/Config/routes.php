<?php

return [
    '~^hello/(.*)$~' => [\Src\Controllers\MainController::class, 'sayHello'],
    '~^products/all$~' => [\Src\Controllers\ProductController::class, 'all'],
    '~^product/(.*)$~' => [\Src\Controllers\ProductController::class, 'show'],
    '~^articles/all$~' => [\Src\Controllers\ArticlesController::class, 'main'],
    '~^$~' => [\Src\Controllers\MainController::class, 'main'],
];