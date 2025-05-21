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

1. Clone o repositório: `git clone https://github.com/edinfaria/sigilopro.git`
2. Instale dependências: `composer install`
3. Configure o `.env` com suas credenciais:
   ```dotenv
   DB_HOST=127.0.0.1
   DB_NAME=sigilopro
   DB_USER=usuario
   DB_PASS=senha