<?php

return [
    '~^articles/(\d+)$~' => 
    [\Src\Controllers\Api\ArticlesApiController::class, 'view'],
];