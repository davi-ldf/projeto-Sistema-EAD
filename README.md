# Distance Learning System in PHP

This project is an Distance Learning system developed using PHP and MySQL. It provides a platform for administrators to manage users and courses, and for clients to access and consume educational content.

## Requirements

- PHP 7.0 or higher
- Web server compatible with PHP (e.g., Apache, Nginx)
- MySQL database
- Mysqli extension enabled.

##Features
### Admin Panel
- Add, edit, and delete users and courses.
- Access detailed reports of all transactions made within the platform.

### Client Panel
- View, acquire, and watch courses.
- Spend balance provided by the administrator or directly via a database management platform like phpMyAdmin.

### Password Recovery
- On the login screen, there is a "Forgot your password?" button through which you can request an email with a new password.


## Setup

1. Clone this repository to your local environment:

    `git clone https://github.com/davi-ldf/API_NoteCore.git`


2. Import the `escola_ead.sql` file located in the root of the project in your MySQL database management tool (such as MySQL Workbench, phpMyAdmin, or via command line).

3. Rename the `config.example.php` file to `config.php`.

4. Open the `config.php` file and configure your database credentials:

```php
<?php
$db_host = 'your_host_name';
$db_name = 'escola_ead';
$db_user = 'your_user';
$db_pass = 'your_password';

```

## Usage

### Admin Login
- Username: admin@admin.com
- Password: 123456
  
### Client Login
- Username: user@user.com
- Password: 123456
  
Admins can manage users and courses, and view transaction reports. 
Clients can browse and purchase courses.

## Contribution

Contributions are welcome! Feel free to submit pull requests or report issues.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for more details.


____________________________________________________________________________________________________________________________________________________________________________________________________________________

### Readme em pt-br

# Sistema de EAD em PHP

Este projeto é um sistema de EAD (E-learning) desenvolvido usando PHP e MySQL. Ele fornece uma plataforma para administradores gerenciarem usuários e cursos, e para clientes acessarem e consumirem conteúdo educacional.

## Requisitos
- PHP 7.0 ou superior
- Servidor web compatível com PHP (por exemplo, Apache, Nginx)
- Banco de dados MySQL
- Extensão Mysqli habilitada


## Funcionalidades

### Painel do Admin
- Adicionar, editar e deletar usuários e cursos.
- Acessar relatórios detalhados de todas as transações realizadas na plataforma.

### Painel do Cliente
- Visualizar, adquirir e assistir aos cursos.
- Gastar saldo fornecido pelo administrador ou diretamente via uma plataforma de gerenciamento de banco de dados, como phpMyAdmin.

### Recuperação de Senha
- Na tela de login, há um botão "Esqueceu sua senha?" pelo qual você pode solicitar um email com uma nova senha.


## Instalação
1. Clone este repositório para seu ambiente local:

    `git clone https://github.com/davi-ldf/API_NoteCore.git`


2. Importe o arquivo `escola_ead.sql` localizado na raiz do projeto no seu gerenciador de banco de dados MySQL (como MySQL Workbench, phpMyAdmin, ou via linha de comando).

3. Renomeie o arquivo `config.example.php` para `config.php`.

4. Abra o arquivo `config.php` e configure suas credenciais de banco de dados:

```php

<?php
$db_host = 'seu_host';
$db_name = 'escola_ead';
$db_user = 'seu_usuario';
$db_pass = 'sua_senha';

```

## Uso

### Login do Administrador
- Usuário: admin@admin.com
- Senha: 123456

### Login do Cliente
- Usuário: user@user.com
- Senha: 123456

Os administradores podem gerenciar usuários e cursos, e visualizar relatórios de transações.

Os clientes podem navegar e adquirir cursos.

## Contribuição
Contribuições são bem-vindas! Sinta-se à vontade para enviar pull requests ou relatar problemas.

## Licença
Este projeto está licenciado sob a Licença MIT - veja o arquivo [LICENSE](LICENSE) para mais detalhes.
