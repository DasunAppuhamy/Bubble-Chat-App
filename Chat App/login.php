<?php include_once"header.php";?>
<body>
    <div class="wrapper wrap">
        <section class="form-login">
            <header class="fw-bold mt-2 head">BUBBLE :)</header>
            <p class="mb-4 moto">-create your own bubble.</p>
            <form action="includes/login.inc.php" method="POST">
                <div class="error-txt fw-light">
                <?php   
                    require_once "includes/login_errors.inc.php";
                ?>
                </div>
                <div class="field mb-3 mt-4">
                    <label for="">Enter your email</label>
                    <input class="inside-input form-control" type="email" name="email" placeholder="name@example.com" required>
                </div>
                <div class="field mb-4">
                    <label for="">Enter your password</label>
                    <input class="inside-input form-control" type="password" name="password"id="password"placeholder="Password" maxlength="15" required>
                    <i id="eye" class="bi bi-eye-fill eye"></i>
                </div>
                <div class="d-grid gap-2 col-8 mx-auto">
                    <button class="btn btn-outline-dark submit-btn " type="submit" name="submit">Start Chatting</button>
                </div>
                <div class="link mt-2"> Not Signed Up Already.<a href="index.php"> Sign-up now</a></div>
            </form>
        </section>
    </div>
    
</body>
<script src="javascript/password-show-hide-login.js"></script>
</html>