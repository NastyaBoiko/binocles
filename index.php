<?php
session_start();

spl_autoload_register(function (string $className) { 
    require_once __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';
});

try {
    $route = $_GET['route'] ?? '';
    
    $routes = require __DIR__ . '/src/config/routes.php';
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
        throw new Src\Exceptions\NotFoundException();
    }
    
    $controllerName = $controllerAndAction[0];
    $actionName = $controllerAndAction[1];
    
    unset($matches[0]);
    $controller = new $controllerName();
    $controller->$actionName(...$matches);
} catch(\Src\Exceptions\DbException $e) {
    $view = new \Src\Views\View('default');
    $view->renderHtml('errors/500.php', ['error' => $e->getMessage()], 500);
} catch(\Src\Exceptions\NotFoundException $e) {
    $view = new \Src\Views\View('default');
    $view->renderHtml('errors/404.php', ['error' => $e->getMessage()], 404);
} catch(\Src\Exceptions\UnauthorizedException $e) {
    $view = new \Src\Views\View('default');
    $view->renderHtml('errors/401.php', ['error' => $e->getMessage()], 401);
}