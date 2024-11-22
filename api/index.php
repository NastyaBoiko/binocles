<?php

use Src\Exceptions\WrongMethodException;

spl_autoload_register(function (string $className) {
    require_once __DIR__ . '/../' . $className . '.php';
});

header("Access-Control-Allow-Origin: *"); 
header("Access-Control-Allow-Methods: GET, HEAD, PUT, PATCH, POST, DELETE, OPTIONS"); 
header("Access-Control-Allow-Headers: Content-Type, Authorization");

try {
    $method = $_SERVER['REQUEST_METHOD'];
    // $headers = getallheaders();
    // var_dump($headers);die;

    $route = $_GET['route'] ?? '';

    $routes = require __DIR__ . '/../src/config/routes_api.php';
    // var_dump($routes);

    $isRouteFound = false;
    foreach ($routes as $pattern => $controllerAndAction) {
        preg_match($pattern, $route, $matches);
        if (!empty($matches)) {
            $isRouteFound = true;
            break;
        }
    }

    if (!$isRouteFound) {
        throw new Src\Exceptions\NotFoundException('Route not found');
    }

    unset($matches[0]);
    $controllerName = $controllerAndAction[0];

    if ($method == 'OPTIONS') {
        http_response_code(200);
        exit();
    }

    // Обработка запроса OPTIONS
    // if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    //     // Если это запрос OPTIONS, просто завершите выполнение
    //     exit();
    // }

    if (!isset($controllerAndAction[$method])) {
        echo $method; die;
        throw new WrongMethodException('Недоступный метод');
    }
    $actionName = $controllerAndAction[$method];

    $controller = new $controllerName();
    $controller->$actionName(...$matches);
} catch (\Src\Exceptions\DbException $e) {
    $view = new \Src\Views\View('default');
    $view->displayJson(['error' => $e->getMessage()], 500);
} catch (\Src\Exceptions\NotFoundException $e) {
    $view = new \Src\Views\View('default');
    $view->displayJson(['error' => $e->getMessage()], 404);
} catch (\Src\Exceptions\UnauthorizedException $e) {
    $view = new \Src\Views\View('default');
    $view->displayJson(['error' => $e->getMessage()], 401);
} catch (\Src\Exceptions\WrongMethodException $e) {
    $view = new \Src\Views\View('default');
    $view->displayJson(['error' => $e->getMessage()], 405);
} catch (\Src\Exceptions\InvalidArgumentException $e) {
    $view = new \Src\Views\View('default');
    $view->displayJson(['error' => $e->getMessage()], 400);
}
