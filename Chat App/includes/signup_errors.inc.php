<?php
if(isset($_GET["error"])){
    if($_GET["error"] == "emptyinput"){
        echo "Please fill in all the inputs."; 
    }
    if($_GET["error"] == "invalidname"){
        echo "Invalid first or last name. Only include letters."; 
    }
    if($_GET["error"] == "invalidemail"){
        echo "Invalid email address."; 
    }
    if($_GET["error"] == "passwordmustbeatleast8characters"){
        echo "Please use a stronger password.(at least 8 characters)"; 
    }
    if($_GET["error"] == "passwordsdon'tmatch"){
        echo "Passwords do not match. Check again."; 
    }
    if($_GET["error"] == "emailexists"){
        echo "This email already exists"; 
    }
    if($_GET["error"] == "wrongimageinput"){
        echo "Please select jpg, jpeg, png files only."; 
    }
}