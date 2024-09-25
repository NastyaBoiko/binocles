<?php

return [
    '~^articles/(\d+)$~' => [\Src\Controllers\Api\ArticlesApiController::class, 'view'],
    '~^articles/all$~' => [\Src\Controllers\Api\ArticlesApiController::class, 'all'],
];
