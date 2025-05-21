# SigiloPro: Sistema de Arquivologia de Mensagens

## Estrutura de Pastas

```
SigiloPro/
├── composer.json
├── .env
├── README.md
├── public/
│   └── index.php
├── src/
│   ├── Config/
│   │   └── Database.php
│   ├── Core/
│   │   ├── Router.php
│   │   └── ControllerInterface.php
│   ├── Controller/
│   │   └── MessageController.php
│   ├── Model/
│   │   └── Message.php
│   ├── Repository/
│   │   └── MessageRepository.php
│   └── Utils/
│       └── Response.php
├── templates/
│   └── messages.twig
├── assets/
│   ├── css/
│   │   └── style.css
│   └── js/
│       └── app.js
└── vendor/
```

---

## composer.json

```json
{
    "name": "empresa/sigilopro",
    "description": "SigiloPro: Sistema de arquivologia de mensagens",
    "type": "project",
    "require": {
        "vlucas/phpdotenv": "^5.5",
        "twig/twig": "^3.0"
    },
    "autoload": {
        "psr-4": { "App\\": "src/" }
    }
}
```

---

## README.md

````md
# SigiloPro

Sistema de arquivologia de mensagens com foco em segurança e confidencialidade, permitindo organização por grau e sigilo e busca eficiente.

### Funcionalidades

- Cadastro de mensagens com classificação por grau (Alta, Média, Baixa).
- Definição de níveis de sigilo (Secreto, Reservado, Ostensivo).
- Filtros dinâmicos para consulta de mensagens.
- Interface responsiva e amigável.

### Tecnologias

- PHP 8+ com PDO e PSR-4.
- Twig para renderização de templates.
- JavaScript modular (Fetch API).
- CSS moderno com variáveis e BEM.
- Dotenv para gerenciamento de variáveis de ambiente.

### Como Rodar (Desenvolvimento)

1. Clone o repositório:
   ```bash
   git clone https://github.com/EdinFaria/sigilopro.git
   cd sigilopro
````

2. Instale dependências:

   ```bash
   composer install
   ```
3. Configure o `.env` com suas credenciais:

   ```dotenv
   DB_HOST=127.0.0.1
   DB_NAME=sigilopro
   DB_USER=usuario
   DB_PASS=senha
   ```
4. Crie o banco de dados e tabela:

   ```sql
   CREATE DATABASE sigilopro CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   CREATE TABLE mensagens (
     id INT AUTO_INCREMENT PRIMARY KEY,
     remetente VARCHAR(100) NOT NULL,
     destinatario VARCHAR(100) NOT NULL,
     mensagem TEXT NOT NULL,
     grau ENUM('Alta','Média','Baixa') NOT NULL,
     sigilo ENUM('Confidencial','Restrito','Público') NOT NULL,
     data_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );
   ```
5. Execute o servidor embutido (modo dev):

   ```bash
   php -S localhost:8000 -t public
   ```

   Acesse em: [http://localhost:8000](http://localhost:8000)

### Guia de Uso

1. **Cadastro de Mensagem**

   * Preencha Remetente, Destinatário, Mensagem, Grau e Sigilo.
   * Clique em **Enviar** para arquivar.
2. **Filtragem de Mensagens**

   * Escolha um Grau e/ou Sigilo nos filtros.
   * Clique em **Filtrar** para exibir as mensagens desejadas.
3. **Limpar Filtros**

   * Selecione **Todos** nos filtros e clique em filtrar para voltar à lista completa.

````
md
# SigiloPro

Sistema de arquivologia de mensagens com foco em segurança e confidencialidade, permitindo organização por grau e sigilo e busca eficiente.

### Funcionalidades

- Cadastro de mensagens com classificação por grau (Alta, Média, Baixa).
- Definição de níveis de sigilo (Confidencial, Restrito, Público).
- Filtros dinâmicos para consulta de mensagens.
- Interface responsiva e amigável.

### Tecnologias

- PHP 8+ com PDO e PSR-4.
- Twig para renderização de templates.
- JavaScript modular (Fetch API).
- CSS moderno com variáveis e BEM.
- Dotenv para gerenciamento de variáveis de ambiente.

### Como Rodar

1. Clone o repositório: `git clone https://github.com/empresa/sigilopro.git`
2. Instale dependências: `composer install`
3. Configure o `.env` com suas credenciais:
   ```dotenv
   DB_HOST=127.0.0.1
   DB_NAME=sigilopro
   DB_USER=usuario
   DB_PASS=senha
````

4. Crie o banco de dados e rode as migrations (ou o script SQL).
5. Acesse `http://localhost/SigiloPro/public/index.php`.

```

---

*(Os demais arquivos permanecem com o mesmo conteúdo, mas com referencias atualizadas para SigiloPro no README e composer.)*

```

