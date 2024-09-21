window.onload = function() {
    const passwordField = document.getElementById('senha');
    const eyeIcon = document.getElementById('eye-icon');

    if (passwordField && eyeIcon) {
        passwordField.type = 'password';
        eyeIcon.src = 'view/icons/olhofechado.png';
        eyeIcon.alt = 'Mostrar Senha'; 
    }
};

function togglePassword() {
    const passwordField = document.getElementById('senha');
    const eyeIcon = document.getElementById('eye-icon');

    if (passwordField && eyeIcon) {
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            eyeIcon.src = 'view/icons/olhoaberto.png';
            eyeIcon.alt = 'Ocultar Senha'; 
        } else {
            passwordField.type = 'password';
            eyeIcon.src = 'view/icons/olhofechado.png';
            eyeIcon.alt = 'Mostrar Senha';
        }
    }
}
