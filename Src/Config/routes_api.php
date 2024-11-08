<?php

return [
    '~^articles/(\d+)$~' => [\Src\Controllers\Api\ArticlesApiController::class, 'GET' => 'view', 'PATCH' => 'edit', 'DELETE' => 'delete'],
    '~^articles/all$~' => [\Src\Controllers\Api\ArticlesApiController::class, 'GET' => 'all'],
    '~^articles/add$~' => [\Src\Controllers\Api\ArticlesApiController::class, 'POST'  => 'add'],


    '~^goods/(\d+)$~' => [\Src\Controllers\Api\GoodsApiController::class, 'GET' => 'view', 'PATCH' => 'edit', 'POST' => 'edit', 'DELETE' => 'delete'],
    '~^goods$~' => [\Src\Controllers\Api\GoodsApiController::class, 'GET' => 'all', 'POST'  => 'add'],

];

// Пример raw JSON для POSTMAN add
// 
// {
//     "good": [
//         {
//             "owner_id": 5,
//             "title": "titleNEW4",
//             "description": "descNew4",
//             "image": "ggg4.png",
//             "amount": 4
//         }
//     ]
// }

// Пример raw JSON для POSTMAN edit
// {
//     "good": [
//         {
//             "title": "titleNEW",
//             "description": "descNew"
//         }
//     ]
// }