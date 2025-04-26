<?php
class Router {
    public function route() {
        $url = $_GET['url'] ?? 'photo/index';
        $url = explode('/', $url);
        $controllerName = ucfirst($url[0]) . 'Controller';
        $method = $url[1] ?? 'index';
        $params = array_slice($url, 2);

        $controllerPath = "../app/controllers/$controllerName.php";

        if (file_exists($controllerPath)) {
            require_once $controllerPath;
            $controller = new $controllerName();

            if (method_exists($controller, $method)) {
                $reflection = new ReflectionMethod($controller, $method);
                $requiredParams = $reflection->getNumberOfRequiredParameters();

                if (count($params) >= $requiredParams) {
                    call_user_func_array([$controller, $method], $params);
                } else {
                    $this->error404();
                }
            } else {
                $this->error404();
            }
        } else {
            $this->error404();
        }
    }

    private function error404() {
        require_once "../app/views/errors/404.php";
        exit;
    }
}
?>
