const usernameInput = document.getElementById('username');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const confirmPasswordInput = document.getElementById('confirm-password');
const signUpButton = document.getElementById('loginBtn');

signUpButton.addEventListener("click", (event) => {
    event.preventDefault();
    console.log("Clicked");
});