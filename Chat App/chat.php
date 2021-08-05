<?php
    session_start();
    if(!isset($_SESSION["user_id"])){
        header("location: login.php");
    }
?>


<?php include_once"header.php";?>
<body>
    <div class="wrapper wrap">
        <section class="chat-area">
            <header>
                <?php
                    include_once "includes/dbh.inc.php";
                    $user_id = mysqli_real_escape_string($conn,$_GET['chat_id']);
                    $sql = mysqli_query($conn, "SELECT * FROM users WHERE user_id = {$user_id}");
                    if(mysqli_num_rows($sql) > 0){
                        $row = mysqli_fetch_assoc($sql);
                    }
                ?>
                <a class="back-arrow" href="users.php"><i class="bi bi-arrow-left-circle-fill"></i></a>
                <img src="images/<?php echo $row["image"]; ?>" alt="">
                <div class="details">
                    <span><?php echo $row["first_name"]." ". $row["last_name"]; ?></span>
                    <p><?php echo $row["status"]; ?></p>   
                </div>
            </header>
            <div class="chat-box">
            </div> 
            <form action="#" class="typing-area" autocomplete = "off">

                <input type="text" name="outgoing_id" value="<?php echo $_SESSION["user_id"]; ?>" hidden>
                <input type="text" name="incoming_id" value="<?php echo $user_id; ?>" hidden>

                <input type="text" name="message" class="input-field" placeholder="Type something...">
                <button><i class="bi bi-chevron-right"></i></button>
            </form> 
        </section>
    </div>
    
</body>
<script src="javascript/chat.js"></script>
</html>