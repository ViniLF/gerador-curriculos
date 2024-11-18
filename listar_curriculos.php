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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Faculty+Glyphic&family=Moderustic:wght@300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/listar_curriculos.css">
</head>
<body>
    <header>
        <h1>Meus Currículos</h1>
        <nav>
            <a href="index.php">Início</a>
            <a href="criar_curriculo.php">Criar Currículo</a>
            <a href="logout.php">Sair</a>
            <!-- Botão para alternar tema -->
            <div class="theme-toggle-container">
                <div class="theme-toggle" id="theme-toggle">
                    <span class="toggle-thumb">
                        <i class="bi bi-sun theme-icon" id="theme-icon"></i>
                    </span>
                </div>
            </div>

            <div class="menu-dropdown">
                <button class="menu-button" id="menu-button">☰</button>
                <ul class="dropdown-content" id="dropdown-content">
                    <li><a href="configuracoes.php">Configurações</a></li>
                    <li><a href="perfil.php">Perfil</a></li>
                    <li><a href="ajuda.php">Ajuda e Suporte</a></li>
                </ul>
            </div>
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
    <script src="assets/js/index.js"></script>
    <script src="assets/js/theme-toggle.js"></script>
</body>
</html>
