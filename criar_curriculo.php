<?php
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Currículo</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Faculty+Glyphic&family=Moderustic:wght@300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/criar_curriculo.css">
</head>
<body>
    <header>
        <h1>Criar Currículo</h1>
        <nav>
            <a href="index.php">Início</a>
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
        <form action="src/controllers/salvar_curriculo.php" method="POST">
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" required>

            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" required>

            <label for="phone">Telefone:</label>
            <input type="text" name="phone" id="phone" required>

            <label for="address">Endereço:</label>
            <input type="text" name="address" id="address" required>

            <label for="objective">Objetivo Profissional:</label>
            <textarea name="objective" id="objective" rows="4" required></textarea>

            <label for="education">Formação Acadêmica:</label>
            <textarea name="education" id="education" rows="4" required></textarea>

            <label for="experience">Experiência Profissional:</label>
            <textarea name="experience" id="experience" rows="4" required></textarea>

            <label for="skills">Habilidades:</label>
            <textarea name="skills" id="skills" rows="4" required></textarea>

            <label for="theme">Tema:</label>
            <select name="theme" id="theme">
                <option value="default" selected>Clássico</option>
                <option value="modern">Moderno</option>
                <option value="minimalist">Minimalista</option>
            </select>

            <button type="submit">Salvar Currículo</button>
        </form>
    </main>
    <script src="assets/js/index.js"></script>
    <script src="assets/js/theme-toggle.js"></script>
    <script src="assets/js/preview.js"></script>
</body>
</html>
