<?php
session_start();
require '../db/connection.php';

// Verificar se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../login.php");
    exit;
}

// Receber os dados do formulário
$user_id = $_SESSION['user_id'];
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$address = trim($_POST['address']);
$objective = trim($_POST['objective']);
$education = trim($_POST['education']);
$experience = trim($_POST['experience']);
$skills = trim($_POST['skills']);
$theme = isset($_POST['theme']) ? $_POST['theme'] : 'default';

// Validar campos obrigatórios
if (empty($name) || empty($email) || empty($phone) || empty($address) || 
    empty($objective) || empty($education) || empty($experience) || empty($skills)) {
    die("Todos os campos são obrigatórios.");
}

// Inserir os dados no banco de dados
$sql = "INSERT INTO curriculos (user_id, name, email, phone, address, objective, education, experience, skills, theme) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isssssssss", $user_id, $name, $email, $phone, $address, $objective, $education, $experience, $skills, $theme);

if ($stmt->execute()) {
    // Redirecionar para a página de listagem com mensagem de sucesso
    header("Location: ../../listar_curriculos.php?success=1");
    exit;
} else {
    die("Erro ao salvar o currículo: " . $conn->error);
}
?>
