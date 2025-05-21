<?php
declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\Config\Database;
use App\Core\Router;

// Carrega variáveis de ambiente
Dotenv\Dotenv::createImmutable(__DIR__ . '/..')->load();

// Inicia serviços
$db       = (new Database())->getConnection();
$router   = (new Router())
    ->get('/',         ['App\\Controller\\MessageController', 'index'])
    ->post('/message', ['App\\Controller\\MessageController', 'create'])
    ->get('/filter',   ['App\\Controller\\MessageController', 'filter']);

$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD'], $db);