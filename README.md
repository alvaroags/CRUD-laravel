# Projeto To Do List

Este projeto é uma aplicação web simples para gerenciar uma lista de tarefas. Ele permite que o usuário crie, edite, exclua e marque tarefas como concluídas. Além disso, possui um recurso de alternância entre os modos claro e escuro.

![Alt text](https://i.ibb.co/v4msRbB/todolist.png "Imagem da página inicial do projeto")

## Tecnologias utilizadas

- **Laravel**: Framework PHP para o desenvolvimento da aplicação back-end.
- **Bootstrap**: Framework CSS para o desenvolvimento da interface do usuário.
- **JavaScript**: Linguagem de programação para a interatividade do botão de alternância de tema.

## Funcionalidades

- **Listagem de tarefas**: exibe todas as tarefas cadastradas.
- **Cadastro de tarefas**: permite ao usuário adicionar novas tarefas à lista.
- **Edição de tarefas**: possibilita a alteração do nome, descrição, status e prioridade de uma tarefa.
- **Exclusão de tarefas**: remove uma tarefa da lista.
- **Alternância de tema**: permite ao usuário alterar entre os modos claro e escuro da aplicação.

## Estrutura de Diretórios

1. **`app/`**: Contém a lógica da aplicação, incluindo models, controllers, middleware, etc.
   - **`app/Models/ModelTarefa.php`**: Modelo Eloquent para a entidade `tarefas`, responsável pela interação com a tabela `tarefas` no banco de dados.
   - **`app/Http/Controllers/`**: Diretório que contém os controllers da aplicação.
     - **`app/Http/Controllers/TarefaController.php`**: Controller responsável por gerenciar as ações relacionadas às tarefas, como listagem, criação, edição e exclusão.
   - **`app/Http/Requests/TarefaRequest.php`**: Classe de requisição que define as regras de validação para as requisições relacionadas às tarefas.

2. **`database/`**: Contém os arquivos relacionados ao banco de dados da aplicação.
   - **`database/migrations/2024_05_15_create_tarefas_table.php`**: Migration responsável por criar a tabela `tarefas` no banco de dados.
   - **`database/factories/TarefaFactory.php`**: Factory responsável por gerar dados de teste para a tabela `tarefas`.

3. **`resources/`**: Contém os recursos da aplicação, como views, assets, etc.
   - **`resources/views/`**: Diretório que contém os arquivos Blade para as views da aplicação.
     - **`resources/views/tarefa.blade.php`**: View que exibe a lista de tarefas.
     - **`resources/views/create.blade.php`**: View para a criação de novas tarefas.

4. **`routes/`**: Contém os arquivos de definição de rotas da aplicação.
   - **`routes/web.php`**: Arquivo de definição de rotas web, onde são definidas as rotas para as diferentes ações da aplicação.

### Fluxo de Funcionamento

1. **Listagem de Tarefas**:
   - A lista de tarefas é exibida na página inicial da aplicação (`/tarefa`).
   - O controller `TarefaController` obtém todas as tarefas do banco de dados e passa para a view `tarefa.blade.php` para exibição.

2. **Criação de Tarefas**:
   - O usuário acessa a página de criação de tarefas (`/tarefa/create`).
   - O controller `TarefaController` exibe o formulário de criação.
   - O usuário preenche o formulário e envia os dados.
   - O controller valida os dados, cria uma nova tarefa e a salva no banco de dados.

3. **Edição de Tarefas**:
   - O usuário acessa a página de edição de uma tarefa específica (`/tarefa/{id}/edit`).
   - O controller `TarefaController` busca a tarefa com o ID correspondente e exibe o formulário de edição preenchido com os dados da tarefa.
   - O usuário modifica os dados e envia o formulário.
   - O controller valida os dados, atualiza a tarefa no banco de dados e redireciona para a lista de tarefas.

4. **Exclusão de Tarefas**:
   - O usuário clica no botão de exclusão de uma tarefa na lista de tarefas.
   - O controller `TarefaController` exclui a tarefa correspondente do banco de dados e redireciona para a lista de tarefas.

5. **Alternância de Tema**:
   - O usuário clica no botão de alternância de tema.
   - Um script JavaScript altera o atributo `data-bs-theme` do elemento `<html>` para alternar entre os temas claro e escuro.
   - As regras de estilo CSS são aplicadas com base no tema selecionado, alterando o visual da aplicação.

## Instalação

1. Clone o repositório: `git clone https://github.com/seu-usuario/projeto-todo-list.git`
2. Instale as dependências do Composer: `composer install`
3. Copie o arquivo de ambiente: `cp .env.example .env`
4. Configure o arquivo `.env` com as informações do seu banco de dados
5. Gere a chave de aplicação: `php artisan key:generate`
6. Execute as migrações do banco de dados: `php artisan migrate`
7. Inicie o servidor de desenvolvimento: `php artisan serve`