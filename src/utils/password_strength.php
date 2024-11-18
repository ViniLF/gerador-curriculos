<?php
function passwordStrength($password) {
    $strength = 0;

    if (strlen($password) >= 6) $strength++; // Comprimento mínimo
    if (preg_match('/[a-z]/', $password)) $strength++; // Letras minúsculas
    if (preg_match('/[A-Z]/', $password)) $strength++; // Letras maiúsculas
    if (preg_match('/\d/', $password)) $strength++; // Números
    if (preg_match('/[\W_]/', $password)) $strength++; // Caracteres especiais

    return $strength;
}
?>
