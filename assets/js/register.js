document.getElementById('password').addEventListener('input', function () {
    const password = this.value;
    const progressBar = document.getElementById('progress-bar');
    const strengthIndicator = document.getElementById('password-strength');

    // Critérios para força da senha
    const hasLowerCase = /[a-z]/.test(password); // Letras minúsculas
    const hasUpperCase = /[A-Z]/.test(password); // Letras maiúsculas
    const hasNumbers = /\d/.test(password);      // Números
    const hasSpecialChar = /[\W_]/.test(password); // Caracteres especiais
    const isLongEnough = password.length >= 8;   // Comprimento mínimo de 8 caracteres

    let strength = 0;

    if (isLongEnough) strength++;
    if (hasLowerCase) strength++;
    if (hasUpperCase) strength++;
    if (hasNumbers) strength++;
    if (hasSpecialChar) strength++;

    // Atualizar a barra de progresso com base na força
    if (strength === 0) {
        progressBar.style.width = '0%';
        progressBar.style.backgroundColor = 'red';
        strengthIndicator.innerHTML = '';
    } else if (strength <= 2) {
        progressBar.style.width = '33%';
        progressBar.style.backgroundColor = 'red';
        strengthIndicator.innerHTML = '<span style="color: red;">Fraca</span>';
    } else if (strength === 3 || strength === 4) {
        progressBar.style.width = '66%';
        progressBar.style.backgroundColor = 'orange';
        strengthIndicator.innerHTML = '<span style="color: orange;">Média</span>';
    } else if (strength === 5) {
        progressBar.style.width = '100%';
        progressBar.style.backgroundColor = 'green';
        strengthIndicator.innerHTML = '<span style="color: green;">Forte</span>';
    }
});
