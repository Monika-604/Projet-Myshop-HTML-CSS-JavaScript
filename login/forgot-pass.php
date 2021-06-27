
<html>

<head>
    <title>Login Form</title>
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

</head>

<body>
<div class="container">
    <div class="main">
        <h5 class="forgot-pass text-center mt-3">You can reset your password here.</h5>


        <?php
        if(isset($_GET["error"]) && $_GET["error"]=="2010" )
        {
            echo '<div class="error">The Email field can not be empty!</div>';
        }
        if(isset($_GET["error"]) && $_GET["error"]=="2020" )
        {
            echo '<div class="error">Password and confirmation are not equal!</div>';
        }
        if(isset($_GET["error"]) && $_GET["error"]=="2030" )
        {
            echo '<div class="error">The Email dose not exist!</div>';
        }
        if(isset($_GET["error"]) && $_GET["error"]=="2040" )
        {
            echo '<div class="error">an error has occurred!</div>';
        }

        if(isset($_GET["successful"]) && $_GET["successful"]=="2000" )
        {
            echo '<div class="successful">Password changed successfully</div>';
        }
        ?>
        <!-- prendre email et nouvel pass -->
        <form class="form" action="check-forgot-password.php" method="post" >

            <input name="email" class="input_form" type="email"  placeholder="email" >
            <input name="password" class="input_form" type="password"  placeholder="password" >
            <input name="re-password" class="input_form" type="password"  placeholder="confirmation password" >
            <button type="submit" class="input_form btn-reset-pass" name="submit">Reset Password</button>
            <a href="login.php" class="back-login">Back to login</a>

        </form>
    </div>
</div>
</body>

</html>
