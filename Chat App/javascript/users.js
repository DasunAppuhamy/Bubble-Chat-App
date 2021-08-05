const usersList = document.querySelector(" .users .users-list");
const searchBar = document.querySelector(".users .search .search-bar input")


searchBar.onkeyup = ()=>{
    let searchTerm = searchBar.value;
    if(searchTerm != ""){
        searchBar.classList.add("active");
    }else{
        searchBar.classList.remove("active");
    }
    //ajax (Vanila js)
    let xhr = new XMLHttpRequest(); //creating xml object
    xhr.open("POST", "includes/searches.inc.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                usersList.innerHTML = data;
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);
}

setInterval(()=>{
    //ajax (Vanila js)
    let xhr = new XMLHttpRequest(); //creating xml object
    xhr.open("GET", "includes/users.inc.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(!searchBar.classList.contains("active")){
                    usersList.innerHTML = data;
                }
            }
        }
    }
    xhr.send();
},500);

