const usernameInput = document.getElementById('username');
const passwordInput = document.getElementById('password');
const loginButton = document.getElementById('loginBtn');
const rememberMe = document.getElementById('checkbox');
const usernameErrorText = document.getElementById('username-error');
const passwordErrorText = document.getElementById('password-error');
const icon = document.getElementById("icon");
const icons = ["../resources/Project_Mascot_Default.png", "../resources/Project_Mascot_4.png", "../resources/Project_Mascot_5.png"];

// Mascot animation
let i = 0;
setInterval(() => {
    i = (i+1) % icons.length;
    icon.src = icons[i];
}, 2000);
