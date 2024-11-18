# Gerador de Currículos

Um sistema completo para criação, listagem, edição e exclusão de currículos online, com funcionalidades de validação de senha, barra de progresso para força de senha e sistema de notificações interativo.

## Funcionalidades

- **Sistema de Login e Registro**
  - Registro de usuários com validação de força de senha.
  - Login seguro com validação de credenciais e mensagens de erro.

- **Gerenciamento de Currículos**
  - Criação, listagem, edição e exclusão de currículos.
  - Visualização de currículos em formato PDF.
  - Sistema de notificações via SweetAlert2 para feedback ao usuário.

- **Validação de Senha**
  - Validação em tempo real da força da senha com uma barra de progresso visual.
  - Critérios avaliados: comprimento, letras maiúsculas/minúsculas, números e caracteres especiais.

## Tecnologias Utilizadas

### Frontend
- **HTML**
- **CSS**
- **JavaScript**
  - SweetAlert2 para notificações.
  - Barra de progresso interativa para a força da senha.

### Backend
- **PHP**
  - Processamento de dados e validações no servidor.
- **MySQL**
  - Banco de dados para armazenamento de informações.

## Estrutura do Projeto

```plaintext
.
├── assets/
│   ├── css/
│   │   ├── login.css
│   │   ├── preview.css
│   │   ├── register.css
│   │   └── style.css
│   ├── js/
│   │   ├── preview.js
│   │   └── register.js
├── src/
│   ├── controllers/
│   │   ├── login_user.php
│   │   ├── register_user.php
│   │   ├── gerar_pdf.php
│   │   ├── salvar_curriculo.php
│   │   ├── atualizar_curriculo.php
│   │   └── deletar_curriculo.php
│   ├── db/
│   │   └── connection.php
│   ├── utils/
│   │   ├── alerts.php
│   │   └── password_strength.php
├── composer.json
├── composer.lock
├── criar_curriculo.php
├── editar_curriculo.php
├── listar_curriculos.php
├── generate_pdf.php
├── login.php
├── logout.php
├── register.php
└── index.php
