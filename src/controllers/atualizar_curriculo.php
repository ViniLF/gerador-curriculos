<?php
session_start();
require '../db/connection.php';

// Verificar se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../login.php");
    exit;
}

// Verificar se o ID foi fornecido
if (!isset($_POST['id']) || empty($_POST['id'])) {
    die("ID do currículo não fornecido.");
}

$id = $_POST['id'];
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

// Atualizar os dados no banco de dados
$sql = "UPDATE curriculos SET name = ?, email = ?, phone = ?, address = ?, objective = ?, education = ?, experience = ?, skills = ?, theme = ? 
        WHERE id = ? AND user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssssi", $name, $email, $phone, $address, $objective, $education, $experience, $skills, $theme, $id, $user_id);

if ($stmt->execute()) {
    // Redirecionar para a página de listagem com mensagem de sucesso
    header("Location: ../../listar_curriculos.php?success=2");
    exit;
} else {
    die("Erro ao atualizar o currículo: " . $conn->error);
}
?>
