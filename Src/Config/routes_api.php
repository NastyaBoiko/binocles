<?php

return [
    '~^articles/(\d+)$~' => [\Src\Controllers\Api\ArticlesApiController::class, 'GET' => 'view', 'PATCH' => 'edit', 'DELETE' => 'delete'],
    '~^articles/all$~' => [\Src\Controllers\Api\ArticlesApiController::class, 'GET' => 'all'],
    '~^articles/add$~' => [\Src\Controllers\Api\ArticlesApiController::class, 'POST'  => 'add'],


    '~^goods/(\d+)$~' => [\Src\Controllers\Api\GoodsApiController::class, 'GET' => 'view', 'PATCH' => 'edit', 'DELETE' => 'delete'],

];
