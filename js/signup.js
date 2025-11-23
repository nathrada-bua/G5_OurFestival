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