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
                        <li><a href="index.php">HOME</a></li>
                        <li><a href="#">SHOP</a></li>
                        <li><a href="#">MAGAZINE</a></li>
                    </ul>
                </nav>
            </div>
            <div class="right ol-xl-4 col-lg-4 col-md-6 col-6 text-right">
                <a href="#" class="buy d-inline-block mr-3" title="Go To Shopping Cart"></a>
                <span class="fa fa-navicon"></span>
                <?php

                if(isset($_SESSION["user"])){?>
                    <div class="dropdown">
                        <button class="dropbtn">
                            <?php echo $_SESSION["user"]["username"];?>
                        </button>
                        <div class="dropdown-content">
                            <a href="user/index.php">Profile</a>
                            <a href="login/signout.php">Sign out</a>
                        </div>
                    </div>
                    <?php
                }
                else{?>
                <a href="<?php echo"login/login.php"?>" class="login d-inline-block" title="login">

                    <?php
                    echo 'LOGIN';
                    }
                    ?>

                </a>
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

    <div class="container-search card w-75 mx-auto mt-4 bg-light">
        <div class="card-body">
            <form class="form-bar" action="searchresults.php" method="post">

                <input type="text" name="term" class="form-control mb-2" placeholder="Search"/>

                <select name="select_category" class="form-control mb-2" >
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
                <div class="form-group d-flex">

                    <label class="label"></label>
                    <select name="select_price" class="select-form form-control d-inline-block">
                        <option value="all">Price</option>
                        <option value="all">All</option>
                        <option value="< 100">< 100</option>
                        <option value="< 200">< 200 </option>
                        <option value="< 500">< 500 </option>
                        <option value="< 1000">< 500 </option>
                        <option value="> 999">> 1000 </option>
                    </select>

                    <label class="labelSign ml-1"></label>
                    <select name="select_sort" class="select-form form-control d-inline-block">
                        <option value="all">Relevancy</option>
                        <option value="price asc">Price (low > high)</option>
                        <option value="price desc">Price (high > low)</option>
                        <option value="name asc">Name (a > z)</option>
                        <option value="name desc">Name (z > a)</option>
                    </select>
                </div>

                <input class="btn-search" type="submit" value="Submit"/>
            </form>
        </div>
    </div>


</header>
<div class="main mt-5">
    <section class="container filter">
        <div class="row">



            <?PHP


            //
            include("connect.php");

if (!empty($_REQUEST['term'])) {
    //Unfinished SQL query; depending on the search elements get added to this
$sql = "SELECT * from products WHERE name LIKE ";
    //Adding the search term, only allowing a super simple and insecure search atm, can be expanded
$term = $_REQUEST['term'];
$sql .= "'%$term%'";

    //Adding Category
    if(isset($_REQUEST['select_category']) && $_REQUEST['select_category'] != 'all'){
        $category = $_REQUEST['select_category'];
        $sql .= " and category_id='$category'";
    }
    //Adding Price range
    if(isset($_REQUEST['select_price']) && $_REQUEST['select_price'] != 'all'){
        $price = $_REQUEST['select_price'];
        $sql .= " and price $price";
    }

    //Adding Sorting
    if(isset($_REQUEST['select_sort']) && $_REQUEST['select_sort'] != 'all') {
        $sort = $_REQUEST['select_sort'];
        $sql .= " order by $sort";
    }
$sql .= " LIMIT 40";
$search=$connect->query($sql);
$result=$search->fetchAll(PDO::FETCH_ASSOC);

            if(count($result)==0) {
                echo "No results found! <br />";
            } else

            foreach ($result as $row){
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 product">
                    <img src="assets/images/products/<?php echo $row["img"];?> " class="post-img" alt="coombes" title="coombes image">
                    <div class="name">
                        <a href="#" class="d-block">
                            <h2 class="float-left"><?php echo $row["name"];?> </h2>
                        </a>
                        <span class="price float-right"><?php echo $row["price"];?> $</span>
                    </div>
                    <span class="clearfix"></span>

                    <div class="ft-box">
                        <div class="rating float-left">
                            <div class="rate">
                                <?php
                                for($i=1;$i <= $row["rate"]; $i++){?>
                                    <span class="star-black" ></span>
                                    <?php
                                }
                                for( $i=1;$i <= 5-$row["rate"]; $i++) {
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

            <?php }
} else echo "Empty search, please fill in a word and try again <br />";
            ?>


        </div>
    </section>

</div>
<footer></footer>
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>
