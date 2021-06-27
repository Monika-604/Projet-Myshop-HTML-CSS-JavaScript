<?php

//if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST["email"]) && !empty($_POST["email"]) &&
        isset($_POST["password"]) && !empty($_POST["password"]) &&
        isset($_POST["re-password"]) && !empty($_POST["re-password"]) ){

        $email=$_POST["email"]; // on met la value dans email
        $password=$_POST["password"];
        $re_password=$_POST["re-password"];


        if($password==$re_password){ // vérifier la validité de password, ils sont égals


//
            include_once ("../connect.php"); // conecter à DB

            $sql="select count(id) from users where email=?"; // demander si ce utilisateur existe par cet email
            $query=$connect->prepare($sql); // se préparer statement sql
            $query->bindValue(1,$email); // donner la value
            $query->execute(); // execute
            $number=$query->fetch(PDO::FETCH_COLUMN); // on met nombre de user avec cet email
            // en variable number par statement fetch


            if($number){ // si user existe avec cet email, number sera equivalant 1, et doit mise à jour pass

                $hash_password = password_hash($_POST['password'],PASSWORD_DEFAULT); //on change pass à hash
                // pour la sécurité, si jamais les users utilisent le même pass ailleurs


                $sql2 = "UPDATE `users` SET `password` = ? WHERE `email` = ?";//fait update pass pour cet email qui est la


                $query2 = $connect->prepare($sql2); // execute la sécurité query
                $query2->bindValue(1, $hash_password);
                $query2->bindValue(2, $email);
                $result2=$query2->execute();

                if($result2){ // si ça va execute de cette commande, en la page forget
                    header('location:forgot-pass.php?successful=2000'); // apparaitre en haut page
                    exit();
                }
                else{ //
                    header('location:forgot-pass.php?error=2040'); // il y a une error
                    exit();
                }

            }
            else{ // il n'y a user et cet email, montre cette eurror
                header('location:forgot-pass.php?error=2030');
                exit();
            }
        }
        else{ // si pass n'est pas égal, montre eurror
            header('location:forgot-pass.php?error=2020');
            exit();
        }
    }
    else{ // si email ou pass ou repass sont vide ou ne sont pas inisialisé
        header('location:forgot-pass.php?error=2010');
        exit();
    }


