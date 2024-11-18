<?php
session_start();
require 'src/db/connection.php';

// Verificar se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Buscar currículos do usuário
$sql = "SELECT * FROM curriculos WHERE user_id = ? ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Currículos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <h1>Meus Currículos</h1>
        <nav>
            <a href="index.php">Início</a>
            <a href="criar_curriculo.php">Criar Currículo</a>
            <a href="logout.php">Sair</a>
        </nav>
    </header>
    <main>
        <?php if ($result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Data de Criação</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo date('d/m/Y H:i', strtotime($row['created_at'])); ?></td>
                            <td>
                                <a href="editar_curriculo.php?id=<?php echo $row['id']; ?>" class="button edit-button">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a href="src/controllers/deletar_curriculo.php?id=<?php echo $row['id']; ?>" class="button delete-button" onclick="return confirm('Tem certeza que deseja excluir este currículo?');">
                                    <i class="bi bi-x-square"></i>
                                </a>
                                <a href="src/controllers/gerar_pdf.php?id=<?php echo $row['id']; ?>" class="button download-button">
                                    <i class="bi bi-download"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Você ainda não criou nenhum currículo.</p>
        <?php endif; ?>
    </main>
</body>
</html>
