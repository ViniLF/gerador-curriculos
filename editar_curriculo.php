<?php
session_start();
require 'src/db/connection.php';

// Verificar se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID do currículo não fornecido.");
}

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];

// Buscar dados do currículo
$sql = "SELECT * FROM curriculos WHERE id = ? AND user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $id, $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Currículo não encontrado ou você não tem permissão para editá-lo.");
}

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Currículo</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <h1>Editar Currículo</h1>
        <nav>
            <a href="listar_curriculos.php">Meus Currículos</a>
        </nav>
    </header>
    <main>
        <form action="src/controllers/atualizar_curriculo.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>

            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>

            <label for="phone">Telefone:</label>
            <input type="text" name="phone" id="phone" value="<?php echo htmlspecialchars($row['phone']); ?>" required>

            <label for="address">Endereço:</label>
            <input type="text" name="address" id="address" value="<?php echo htmlspecialchars($row['address']); ?>" required>

            <label for="objective">Objetivo Profissional:</label>
            <textarea name="objective" id="objective" rows="4" required><?php echo htmlspecialchars($row['objective']); ?></textarea>

            <label for="education">Formação Acadêmica:</label>
            <textarea name="education" id="education" rows="4" required><?php echo htmlspecialchars($row['education']); ?></textarea>

            <label for="experience">Experiência Profissional:</label>
            <textarea name="experience" id="experience" rows="4" required><?php echo htmlspecialchars($row['experience']); ?></textarea>

            <label for="skills">Habilidades:</label>
            <textarea name="skills" id="skills" rows="4" required><?php echo htmlspecialchars($row['skills']); ?></textarea>

            <label for="theme">Tema:</label>
            <select name="theme" id="theme">
                <option value="default" <?php echo $row['theme'] === 'default' ? 'selected' : ''; ?>>Clássico</option>
                <option value="modern" <?php echo $row['theme'] === 'modern' ? 'selected' : ''; ?>>Moderno</option>
                <option value="minimalist" <?php echo $row['theme'] === 'minimalist' ? 'selected' : ''; ?>>Minimalista</option>
            </select>

            <button type="submit">Salvar Alterações</button>
        </form>
    </main>
</body>
</html>
