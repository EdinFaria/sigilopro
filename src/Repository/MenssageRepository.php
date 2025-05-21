<?php
namespace App\Repository;

declare(strict_types=1);

use PDO;
use App\Model\Message;

class MessageRepository
{
    private PDO \$db;

    public function __construct(PDO \$db)
    {
        \$this->db = \$db;
    }

    public function findAll(): array
    {
        \$stmt = \$this->db->query('SELECT * FROM mensagens ORDER BY data_envio DESC');

        return array_map(
            fn(array \$row) => new Message(
                (int)\$row['id'],
                \$row['remetente'],
                \$row['destinatario'],
                \$row['mensagem'],
                \$row['grau'],
                \$row['sigilo'],
                \$row['data_envio']
            ),
            \$stmt->fetchAll()
        );
    }

    public function findByCriteria(string \$grau = '', string \$sigilo = ''): array
    {
        \$sql = 'SELECT * FROM mensagens WHERE 1';
        \$params = [];

        if (\$grau !== '') {
            \$sql .= ' AND grau = :grau';
            \$params['grau'] = \$grau;
        }

        if (\$sigilo !== '') {
            \$sql .= ' AND sigilo = :sigilo';
            \$params['sigilo'] = \$sigilo;
        }

        \$sql .= ' ORDER BY data_envio DESC';
        \$stmt = \$this->db->prepare(\$sql);
        \$stmt->execute(\$params);

        return array_map(
            fn(array \$row) => new Message(
                (int)\$row['id'],
                \$row['remetente'],
                \$row['destinatario'],
                \$row['mensagem'],
                \$row['grau'],
                \$row['sigilo'],
                \$row['data_envio']
            ),
            \$stmt->fetchAll()
        );
    }

    public function save(array \$data): void
    {
        \$sql = 'INSERT INTO mensagens (remetente, destinatario, mensagem, grau, sigilo) VALUES (:rem, :dest, :msg, :grau, :sigilo)';
        \$stmt = \$this->db->prepare(\$sql);
        \$stmt->execute([
            'rem'    => \$data['remetente'],
            'dest'   => \$data['destinatario'],
            'msg'    => \$data['mensagem'],
            'grau'   => \$data['grau'],
            'sigilo' => \$data['sigilo'],
        ]);
    }
}