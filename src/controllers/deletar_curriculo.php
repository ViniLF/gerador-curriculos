<?php
session_start();
require '../db/connection.php';

// Verificar se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../login.php");
    exit;
}

if (!isset($_GET['id'])) {
    die("ID do currículo não fornecido.");
}

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];

$sql = "DELETE FROM curriculos WHERE id = ? AND user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $id, $user_id);

if ($stmt->execute()) {
    header("Location: ../../listar_curriculos.php?success=3");
    exit;
} else {
    die("Erro ao excluir o currículo: " . $stmt->error);
}
?>
