document.addEventListener('DOMContentLoaded', () => {
    // Mapeamento dos campos do formulário e da seção de preview
    const fields = [
        { form: 'name', preview: 'preview-name' },
        { form: 'email', preview: 'preview-email' },
        { form: 'phone', preview: 'preview-phone' },
        { form: 'address', preview: 'preview-address' },
        { form: 'objective', preview: 'preview-objective' },
        { form: 'education', preview: 'preview-education' },
        { form: 'experience', preview: 'preview-experience' },
        { form: 'skills', preview: 'preview-skills' },
    ];

    // Atualizar preview em tempo real
    fields.forEach(({ form, preview }) => {
        const formField = document.getElementById(form);
        const previewField = document.getElementById(preview);

        formField.addEventListener('input', () => {
            previewField.textContent = formField.value || `Seu ${form} aqui`;
        });
    });
});
