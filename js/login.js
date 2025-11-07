const usernameInput = document.getElementById('username');
const passwordInput = document.getElementById('password');
const loginButton = document.getElementById('loginBtn');
const rememberMe = document.getElementById('checkbox');
const usernameErrorText = document.getElementById('username-error');
const passwordErrorText = document.getElementById('password-error');

function getCookie(name) {
  const cookies = document.cookie.split("; ");
  for (const cookie of cookies) {
    const [key, value] = cookie.split("=");
    if (key === name) return value;
  }
  return null;
}

if(document.cookie){
    console.log(document.cookie);
    var username = getCookie("username");
    if(username) {
        usernameInput.value = username;
    }
}

loginButton.addEventListener('click', (event) => {
    event.preventDefault();
    var username = usernameInput.value.trim();
    var password = passwordInput.value.trim();
    var remember = rememberMe.checked;

    if(password.length == 0) {
        passwordErrorText.classList.remove("hide");
        passwordInput.focus();
    } else {
        passwordErrorText.classList.add("hide");
    }

    if(username.length == 0) {
        usernameErrorText.classList.remove("hide");
        usernameInput.focus();
    } else {
        usernameErrorText.classList.add("hide");
    }

    if (remember) {
        document.cookie = "username=" + username;
    } else {
        document.cookie = "username=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/registration";
    }
});

