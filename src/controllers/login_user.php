<?php
require '../db/connection.php';
session_start();

// Receber os dados do formulário
$email = trim($_POST['email']);
$password = trim($_POST['password']);

// Validar os campos
if (empty($email) || empty($password)) {
    // Campos vazios, redirecionar com mensagem de erro
    header("Location: ../../login.php?error=empty");
    exit;
}

// Verificar se o e-mail existe
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    // E-mail não encontrado, redirecionar com mensagem de erro
    header("Location: ../../login.php?error=invalid");
    exit;
}

$user = $result->fetch_assoc();

// Verificar a senha
if (password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $user['name'];
    // Login bem-sucedido, redirecionar com mensagem de sucesso
    header("Location: ../../index.php?success=login");
    exit;
} else {
    // Senha inválida, redirecionar com mensagem de erro
    header("Location: ../../login.php?error=invalid");
    exit;
}
?>
