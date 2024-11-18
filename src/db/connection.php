<?php
$host = 'localhost';
$user = 'root'; // Usuário padrão do XAMPP/WAMP
$password = ''; // Senha padrão do XAMPP/WAMP
$database = 'gerador_curriculos';

// Criar conexão
$conn = new mysqli($host, $user, $password, $database);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
