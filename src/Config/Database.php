<?php
namespace App\Config;

declare(strict_types=1);

use PDO;
use PDOException;

class Database
{
    /**
     * Retorna instância PDO configurada.
     */
    public function getConnection(): PDO
    {
        \$dsn = sprintf(
            'mysql:host=%s;dbname=%s;charset=utf8mb4',
            getenv('DB_HOST'),
            getenv('DB_NAME')
        );

        try {
            return new PDO(
                \$dsn,
                getenv('DB_USER'),
                getenv('DB_PASS'),
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]
            );
        } catch (PDOException \$e) {
            Response::json(['error' => 'Database connection failed.'], 500);
            exit;
        }
    }
}