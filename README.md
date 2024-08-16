# Gerenciamento de Tarefas

Um sistema de gerenciamento de tarefas que permite criar, editar, excluir e listar tarefas, além de adicionar e gerenciar categorias para as tarefas.

## Pré-requisitos

Antes de começar, certifique-se de que seu ambiente de desenvolvimento atende aos seguintes requisitos:

- [PHP](https://www.php.net/downloads.php) >= 8.2
- [Composer](https://getcomposer.org/)
- [npm](https://docs.npmjs.com/cli/v10/commands/npm-install)

## Instalação e Configuração

Clone o projeto:
```bash
git clone https://github.com/katson1/taskmanager.git
```

Acesse a pasta do projeto e instale as dependências necessárias com o Composer:
```bash
cd taskmanager
composer install
```

Instale as dependências do npm:
```bash
npm install
```

Compile os ativos com Vite:
```bash
npm run dev
```

### Configuração com SQLite

Para configurar e iniciar o projeto usando SQLite, siga os seguintes passos:

1. **Configuração do Ambiente:**

   Crie um arquivo `.env` a partir do arquivo `.env.example`:
   ```bash
   cp .env.example .env
   ```

   Configure o banco de dados no arquivo `.env`:
   ```plaintext
   DB_CONNECTION=sqlite
   ```

2. **Gere a chave da aplicação:**
   ```bash
   php artisan key:generate
   ```

3. **Execute as migrações para criar as tabelas necessárias no banco de dados:**
   ```bash
   php artisan migrate
   ```

4. **Inicie o servidor de desenvolvimento:**
   ```bash
   php artisan serve
   ```

   O aplicativo estará disponível em `http://localhost:8000`.

## Autor
<div align="left">
  <div>
    Katson Matheus
    <a href="https://github.com/katson1">
      <img src="https://skillicons.dev/icons?i=github" alt="html" height="15" />
    </a>
    <a href="https://discordapp.com/users/210789016675549184">
      <img src="https://skillicons.dev/icons?i=discord" alt="html" height="15"/>
    </a>
    <a href="https://www.linkedin.com/in/katsonmatheus/">
      <img src="https://skillicons.dev/icons?i=linkedin" alt="html" height="15"/>
    </a>
    <a href="mailto:katson.alves@ccc.ufcg.edu.br">
      <img src="https://skillicons.dev/icons?i=gmail" alt="html" height="15"/>
    </a>
  </div>
</div>
