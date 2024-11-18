<?php
// Importar a função de alertas
require 'src/utils/alerts.php';

// Verificar erros ou sucesso e exibir alertas
if (isset($_GET['error'])) {
    if ($_GET['error'] === 'empty') {
        showAlert('error', 'Erro!', 'Todos os campos são obrigatórios.');
    } elseif ($_GET['error'] === 'exists') {
        showAlert('error', 'Erro!', 'O e-mail já está em uso. Tente outro.');
    } elseif ($_GET['error'] === 'failed') {
        showAlert('error', 'Erro!', 'Ocorreu um erro ao registrar o usuário. Tente novamente.');
    } elseif ($_GET['error'] === 'weak_password') {
        showAlert('error', 'Erro!', 'A senha informada é muito fraca. Escolha uma senha mais forte.');
    }
}

if (isset($_GET['success']) && $_GET['success'] === 'register') {
    showAlert('success', 'Sucesso!', 'Registro efetuado com sucesso! Faça login para continuar.');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="assets/css/register.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <header>
        <h1>Registro de Usuário</h1>
    </header>
    <main>
        <form action="src/controllers/register_user.php" method="POST">
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" required>

            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Senha:</label>
            <input type="password" name="password" id="password" required>
            <div class="progress-bar-container">
                <div class="progress-bar" id="progress-bar"></div>
            </div>
            <div id="password-strength" style="font-size: 14px; margin-top: 5px;"></div>

            <button type="submit">Registrar</button>
        </form>
        <p>Já tem uma conta? <a href="login.php">Faça login</a>.</p>
    </main>
    <script src="assets/js/register.js"></script>
</body>
</html>
