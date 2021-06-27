<html>

<head>
    <title>Login Form</title>
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

</head>

<body>
<div class="container">
    <div class="main">
        <p class="title-form">Sign in</p>
        <?php
            if(isset($_GET["error"]) && $_GET["error"]=="1020" )
            {
                echo '<div class="error">An error has occurred.</div>';
            }
            // soit email est faut soit passwor, ça va sortir cet erreur
            if(isset($_GET["field"]) && $_GET["field"]=="1010" )
            {
                echo '<div class="error">Email or password is not correct.</div>';
            }
        ?>
        <form class="form" action="check-login.php" method="post">
            <div class="social-container">
                <a href="#" class="social"><i class="fa fa-facebook"></i></a>
                <a href="#" class="social"><i class="fa fa-google"></i></a>
                <a href="#" class="social"><i class="fa fa-twitter"></i></a>
            </div>
            <input name="email" class="input_form" type="email"  placeholder="Email" required>
            <input name="password" class="input_form" type="password"  placeholder="Password" required>
            <button type="submit" class="submit">Sign in</button>
            <p class="forgot"><a href="forgot-pass.php">Forgot Password?</a></p>
            <p class="register"><a href="../signup/SignUp.php">Register here</a></p>

        </form>
    </div>
</div>
</body>

</html>
