<?php
    session_start();
    include_once 'dbh.inc.php';
    $outgoing_id =$_SESSION["user_id"];
    $searchTerm = mysqli_real_escape_string($conn, $_POST["searchTerm"]);
    $output = "";
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT user_id = $outgoing_id AND (first_name LIKE '%{$searchTerm}%' OR last_name LIKE '%{$searchTerm}%')");
    if(mysqli_num_rows($sql) > 0){
        while($row = mysqli_fetch_assoc($sql)){
            $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row["user_id"]} OR outgoing_msg_id = {$row["user_id"]}) AND
                    (incoming_msg_id = {$outgoing_id} OR outgoing_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
            $query2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($query2);
            if(mysqli_num_rows($query2)){
                $result = $row2["msg"];
            }else{
                $result = "No messages.";
            }

            //trimming msg if words are longer than 28 characters.
            if(strlen($result) > 28){
                $msg = substr($result, 0, 28)."...";
            }else{
                $msg = $result;
            }

            // checking if the user is online
            if($row['status'] === "Offline now"){
                $offline = "offline";
            }else{
                $offline = "";
            }


            $output.= '<a href="chat.php?chat_id='.$row["user_id"].'">
                        <div class="content">
                        <img src="images/'.$row["image"].'" alt="">
                        <div class="details">
                            <span>'.$row["first_name"]." ". $row["last_name"].'</span>
                            <p>'. $msg .'</p>    
                        </div>
                        </div>
                        <div class="status-dot '. $offline .'"><i class="bi bi-circle-fill "></i></div>
                        </a>';
        }
    }else{
        $output .= "<h6>no users found....</h6>";
    }
    echo $output;
