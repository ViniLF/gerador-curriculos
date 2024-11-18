<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <header>
        <h1>Login</h1>
    </header>
    <main>
        <form action="src/controllers/login_user.php" method="POST">
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Senha:</label>
            <input type="password" name="password" id="password" required>

            <button type="submit">Entrar</button>
        </form>
        <p>Não tem uma conta? <a href="register.php">Registre-se</a>.</p>
    </main>

    <?php
    if (isset($_GET['error'])) {
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {";

        if ($_GET['error'] === 'empty') {
            echo "Swal.fire('Erro!', 'Todos os campos são obrigatórios.', 'error');";
        } elseif ($_GET['error'] === 'invalid') {
            echo "Swal.fire('Erro!', 'E-mail ou senha inválidos. Tente novamente.', 'error');";
        }

        echo "});
        </script>";
    }

    if (isset($_GET['success']) && $_GET['success'] === 'register') {
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire('Sucesso!', 'Registro efetuado com sucesso! Faça login para continuar.', 'success');
            });
        </script>";
    }
    ?>
</body>
</html>
