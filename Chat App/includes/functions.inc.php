<?php

$time = time();

function emptyInputSignUp($first_name, $last_name, $email, $password, $confirm_password, $image){
    $result;
    if (empty($first_name)||empty($last_name)||empty($email)||empty($password)||empty($first_name)||empty($image)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
function invalidName($first_name, $last_name){
    $result;
    if (!preg_match("/^[a-zA-Z]*$/", $first_name) || !preg_match("/^[a-zA-Z]*$/", $last_name)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
function invalidEmail($email){
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
function passwordSize($password){
    $result;
    if(strlen($password) < 8){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
function passwordMatch($password, $confirm_password){
    $result;
    if ($confirm_password !== $password){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
function emailExists($conn, $email){
    /* $sql = "SELECT email FROM users WHERE email = '{$email}';";
    if(mysqli_num_rows($sql) > 0){
        echo "$email - This email already exists"
    } */
    // WE CANNOT DO THIS BEACUSE WE WOULD BE OPEN TO SQL INJECTION AND STUFF. SO INSTEAD WE DO THIS,

    $sql = "SELECT * FROM users WHERE email= ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../index.php?error=somethingwentwrong");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}
function imageReady($image){
    $image_name = $image;
    $image_tmp_name = $_FILES["image"]["tmp_name"];

    //getting the extension and checking if valid
    $img_ext = end(explode(".", $image_name));
    $extensions = ["png", "jpg", "jpeg"];
    if(in_array($img_ext, $extensions) === false){
        return true;
    }else{
        global $time;
        $new_image_name = $time.$image_name;
        move_uploaded_file($image_tmp_name, "../images/".$new_image_name);
        return false;
    }
    
}
function createUser($conn, $first_name, $last_name, $email, $password, $image, $status){
    $sql = "INSERT INTO users (first_name, last_name, email, password, image, status) VALUES (?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../index.php?error=somethingwentwrong");
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $status = "Active now";
    global $time;
    $image_name = $image;
    $new_image_name = $time.$image_name;

    mysqli_stmt_bind_param($stmt, "ssssss", $first_name, $last_name, $email, $hashed_password, $new_image_name, $status);
    mysqli_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../login.php?error=none");
    exit();
}



function emptyInputLogin($email, $password){
    $result;
    if (empty($email)||empty($password)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
function loginUser($conn, $email, $password){
    $email_exists = emailExists($conn, $email);

    if($email_exists === false){
        header("location: ../login.php?error=wrongemail");
        exit();
    }
        
    $hashed_password = $email_exists["password"];
    $check_password = password_verify($password, $hashed_password);

    if($check_password === false){
        header("location: ../login.php?error=incorrectpassword");
        exit();
    }
    else if ($check_password === true){
        session_start();
        $_SESSION["user_id"] = $email_exists["user_id"];
        $_SESSION["email"] = $email_exists["email"];
        header("location: ../users.php");
        exit();
    }
    
}
