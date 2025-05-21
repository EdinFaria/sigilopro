<?php
namespace App\Model;

declare(strict_types=1);

class Message
{
    public function __construct(
        public readonly int \$id,
        public readonly string \$remetente,
        public readonly string \$destinatario,
        public readonly string \$mensagem,
        public readonly string \$grau,
        public readonly string \$sigilo,
        public readonly string \$dataEnvio
    ) {}
}