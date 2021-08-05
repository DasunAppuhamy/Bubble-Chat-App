/*const form = document.querySelector(".form-signup form");
const startChatBtn = form.querySelector(".submit-btn");
const error_text = form.querySelector(".error-txt");

form.onsubmit = (e)=>{
    e.preventDefault(); //preventing from form submitting
}

startChatBtn.onclick = ()=>{
    //ajax
    let xhr = new XMLHttpRequest(); //creating xml object
    xhr.open("POST", "includes/signup.inc.php", true);
    xhr.onload = () =>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == "success"){

                }else{
                    error_text.textContent = data;
                    error_text.style.display = "block";
                }
            }
        }
    }
    let formData = new FormData(form); 
    xhr.send(formData);
}*/