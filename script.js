const POPUP_DURATION = 3000;
const EMAIL_REGEX = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
const MESSAGES = {
    success: 'Email cadastrado com sucesso!',
    error: 'Por favor, insira um email válido'
};

const newsletterForm = document.getElementById('newsletterForm');
const popup = document.getElementById('popup');

function showPopup(message, type) {
    popup.textContent = message;
    popup.className = `popup ${type}`;
    popup.style.display = 'block';
    
    setTimeout(() => {
        popup.style.display = 'none';
    }, POPUP_DURATION);
}

function validateEmail(email) {
    return EMAIL_REGEX.test(email);
}

newsletterForm.addEventListener('submit', function(e) {
    e.preventDefault();
    const email = document.getElementById('email').value;
    
    if (validateEmail(email)) {
        showPopup(MESSAGES.success, 'success');
        this.reset();
    } else {
        showPopup(MESSAGES.error, 'error');
    }
});
