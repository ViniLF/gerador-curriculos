<?php
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Exibir notificação de login bem-sucedido
if (isset($_GET['success']) && $_GET['success'] === 'login') {
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire('Bem-vindo!', 'Login efetuado com sucesso.', 'success');
        });
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Faculty+Glyphic&family=Moderustic:wght@300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <h1>Bem-vindo, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h1>
        <nav>
            <a href="criar_curriculo.php">Criar Currículo</a>
            <a href="listar_curriculos.php">Meus Currículos</a>
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
        <section class="welcome">
            <h2>Bem-vindo, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h2>
            <p>Estamos felizes em tê-lo aqui. Aproveite para criar novos currículos ou gerenciar os já existentes.</p>
        </section>

        <section class="quick-actions">
            <h3>Ações Rápidas</h3>
            <div class="action-buttons">
                <a href="criar_curriculo.php" class="button">Criar Novo Currículo</a>
                <a href="listar_curriculos.php" class="button">Gerenciar Currículos</a>
            </div>
        </section>

        <section class="tips">
            <h3>Dicas para Melhorar Seu Currículo</h3>
            <ul>
                <li>Use palavras-chave relevantes para sua área de atuação.</li>
                <li>Mantenha o design limpo e profissional.</li>
                <li>Adapte o currículo para cada vaga que está concorrendo.</li>
            </ul>
        </section>

        <section class="highlights">
            <h3>Novidades!</h3>
            <p>Experimente o novo tema "Minimalista" para criar currículos mais modernos e profissionais.</p>
            <a href="criar_curriculo.php" class="button">Experimentar Agora</a>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Gerador de Currículos. Todos os direitos reservados.</p>
    </footer>

    <!-- Importar o script externo -->
    <script src="assets/js/index.js"></script>
    <script src="assets/js/theme-toggle.js"></script>
</body>
</html>
