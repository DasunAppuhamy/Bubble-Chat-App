const passwordShow = document.getElementById("password");
var conpasswordShow = document.getElementById("confirm-password");
const toggle = document.getElementsByClassName("eye");

toggle[0].onclick = () =>{
    if (passwordShow.type == "password"){
        passwordShow.type = "text"
        toggle[0].style.color = "#000000";
    }else{
        passwordShow.type = "password"
        toggle[0].style.color = "#ccc"
    }
}

toggle[1].onclick= () =>{
    if (conpasswordShow.type == "password"){
        conpasswordShow.type = "text"
        toggle[1].style.color = "#000000"
    }else{
        conpasswordShow.type = "password"
        toggle[1].style.color = "#ccc"
    }
}