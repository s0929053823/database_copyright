<!DOCTYPE html>
<?php
require_once 'model/Member.php';
include_once("querybook.php");
include_once("function.php");

if(!isset($_SESSION['cart_items'])){
    $cart_count = 0;
}else {
    $cart_count = count($_SESSION['cart_items']);
}
?>
<head>
    <meta http-equiv="Content-Type" content="text/html>
    <meta name=" viewport
    " content="width=device-width, initial-scale=1">

    <title>CopyRight - Find Solution</title>

</head>
<!-- Bootstrap Core CSS -->
<link href="<?= APP_URL ?>css/mystyle.css" rel="stylesheet">
<link rel="stylesheet" href="<?= APP_URL ?>/css/bootstrap.min.css">
<link rel="stylesheet" href="<?= APP_URL ?>dist/css/bootstrap-select.css">
<!-- Custom CSS -->

<link href="<?= APP_URL ?>css/shop-homepage.css" rel="stylesheet">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script src="<?= APP_URL ?>dist/js/bootstrap-select.js"></script>
<!-- jQuery -->
<script src="js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>


<body>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= APP_URL ?>index.php">CopyRight</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

<!--            <div class="col-xs-8 col-xs-offset-2">-->
<!--                <div class="input-group">-->
<!--                    <div class="input-group-btn search-panel">-->
<!--                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">-->
<!--                            <span id="search_concept">Filter by</span> <span class="caret"></span>-->
<!--                        </button>-->
<!--                        <ul class="dropdown-menu" role="menu">-->
<!--                            <li><a href="#contains">Contains</a></li>-->
<!--                            <li><a href="#its_equal">It's equal</a></li>-->
<!--                            <li><a href="#greather_than">Greather than ></a></li>-->
<!--                            <li><a href="#less_than">Less than < </a></li>-->
<!--                            <li class="divider"></li>-->
<!--                            <li><a href="#all">Anything</a></li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                    <input type="hidden" name="search_param" value="all" id="search_param">-->
<!--                    <input type="text" class="form-control" name="x" placeholder="Search term...">-->
<!--                    <span class="input-group-btn">-->
<!--                    <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>-->
<!--                </span>-->
<!--                </div>-->
<!--            </div>-->
            <ul class="nav navbar-nav navbar-right">

                <?php
                $user = null;
                if (isLogin()) {
                    $user = Member::GetByID($_SESSION['user_id']);
                    ?>

                    <li class="dropdown"><a href="#" class="dropdown-toggle"
                                            data-toggle="dropdown">Welcome, <?=$user->account ?> <b
                                    class="caret"></b> <font color="red">Point: <?= $user->point ?></font></a>
                        <ul class="dropdown-menu">
                            <li><a href="myprofile.php"><i class="icon-cog"></i>Profiles</a></li>
                            <li><a href="upsolution.php"><i class="icon-off"></i> Upload Solutions</a></li>
                            <li><a class='glyphicon glyphicon-shopping-cart' href="cartview.php"><i class="icon-off"></i>Cart(<?= $cart_count ?>)</a></li>
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="icon-off"></i> Logout</a></li>
                            <?php if ($user->type == '0') { ?>
                                <li><a href="backstage.php"><i class="icon-off"></i> Backstage</a></li>
                            <?php } ?>
                        </ul>
                    </li>

                <?php } else { ?>
                    <li>
                        <a href="login.php">Login</a>
                    </li>
                    <li>
                        <a href="register.php">Register</a>
                    </li>
                <?php } ?>
            </ul>
            <form action="search.php" method="get">
            <div class="input-group">
                <div class="form-group col-lg-16">
                    <input type="text" class="form-control" name="value" placeholder="Search.." id="search_key" value="">
                </div>
                <span class="input-group-btn">
                    <button class ="btn btn-info" type="submit">Search </button>
                </span>
            </div>
            </form>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

</body>


<script>
    $(document).ready(function(e){
        $('.search-panel .dropdown-menu').find('a').click(function(e) {
            e.preventDefault();
            var param = $(this).attr("href").replace("#","");
            var concept = $(this).text();
            $('.search-panel span#search_concept').text(concept);
            $('.input-group #search_param').val(param);
        });
    });
</script>