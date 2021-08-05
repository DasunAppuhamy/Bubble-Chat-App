const passwordShow = document.getElementById("password");
var conpasswordShow = document.getElementById("confirm-password");
const toggle = document.getElementById("eye");

toggle.onclick = () =>{
    if (passwordShow.type == "password"){
        passwordShow.type = "text"
        toggle.style.color = "#000000"
    }else{
        passwordShow.type = "password"
        toggle.style.color = "#ccc"
    }
}
