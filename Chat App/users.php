<?php
    session_start();
    if(!isset($_SESSION["user_id"])){
        header("location: login.php");
    }
?>


<?php include_once"header.php";?>
<body>
    <div class="wrapper wrap">
        <section class="users">
            <header>
                <?php
                    include_once "includes/dbh.inc.php";
                    $sql = mysqli_query($conn, "SELECT * FROM users WHERE user_id = {$_SESSION["user_id"]}");
                    if(mysqli_num_rows($sql) > 0){
                        $row = mysqli_fetch_assoc($sql);
                    }
                ?>
                <div class="content">
                    <img src="images/<?php echo $row["image"]; ?>" alt="">
                    <div class="details">
                        <span><?php echo $row["first_name"]." ". $row["last_name"]; ?></span>
                        <div class="status">
                            <p><?php echo $row["status"]; ?></p>
                            <div class="status-dot"><i class="bi bi-circle-fill circle"></i></div>
                        </div>
                    </div>
                </div>
                <a href="index.php" class="logout">Log out</a>
            </header>  
            <div class="search">
                <span class="text">Who do you like to chat with?</span>
                <div class="search-bar">
                    <input class="form-control" type="search" placeholder="Enter a name to search..." maxlength="20">
                    <button class="btn btn-outline-dark btn-sm"><i class="bi bi-search"></i></button>
                </div>
            </div>
            <div class="users-list">
                
            </div>
        </section>
    </div>
    
</body>
<script src="javascript/users.js"></script>
</html>