var password = document.getElementById("password"),
 confirm_password = document.getElementById("confirm-password")

function validatePassword(){
    if(password.value != confirm_password.value){
        confirm_password.setCustomValidity("Passwords don't match! Check again.")
    }
    else{
        confirm_password.setCustomValidity("")
    }
}
password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;

