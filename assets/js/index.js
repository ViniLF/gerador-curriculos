if (window.location.search.includes('success=login')) {
    const newURL = window.location.origin + window.location.pathname;
    window.history.replaceState({}, document.title, newURL);
}

document.addEventListener('DOMContentLoaded', () => {
    const menuButton = document.getElementById('menu-button');
    const dropdownContent = document.getElementById('dropdown-content');

    // Alternar visibilidade do menu ao clicar no botão
    menuButton.addEventListener('click', (event) => {
        event.stopPropagation(); // Evita que o clique no botão feche o menu
        dropdownContent.classList.toggle('active'); // Alterna a classe 'active'
    });

    // Fechar o menu ao clicar fora dele
    document.addEventListener('click', () => {
        dropdownContent.classList.remove('active'); // Remove a classe 'active'
    });
});

