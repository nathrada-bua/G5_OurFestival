const usernameInput = document.getElementById('username');
const loginButton = document.getElementById('loginBtn');
const rememberMe = document.getElementById('checkbox');
const icon = document.getElementById("icon");
const icons = ["../resources/Project_Mascot_Default.png", "../resources/Project_Mascot_4.png", "../resources/Project_Mascot_5.png"];

function getCookie(name) {
  const cookies = document.cookie.split("; ");

  for (const cookie of cookies) {
    const [key, value] = cookie.split("=");
    if (key === name) return value;
  }
  return null;
}

if(document.cookie){
    var username = getCookie("username");
    if(username) {
        usernameInput.value = username;
    }
}

loginButton.addEventListener('click', () => {
    var username = usernameInput.value.trim();
    var remember = rememberMe.checked;

    if (remember) {
        document.cookie = "username=" + username;
    } else {
        document.cookie = "username=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/G5_OurFestival/php/";
    }
});

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