const CONFIG = {
    TIMING: {
        POPUP_DURATION: 3000
    },
    VALIDATION: {
        NAME_REGEX: /^[A-Za-zÀ-ÖØ-öø-ÿ\s]{3,}$/,
        EMAIL_REGEX: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
        PHONE_REGEX: /^\(\d{2}\)\s\d{4,5}-\d{4}$/,
        ADDRESS_MIN_LENGTH: 5,
        CITY_MIN_LENGTH: 2
    },
    STORAGE: {
        THEME_KEY: 'preferred-theme'
    },
    THEMES: {
        LIGHT: 'light',
        DARK: 'dark'
    },
    ICONS: {
        LIGHT: '🌙',
        DARK: '☀️'
    },
    MESSAGES: {
        SUCCESS: 'Cadastro realizado com sucesso!',
        ERROR: {
            NAME: 'Nome inválido (mínimo 3 letras)',
            EMAIL: 'Email inválido',
            PHONE: 'Telefone inválido - formato: (XX) XXXX-XXXX',
            ADDRESS: 'Endereço inválido (mínimo 5 caracteres)',
            CITY: 'Cidade inválida (mínimo 2 caracteres)'
        }
    }
};

const ELEMENTS = {
    form: document.getElementById('newsletterForm'),
    popup: document.getElementById('popup'),
    themeToggle: document.getElementById('theme-toggle'),
    html: document.documentElement
};

function showPopup(message, type) {
    const { popup } = ELEMENTS;
    popup.textContent = message;
    popup.className = `popup ${type}`;
    popup.style.display = 'block';
    
    setTimeout(() => {
        popup.style.display = 'none';
    }, CONFIG.TIMING.POPUP_DURATION);
}

function validateForm(formData) {
    const { VALIDATION, MESSAGES } = CONFIG;
    
    // Changed validation to match form field names
    if (!VALIDATION.NAME_REGEX.test(formData.nome)) {
        showPopup(MESSAGES.ERROR.NAME, 'error');
        return false;
    }
    
    if (!VALIDATION.EMAIL_REGEX.test(formData.email)) {
        showPopup(MESSAGES.ERROR.EMAIL, 'error');
        return false;
    }
    
    if (!VALIDATION.PHONE_REGEX.test(formData.telefone)) {
        showPopup(MESSAGES.ERROR.PHONE, 'error');
        return false;
    }
    
    if (formData.endereco.length < VALIDATION.ADDRESS_MIN_LENGTH) {
        showPopup(MESSAGES.ERROR.ADDRESS, 'error');
        return false;
    }
    
    if (formData.cidade.length < VALIDATION.CITY_MIN_LENGTH) {
        showPopup(MESSAGES.ERROR.CITY, 'error');
        return false;
    }
    
    return true;
}

function setTheme(theme) {
    const { html, themeToggle } = ELEMENTS;
    const { THEMES, ICONS } = CONFIG;
    
    html.setAttribute('data-theme', theme);
    localStorage.setItem(CONFIG.STORAGE.THEME_KEY, theme);
    themeToggle.textContent = theme === THEMES.DARK ? ICONS.DARK : ICONS.LIGHT;
}

ELEMENTS.form.addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const data = Object.fromEntries(formData);
    
    if (!validateForm(data)) return;

    try {
        const response = await fetch('salvar_newsletter.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: new URLSearchParams(formData)
        });

        const json = await response.json();
        showPopup(json.message, json.status);
        
        if (json.status === 'success') this.reset();
    } catch (error) {
        showPopup('Erro ao processar requisição', 'error');
    }
});

ELEMENTS.themeToggle.addEventListener('click', () => {
    const { THEMES } = CONFIG;
    const currentTheme = ELEMENTS.html.getAttribute('data-theme');
    const newTheme = currentTheme === THEMES.DARK ? THEMES.LIGHT : THEMES.DARK;
    setTheme(newTheme);
});

const savedTheme = localStorage.getItem(CONFIG.STORAGE.THEME_KEY) || CONFIG.THEMES.LIGHT;
setTheme(savedTheme);
