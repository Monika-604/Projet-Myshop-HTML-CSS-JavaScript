<?php

if (isset($_COOKIE["user"])){

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>DecoGina</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

</head>
<body>
<header>
    <section class="container">
        <div class="row">
            <div class="left col-xl-8 col-lg-8 col-md-6 col-6">
                <img src="assets/images/Logo.png" class="float-left" width="71" height="71" title="logo image"
                     alt="logo image">
                <nav class="top-menu float-left">
                    <ul>
                        <li><a href="#">HOME</a></li>
                        <li><a href="#">SHOP</a></li>
                        <li><a href="#">MAGAZINE</a></li>
                    </ul>
                </nav>
            </div>
            <div class="right ol-xl-4 col-lg-4 col-md-6 col-6 text-right">
                <a href="#" class="buy d-inline-block mr-3" title="Go To Shopping Cart"></a>
                <span class="fa fa-navicon"></span>

                <div class="dropdown">
                    <button type="button" class="btn-user btn dropdown-toggle" data-toggle="dropdown">

                        <?php echo $_COOKIE["user"]; ?> <!-- montrer username de user par cet statement -->
                    </button> <div class="dropdown-menu">
                        <a href="profile.php">Profile</a>
                        <a href="login/signout.php">Sign out</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <nav class="top-menu mobile-menu">
            <ul>
                <li><a href="#">HOME</a></li>
                <li><a href="#">SHOP</a></li>
                <li><a href="#">MAGAZINE</a></li>
            </ul>
        </nav>
    </section>
    <span class="clearfix"></span>

    <section class="container mt-3 search">
    </section>
</header>
<form class="d-block m-auto w-75 border-dark border-top p-5">
    <div class="form-group">
    <label>Upload picture</label>
    <input type="file" name="image">
    </div>
    <input class="btn-submit" type="submit" name="Send" value="send">
</form>

<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>

<?php
} else {
    header('location:login/login.php');
    exit();

} ?>


