const usernameInput = document.getElementById('username');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const confirmPasswordInput = document.getElementById('confirm-password');
const signUpButton = document.getElementById('loginBtn');
const usernameErrorText = document.getElementById('username-error');
const emailErrorText = document.getElementById('email-error');
const passwordErrorText = document.getElementById('password-error');
const confirmPasswordErrorText = document.getElementById('confirm-password-error');
const icon = document.getElementById("icon");
const icons = ["../resources/Project_Mascot_Default.png", "../resources/Project_Mascot_4.png", "../resources/Project_Mascot_5.png"];

// Mascot animation
let i = 0;
let id = 0;

id = setInterval(() => {
    if(icon) {
        icon.src = icons[i];
        i = (i+1) % icons.length;
    } else {
        clearInterval(id);
    }
}, 2000);