<?php include_once"header.php";?>
<body>
    <div class="wrapper wrap">
        <section class="form-signup">
            <header class="fw-bold mt-2 head">BUBBLE :)</header>
            <p class="mb-4 moto">-create your own bubble.</p>
            <form action="includes/signup.inc.php" method="POST" enctype="multipart/form-data">
                <div class="error-txt fw-light">
                    <?php   
                        require_once "includes/signup_errors.inc.php";
                    ?>
                </div>
                <div class="name-details ">
                    <div class="field mb-3 mt-3">
                        <label for="">First-name</label>
                        <input class="inside-input form-control" type="text" placeholder="First-name" name="first_name" maxlength="10" required>
                    </div>
                    <div class="field mb-3 mt-3">
                        <label for="">Last-name</label>
                        <input class="inside-input form-control" type="text" placeholder="Last-name" name="last_name" maxlength="10" required>
                    </div>
                </div>
                <div class="field mb-3">
                    <label for="">Email ID</label>
                    <input class="inside-input form-control" type="email" placeholder="name@example.com" name="email" required>
                </div>
                <div class="field mb-3">
                    <label for="">Password</label>
                    <input class="inside-input form-control" type="password" id="password"placeholder="Password" name="password" maxlength="15" required>
                    <i class="bi bi-eye-fill eye"></i>
                </div>
                <div class="field mb-3">
                    <label for="">Confirm Password</label>
                    <input class="inside-input form-control" type="password" id="confirm-password"placeholder="Confirm Password" name="confirm_password" maxlength="15" required>
                    <i class="bi bi-eye-fill eye"></i>
                </div>
                <div class="field mb-3">
                    <label for=""> Select image</label>
                    <input class="form-control" type="file" name="image" required>
                </div>
                <div class="d-grid gap-2 col-8 mx-auto">
                    <button class="btn btn-outline-dark submit-btn" type="submit" name="submit" >Start chatting</button>
                </div>
                <div class="link mt-2"> Already Signed Up.<a href="login.php"> Login now</a></div>
            </form>
        </section>
    </div>
    
</body>
<script src="javascript/app.js"></script>
<script src="javascript/password-show-hide-signup.js"></script>
<script src="javascript/signup.js"></script>
</html>