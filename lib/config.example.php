<?php 
//Renomeie este arquivo para 'config.php'

$host = 'localhost';
$user = 'your_user';
$pass = 'your_password';
$db = 'escola_ead';
//Crie o banco de dados acima e importe o arquivo SQL disponibilizado no diretório "database/".

$mysqli = new mysqli($host, $user, $pass, $db);

/* Check connection */
if($mysqli->connect_errno) {
    echo "Connect failed: ". $mysqli->connect_error;
    exit();
}

?>