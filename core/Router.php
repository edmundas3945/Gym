<?php

namespace app\core;

/**
 * This is where we all controllers and methods
 * 
 * @package app\core
 */
class Router
{

    protected array $routes = [];
    public Request $request;
    public Response $response;


    public function __construct()
    {
        $this->request = new Request;
        $this->response = new Response;
    }
    /**
     * Add GET route and callback function to routes array
     *
     * @param string $path
     * @param [type] $callback
     */
    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();

        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {

            $pathArr = explode('/', ltrim($path, '/'));

            if (count($pathArr) === 2) {
                $path = '/' . $pathArr[0];
                $urlParam['value'] = $pathArr[1];
            }

            if (count($pathArr) === 3) {
                $path = '/' . $pathArr[0] . '/' . $pathArr[1];
                $urlParam['value'] = $pathArr[2];
            }

            if (!isset($urlParam['value'])) {
                $this->response->setResponseCode(404);
                return $this->renderView('_404');
            }
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        if (is_array($callback)){
            $instance = new $callback[0];
            Application::$app->controller = $instance;
            $callback[0] = Application::$app->controller;

            if (isset($callback['urlParamName'])){
                $urlParam['name'] = $callback['urlParamName'];
                array_splice($callback, 2, 1);
            }
        }

        return call_user_func($callback, $this->request, $urlParam ?? null);
    }

    public function renderView(string $view, array $params = [])
    {
        $layout = $this->layoutContent();
        $page = $this->pageContent($view, $params);

        return str_replace('{{content}}', $page, $layout);
    }

    public function layoutContent()
    {
        $layout = Application::$app->controller->layout;
        ob_start();
        include_once Application::$ROOT_DIR . "/view/layouts/$layout.php";
        return ob_get_clean();
    }

    public function pageContent($view, $params)
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR . "/view/$view.php";
        return ob_get_clean();
    }
}
