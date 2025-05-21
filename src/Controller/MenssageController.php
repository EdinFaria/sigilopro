<?php
namespace App\Controller;

declare(strict_types=1);

use App\Core\ControllerInterface;
use App\Repository\MessageRepository;
use App\Utils\Response;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class MessageController implements ControllerInterface
{
    private MessageRepository \$repo;
    private Environment \$view;

    public function __construct(private \PDO \$db)
    {
        \$this->repo = new MessageRepository(\$db);
        \$loader    = new FilesystemLoader(__DIR__ . '/../../templates');
        \$this->view = new Environment(\$loader);
    }

    public function index(): void
    {
        Response::html(
            \$this->view->render('messages.twig', ['messages' => \$this->repo->findAll()])
        );
    }

    public function create(): void
    {
        \$payload = filter_input_array(INPUT_POST) ?: [];
        \$this->repo->save(\$payload);
        Response::redirect('/');
    }

    public function filter(): void
    {
        \$grau   = filter_input(INPUT_GET, 'grau', FILTER_SANITIZE_STRING) ?? '';
        \$sigilo = filter_input(INPUT_GET, 'sigilo', FILTER_SANITIZE_STRING) ?? '';
        \$data   = \$this->repo->findByCriteria(\$grau, \$sigilo);

        Response::json(\$data);
    }
}