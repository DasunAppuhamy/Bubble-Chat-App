<?php

if(isset($_POST['submit'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $image = $_FILES["image"]["name"];


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignUp($first_name, $last_name, $email, $password, $confirm_password, $image) !== false){
        header("location: ../index.php?error=emptyinput");
        exit();
    }
    if(invalidName($first_name, $last_name) !== false){
        header("location: ../index.php?error=invalidname");
        exit();
    }
    if(invalidEmail($email) !== false){
        header("location: ../index.php?error=invalidemail");
        exit();
    }
    if(passwordSize($password) !== false){
        header("location: ../index.php?error=passwordmustbeatleast8characters");
        exit();
    }
    if(passwordMatch($password, $confirm_password) !== false){
        header("location: ../index.php?error=passwordsdon'tmatch");
        exit();
    }
    
    if(emailExists($conn, $email) !== false){
        header("location: ../index.php?error=emailexists");
        exit();
    }
    if(imageReady($image) !== false){
        header("location: ../index.php?error=wrongimageinput");
        exit();
    }
    createUser($conn, $first_name, $last_name, $email, $password, $image, $status);
    echo "success";
}else{
    header("location: ../index.php");
}