<?php
namespace App\Core;

declare(strict_types=1);

interface ControllerInterface
{
    public function index(): void;
    public function create(): void;
    public function filter(): void;
}