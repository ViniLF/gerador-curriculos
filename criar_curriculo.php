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
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <h1>Criar Currículo</h1>
        <nav>
            <a href="index.php">Início</a>
            <a href="listar_curriculos.php">Meus Currículos</a>
            <a href="logout.php">Sair</a>
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
</body>
</html>
