<?php
include("navigation.php");
$solutions = getSearchResult($_GET['value']);
?>

<!-- Page Content -->
<div class="container">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Search " <?=$_GET['value']?> "
                <small><?=count($solutions) ?> results</small>
            </h1>
        </div>
    </div>
    <!-- /.row -->


    <?php
    foreach ($solutions as $solution) {
            $creator = getMember($solution['Creater_ID']);
            $textbook = getTextbookByID($solution['Textbook_ID']);
        ?>
        <div class="row">
            <div class="col-md-7">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/700x300" alt="">
                </a>
            </div>
            <div class="col-md-5">

                <h2><?=$solution['Title']?></h2>
                <h3><?=$textbook['Title']?></h3>
                <h4><a href="profile.php?userid=<?=$creator['Member_ID']?>">Creator : <?=$creator['Account'] ?> </a></h4>
                <a class="btn btn-primary" href="solution.php?value=<?= $solution['Solution_ID'] ?>">View Solution</a>
                <h1 style="color:red"> $<?= $solution['Price']?></h1>
            </div>
        </div>
        <!-- /.row -->
        <hr>
        <?php
    }
    ?>


    <hr>

    <!-- Pagination -->
    <!-- /<div class="row text-center">
        <div class="col-lg-12">
            <ul class="pagination">
                <li>
                    <a href="#">&laquo;</a>
                </li>
                <li class="active">
                    <a href="#">1</a>
                </li>
                <li>
                    <a href="#">2</a>
                </li>
                <li>
                    <a href="#">3</a>
                </li>
                <li>
                    <a href="#">4</a>
                </li>
                <li>
                    <a href="#">5</a>
                </li>
                <li>
                    <a href="#">&raquo;</a>
                </li>
            </ul>
        </div>
    </div>
     -->
    <!-- /.row -->


<?php include("footer.php");?>
