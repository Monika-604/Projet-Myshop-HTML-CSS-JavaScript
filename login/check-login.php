<?php
session_start();

include("../connect.php");

if( isset($_POST["email"] ) && !empty($_POST["email"]) &&
    isset($_POST["password"] ) && !empty($_POST["password"]) ){

    check_login($connect,$_POST["email"],$_POST["password"]); //

}
else{ //after ? on la value envoie toujour avec la méthode get...
    header("location:login.php?error=1020");
    exit();
}

function check_login($pdo,$email,$password){ // fuction qui prendre variavle pdo, emai et pass
    // pour vérifier la validité de login


        $sql1="SELECT password,username,admin FROM users WHERE email=?";
        $query1=$pdo->prepare($sql1); //on execute pas statement direct, d'abord on fait prepare pour éviter arraque injection
        $query1->bindValue(1,$email); //il utilise de stament sql au lieu de taper email
        $query1->execute();

        $row=$query1->fetch(PDO::FETCH_ASSOC);
        if (!$row) {    // agar row khali bud redirect mishe ba dasture header be login//
            header("location:login.php?field=1010");
            exit();
        }

        else{ // agar email vojud dasht password check//
            $result_verify=password_verify($password,$row["password"]); //password data hash shodeh
            // as pass verifey komam migirim hash in ba hash un barabar bashe //
            if (!$result_verify){ // ageh barabar nabashe dobareh be login ba heaser//
                header("location:login.php?field=1010");
                exit();
            }
            else{
                // every thing okay, agar admin bashe inja check mikonim.

                if($row["admin"]==1){  // agar admin bashe mireh ye session barayeh admin set mikonim
                    // va mifrestim be safheh admin.php
                    $_SESSION["admin-loging"]= $row["username"]; //éviter acceder tout le monde à admin panel
                    header("location:../admin/admin.php");
                    exit();
                }
                else{ //ce n'est pas admin c'est pour users
                    //$_SESSION["user"]= array("username" => $row["username"],"admin" =>0);
                    setcookie("user", $row["username"], time() + (86400 * 30), "/");
                    header("location:../index.php");
                    exit();
                }
            }
             // cookie pour si user ferme browser, il reste toujour connecter
            // cookie pour la sécurité,

        }
}
