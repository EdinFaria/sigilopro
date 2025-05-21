<?php
namespace App\Core;

declare(strict_types=1);

class Router
{
    private array \$routes = [];

    public function get(string \$path, callable \$handler): self
    {
        \$this->routes['GET'][\$path] = \$handler;
        return \$this;
    }

    public function post(string \$path, callable \$handler): self
    {
        \$this->routes['POST'][\$path] = \$handler;
        return \$this;
    }

    public function dispatch(string \$uri, string \$method, \PDO \$db): void
    {
        \$path = parse_url(\$uri, PHP_URL_PATH);
        \$handler = \$this->routes[\$method][\$path] ?? null;

        if (!\$handler) {
            http_response_code(404);
            echo 'Página não encontrada';
            return;
        }

        [\$class, \$method] = \$handler;
        \$controller = new \$class(\$db);
        \$controller->{\$method}();
    }
}