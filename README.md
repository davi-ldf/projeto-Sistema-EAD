Distance Learning System in PHP
This project is an E-learning (EAD) system developed using PHP and MySQL. It provides a platform for administrators to manage users and courses, and for clients to access and consume educational content.

Features
Admin Panel
Add, edit, and delete users and courses.
Access detailed reports of all transactions made within the platform.
Client Panel
View, acquire, and watch courses.
Spend balance provided by the administrator or directly via a database management platform like phpMyAdmin.
Installation Instructions
Clone the repository:

bash
Copiar código
git clone https://github.com/your-username/ead-system.git
cd ead-system
Import the database:

Open phpMyAdmin or your preferred MySQL management tool.
Create a new database.
Import the database.sql file located in the root of the project into the new database.
Configuration:

Rename the file config.example.php to config.php:

bash
Copiar código
mv config.example.php config.php
Open config.php and fill in your local server's username and password:

php
Copiar código
define('DB_USER', 'your-username');
define('DB_PASSWORD', 'your-password');
Usage
To access the system, use the following credentials:

Admin Login
Username: admin@admin.com
Password: 123456
Client Login
Username: user@user.com
Password: 123456
Admins can manage users and courses, and view transaction reports. Clients can browse and purchase courses.
