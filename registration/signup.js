const usernameInput = document.getElementById('username');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const confirmPasswordInput = document.getElementById('confirm-password');
const signUpButton = document.getElementById('loginBtn');
const usernameErrorText = document.getElementById('username-error');
const emailErrorText = document.getElementById('email-error');
const passwordErrorText = document.getElementById('password-error');
const confirmPasswordErrorText = document.getElementById('confirm-password-error');

signUpButton.addEventListener("click", (event) => {
    event.preventDefault();
    
    var username = usernameInput.value.trim();
    var email = emailInput.value.trim();
    var password = passwordInput.value.trim();
    var confirmPassword = confirmPasswordInput.value.trim();

    if(confirmPassword.length == 0) {
        confirmPasswordErrorText.classList.remove("hide");
        confirmPasswordInput.focus();
    } else {
        confirmPasswordErrorText.classList.add("hide");
    }

    if(password.length == 0) {
        passwordErrorText.classList.remove("hide");
        passwordInput.focus();
    } else {
        passwordErrorText.classList.add("hide");
    }

    if(email.length == 0) {
        emailErrorText.classList.remove("hide");
        emailInput.focus();
    } else {
        emailErrorText.classList.add("hide");
    }

    if(username.length == 0) {
        usernameErrorText.classList.remove("hide");
        usernameInput.focus();
    } else {
        usernameErrorText.classList.add("hide");
    }
});