<?php
require '../../vendor/autoload.php';
require '../db/connection.php';
use Dompdf\Dompdf;

session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../login.php");
    exit;
}

// Verificar se o ID foi passado
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID do currículo não foi fornecido.");
}

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];

// Buscar os dados do currículo no banco de dados
$sql = "SELECT * FROM curriculos WHERE id = ? AND user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $id, $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Currículo não encontrado ou você não tem permissão para acessá-lo.");
}

$row = $result->fetch_assoc();
$theme = $row['theme'];

// Estilos para os temas
$styles = [
    'default' => '
        body { font-family: Arial, sans-serif; margin: 20px; color: #333; }
        h1 { text-align: center; color: #0077cc; }
        .section h2 { border-bottom: 2px solid #0077cc; color: #0077cc; margin-top: 20px; }
        .section p { margin: 5px 0; line-height: 1.6; }
    ',
    'modern' => '
        body { font-family: "Helvetica", sans-serif; margin: 20px; background-color: #f5f5f5; color: #444; }
        h1 { text-align: center; font-weight: bold; color: #555; }
        .section h2 { color: #666; background-color: #e0e0e0; padding: 5px; border-radius: 5px; }
        .section p { margin: 5px 0; line-height: 1.6; }
    ',
    'minimalist' => '
        body { font-family: Georgia, serif; margin: 20px; color: #333; }
        h1 { text-align: left; font-size: 24px; color: #000; }
        .section h2 { font-size: 16px; text-transform: uppercase; border-bottom: 1px solid #ccc; color: #333; }
        .section p { margin: 5px 0; line-height: 1.8; }
    '
];

// Escolher o estilo baseado no tema
$style = isset($styles[$theme]) ? $styles[$theme] : $styles['default'];

// Gerar o HTML do currículo
$html = "
<!DOCTYPE html>
<html>
<head>
    <style>
        $style
        .section { margin-bottom: 20px; }
    </style>
</head>
<body>
    <h1>{$row['name']}</h1>
    <p><strong>E-mail:</strong> {$row['email']}</p>
    <p><strong>Telefone:</strong> {$row['phone']}</p>
    <p><strong>Endereço:</strong> {$row['address']}</p>
    
    <div class='section'>
        <h2>Objetivo Profissional</h2>
        <p>{$row['objective']}</p>
    </div>
    <div class='section'>
        <h2>Formação Acadêmica</h2>
        <p>{$row['education']}</p>
    </div>
    <div class='section'>
        <h2>Experiência Profissional</h2>
        <p>{$row['experience']}</p>
    </div>
    <div class='section'>
        <h2>Habilidades</h2>
        <p>{$row['skills']}</p>
    </div>
</body>
</html>
";

// Configurar o DOMPDF
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// Enviar o PDF para o navegador
$dompdf->stream("curriculo_{$row['name']}.pdf", ["Attachment" => true]);
?>
