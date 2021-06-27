<?php
session_start();
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

                <?php if (isset($_COOKIE["user"])){ ?> <!-- si cookoie de user est bon, donc user
                est connecté, on montre profile et logout -->

                <div class="dropdown">
                    <button type="button" class="btn-user btn dropdown-toggle" data-toggle="dropdown">

                        <?php echo $_COOKIE["user"]; ?> <!-- montrer username de user par cet statement -->
                    </button> <div class="dropdown-menu">
                        <a href="profile.php">Profile</a>
                        <a href="login/signout.php">Sign out</a>
                    </div>
                </div>
            </div>
            <?php
                }
                else{ // quand user n'est pas connecté par login
                ?>
                <a href="login/login.php" class="login d-inline-block" title="login">LOGIN</a>
            <?php } ?>  <!-- pour dire }, est php-->
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

    <div class="container bar-search mx-auto mt-4">
        <div class="card-body">
            <form class="form-bar" action="searchresults.php" method="post">

                <input class="search-input" type="text" name="term" placeholder="Search"/>

                <select name="select_category" class="cat">
                    <option value="all">All category</option>
                    <option value="1">Lounge</option>
                    <option value="2">Bed</option>
                    <option value="3">Table</option>
                    <option value="4">Chair</option>
                    <option value="5">Sofa</option>
                    <option value="6">Double Bed</option>
                    <option value="7">Kids Bed</option>
                    <option value="8">Design Furniture</option>
                    <option value="9">Fancy Stuff</option>
                    <option value="10">Console</option>
                    <option value="11">Inside table</option>
                    <option value="12">Blanko</option>
                    <option value="13">Seater Sofa</option>
                </select>
                <span class="clearfix"></span>
                <div class="form-group">


                    <select name="select_price" class="select-form price d-inline-block">
                        <option value="all">All</option>
                        <option value="< 100">< 100</option>
                        <option value="< 200">< 200 </option>
                        <option value="< 500">< 500 </option>
                        <option value="< 1000">< 500 </option>
                        <option value="> 999">> 1000 </option>
                    </select>


                    <select name="select_sort" class="select-form sort d-inline-block">
                        <option value="all">Sort by</option>
                        <option value="all">Relevancy</option>
                        <option value="price asc">Price (low > high)</option>
                        <option value="price desc">Price (high > low)</option>
                        <option value="name asc">Name (a > z)</option>
                        <option value="name desc">Name (z > a)</option>
                    </select>
                </div>
                <span class="clearfix"></span>

                <input class="btn-submit" type="submit" value="Submit"/>
            </form>
        </div>
    </div>
    <section class="container mt-3 search">
    </section>
</header>


<div class="main mt-5">
    <section class="container filter">
        <div class="row">


            <?PHP
                // de tout façon la pre page est égal 1, si page n'est pas set sion equivalant 1
            if (!isset ($_GET['page'])) {
                $page = 1;
            } else { // agar page set shodeh bud berizeh tu motoghayereh page
                $page = $_GET['page'];
            }


            $result_per_page = 8;  // nombre product que on veux montrer sur la page
            $offset = ($page - 1) * $result_per_page;//de quel produit commence par variable offset

            include_once("connect.php"); // pour contacter à database

            // choisir de product de tables product par limit 8, chaque fois recupere 8 produit,
            // de quel index commence par offset
            $sql = "select * from products order by id LIMIT " . $result_per_page . " offset " . $offset;

            $result = $connect->query($sql); // cet query execute sql

            foreach ($result as $row) { // result de data doit apepller separement, foreach coupe result
                // de db et met dans un row, chque row est un ligne de table product

                $sql2 = "SELECT name FROM `categories` where id=?"; // on n'a pas name en table product, on appelle
                // name de la table categorie par cet statement
                $query2 = $connect->prepare($sql2); // la sécurité
                $query2->bindValue(1, $row["category_id"]);
                $query2->execute();

                $cat = $query2->fetch(PDO::FETCH_ASSOC); // par statement fetch_assoc on met
                // le result en variable cat
            ?>
            <div class="img col-lg-3 col-md-4 col-sm-6 col-12 product">
                <!-- on construt les products par tages html, et en utilisant statement php.met row (ligne) de img ici -->
                <img src="assets/images/products/<?php echo $row["img"]; ?> " class="post-img" alt="coombes"
                     title="coombes image">
                <div class="name">
                    <a href="#" class="d-block">
                        <h2 class="float-left"><?php echo $row["name"]; ?> </h2>
                    </a>
                    <span class="price float-right"><?php echo $row["price"]; ?> $</span>
                </div>
                <span class="clearfix"></span> <!-- met name de categorie ici-->
                <a href="#" class="d-block"><span class="d-block category"><?php echo $cat["name"]; ?> </span></a>
                <div class="ft-box">
                    <div class="rating float-left">
                        <div class="rate">
                            <?php
                            for ($i = 1; $i <= $row["rate"]; $i++) { // construit étoile noire la même rate en DB
                                ?>
                                <span class="star-black"></span>
                                <?php
                            }
                            for ($i = 1; $i <= 5 - $row["rate"]; $i++) { // for étoile blanche, on réduit rate de 5,
                                // et le rest est étoile blanche
                                ?>
                                <span class="star-white"></span>
                                <?php
                            }
                            ?>

                        </div>

                        <span class="clearfix"></span>
                    </div>
                    <a href="#" class="d-block float-right" title="add to cart"><span
                                class="buy fa fa-cart-plus"></span></a>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>

    <section class="container paging">
        <ul>
            <!--<li class="pervise"><a href="#" class="fa fa-chevron-left"></a></li>-->
            <?php


            $sql5 = "select count(id) from products"; // prendre tout le produit en table par statement sql


            $result5 = $connect->query($sql5); // exectue //  //bedast avardan number of products
            $number_of_products = $result5->fetch(PDO::FETCH_COLUMN); // fetch_column on met nombre product en
            //variable number_of_product
           // pour éviter montrer la page vide, combien page on a besoin !!
            // le nombre de page depende le nombre de product

            $number_of_page = ceil($number_of_products / $result_per_page);// nombre de product est partagé sur 8,
            // pourquoi CEIL: pour arrondir vers plus (round up)
             for ($i = 1; $i <= $number_of_page; $i++) { // be tedadeh num page in adadha neveshte shavad
                if ($i == $page) {
                    echo '<li class="active"><a href = "index.php?page=' . $i . '">' . $i . ' </a></li>';  // ineh ke paeen neshun mideh
                } else {
                    echo '<li><a href = "index.php?page=' . $i . '">' . $i . ' </a></li>';// paeen safhe
                }
            }
            ?>
            <!--<li class="next"><a href="#" class="fa fa-chevron-right"></a></li>-->
        </ul>
        <span class="clearfix"></span>
    </section>
</div>
<footer></footer>
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>
