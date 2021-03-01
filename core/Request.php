<?php 

namespace app\core;

class Request
{
    public function getPath(): string
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';

        $requestPosition = strpos($path, '?');

        if ($requestPosition !== false) {
            $path = substr($path, 0, $requestPosition);
        }
        if (strlen($path) > 1) {
            $path = trim($path, '/');
        }

        return $path;
    }

    public function method(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function isGet(): bool
    {
        return $this->method() === 'get';
    }

    public function isPost(): bool
    {
        return $this->method() === 'post';
    }
}