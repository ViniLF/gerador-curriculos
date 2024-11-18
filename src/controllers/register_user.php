<?php
require '../db/connection.php';

// Receber os dados do formulário
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);

// Validar os campos
if (empty($name) || empty($email) || empty($password)) {
    // Redirecionar com mensagem de erro
    header("Location: ../../register.php?error=empty");
    exit;
}

// Verificar se o e-mail já está registrado
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Redirecionar com mensagem de erro
    header("Location: ../../register.php?error=exists");
    exit;
}

// Hash da senha
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Inserir no banco de dados
$sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $hashed_password);

if ($stmt->execute()) {
    // Registro bem-sucedido, redirecionar com mensagem de sucesso
    header("Location: ../../login.php?success=register");
    exit;
} else {
    // Redirecionar com mensagem de erro genérica
    header("Location: ../../register.php?error=failed");
    exit;
}
?>
