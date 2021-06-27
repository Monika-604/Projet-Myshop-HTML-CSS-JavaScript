<!DOCTYPE html>
<html lang="fr">
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="SignUp.js" />
    <link rel="stylesheet" href="SignUp.css" />

    <meta charset="utf-8">
    <title> Registration Form </title>
</head>
<body>

<?php

//error_reporting(E_ALL);
//ini_set("display_errors",1);

include_once("../connect.php");

$password = null;

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $user = $connect->query("select email from my_shop.users where email='$email'");
    if ($user->fetch(PDO::FETCH_ASSOC) != null) {
        $erreur = "<h3>EMAIL ALREADY USED</h3>";
    } else {
        if ((strlen($_POST['name']) < 2 || strlen($_POST['name']) > 15)) {
            $erreur2 = "<h3>INVALID NAME : 2 to 15 characters</h3>";
        }
        if ((!preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {
            $erreur3 = "<h3>INVALID EMAIL</h3>";
        }
        if (strlen($_POST['password']) < 3 or strlen($_POST['password']) > 10 or ($_POST['password'] != $_POST['password_confirmation'])) {
            $erreur4 = "<h3>INVALID PASSWORD OR PASSWORD CONFIRMATION</h3>";
        } else {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $requete = $connect->prepare('INSERT INTO my_shop.users (username, password, email, admin) 
                        VALUES 
                        (:name,:password,:email,:admin)');
            $requete->execute(array(
                "name" => $_POST['name'],
                "password" => $password,
                "email" => $_POST['email'],
                "admin" => 0,));
            if (isset($erreur) == null){
                header('location:../login/login.php');
                exit();
            }

        }
    }
}
?>

<form method="post">
    <?php
    if (isset($erreur)) {
        echo $erreur;
    }
    if (isset($erreur2)) {
        echo $erreur2;
    }
    if (isset($erreur3)) {
        echo $erreur3;
    }
    if (isset($erreur4)) {
        echo $erreur4;
    }
    ?>
    <label>
        <p class="label-txt">NAME</p>
        <input type="text" name="name" id="name" class="input" minlength="2" maxlength="15" required>
        <span title="Choisissez un nom entre 2 et 15 caractères."></span>
        <div class="line-box">
            <div class="line"></div>
        </div>
    </label>
    <label>
        <p class="label-txt">EMAIL</p>
        <input type="text" name="email" id="email" class="input" required type=text >
        <span title="Veuillez respecter le format exemple@email.fr"></span>
        <div class="line-box">
            <div class="line"></div>
        </div>
    </label>
    <label>
        <p class="label-txt">PASSWORD - 3 to 10 characters </p>
        <input type="password" name="password" id="password" class="input" minlength="3" maxlength="10" required>
        <div class="line-box">
            <div class="line"></div>
        </div>
    </label>
    <label>
        <p class="label-txt">CONFIRM YOUR PASSWORD</p>
        <input type="password" name="password_confirmation" id="password_confirmation" class="input" min="3" max="10" required>
        <div class="line-box">
            <div class="line"></div>
        </div>
    </label>
    <button type="submit">SUBMIT</button>
</form>

</p>
</body>
</html>