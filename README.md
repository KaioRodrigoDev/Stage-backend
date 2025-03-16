# Documentação do Projeto Laravel

Este documento fornece instruções detalhadas para configurar e executar o projeto Laravel desenvolvido para a Stage Consulting. Além disso, orienta sobre como acessar a aplicação através de um link público que será fornecido posteriormente.

A aplicação está disponível online em:

[Endereço do Projeto](https://stage-backend-main-meknfj.laravel.cloud)

## Índice

1. [Pré-requisitos](#pré-requisitos)
2. [Instalação do Projeto](#instalação-do-projeto)
3. [Configuração do Ambiente](#configuração-do-ambiente)
4. [Execução do Projeto](#execução-do-projeto)
5. [Acesso ao Projeto](#acesso-ao-projeto)

## 1. Pré-requisitos

Antes de iniciar a instalação, certifique-se de que seu ambiente atenda aos seguintes requisitos:

-   **PHP**: Versão 8.0 ou superior.
-   **Composer**: Gerenciador de dependências para PHP.
-   **Banco de Dados**: SQlite ou outro compatível.
-   **Node.js e npm**: Necessários para o gerenciamento de pacotes front-end.

## 2. Instalação do Projeto

Siga os passos abaixo para clonar e instalar as dependências do projeto:

1. **Clone o repositório**:

    ```bash
    git clone https://github.com/KaioRodrigoDev/Stage-backend.git
    ```

2. **Acesse o diretório do projeto**:

    ```bash
    cd Stage-backend
    ```

3. **Instale as dependências do PHP via Composer**:

    ```bash
    composer install
    ```

4. **Instale as dependências do Node.js**:

    ```bash
    npm install
    ```

## 3. Configuração do Ambiente

Configure as variáveis de ambiente necessárias para a aplicação:

1. **Crie uma cópia do arquivo `.env.example` e renomeie para `.env`**:

    ```bash
    cp .env.example .env
    ```

2. **Gere a chave da aplicação**:

    ```bash
    php artisan key:generate
    ```

3. **Configure as informações de banco de dados no arquivo `.env`**:

    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nome_do_banco
    DB_USERNAME=usuario
    DB_PASSWORD=senha
    ```

    Substitua `nome_do_banco`, `usuario` e `senha` pelas informações correspondentes.

4. **Execute as migrações para criar as tabelas no banco de dados**:

    ```bash
    php artisan migrate
    ```

## 4. Execução do Projeto

Após configurar o ambiente, siga os passos abaixo para executar a aplicação:

1. **Inicie o servidor de desenvolvimento do Laravel**:

    ```bash
    php artisan serve
    ```

    Por padrão, o servidor estará disponível em `http://localhost:8000`.

## 5. Acesso ao Projeto

Para acessar a aplicação em um ambiente público, um link será fornecido posteriormente. Enquanto isso, você pode acessar a aplicação localmente através do endereço mencionado acima.
