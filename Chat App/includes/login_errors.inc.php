<?php
if(isset($_GET["error"])){
    if($_GET["error"] == "wrongemail"){
        echo "This email isn't logged in."; 
    }
    if($_GET["error"] == "incorrectpassword"){
        echo "Incorrect password. Try again."; 
    }
}