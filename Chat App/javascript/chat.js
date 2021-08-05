const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e)=>{
    e.preventDefault();
}


sendBtn.onclick = ()=>{
    //ajax
    let xhr = new XMLHttpRequest;
    xhr.open("POST", "includes/chat.inc.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === xhr.DONE){
            if(xhr.status === 200){
                inputField.value = "";
                scrollToBottom();
            }
        }
    };
    // sending form data through ajax to php
    let formData = new FormData(form); //creating a new form data object
    xhr.send(formData); //sending the form data to php
}

chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}
chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}


setInterval(()=>{
    //ajax (Vanila js)
    let xhr = new XMLHttpRequest(); //creating xml object
    xhr.open("POST", "includes/get-chat.inc.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                chatBox.innerHTML = data;
                if(!chatBox.classList.contains("active")){
                    scrollToBottom();
                }
            }
        }
    }
    let formData = new FormData(form); //creating a new form data object
    xhr.send(formData); //sending the form data to php
}, 500);

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
}

