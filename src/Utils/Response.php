<?php
namespace App\Utils;

declare(strict_types=1);

class Response
{
    public static function json(mixed \$data, int \$status = 200): void
    {
        http_response_code(\$status);
        header('Content-Type: application/json');
        echo json_encode(\$data);
    }

    public static function html(string \$content): void
    {
        header('Content-Type: text/html; charset=UTF-8');
        echo \$content;
    }

    public static function redirect(string \$url): void
    {
        header("Location: \$url");
        exit;
    }
}