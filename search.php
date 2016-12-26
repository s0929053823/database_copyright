<?php
include("navigation.php");
require_once 'model/Member.php';
require_once 'model/Textbook.php';
require_once 'model/Solution.php';
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
            $solution = Solution::GetByID($solution['Solution_ID']);
            $creator = Member::GetByID($solution->creatorID);
            $textbook = Textbook::GetByID($solution->textbookID);
        ?>
        <div class="row">
            <div class="col-md-5">

                    <img class="img-responsive" src="<?= $textbook->imgSrc?>" alt=""  height="300" width="300">

            </div>
            <div class="col-md-7">

                <h2><?=$solution->title?></h2>
                <h3><?=$textbook->title?></h3>
                <h4><a href="profile.php?userid=<?=$creator->id?>">Creator : <?=$creator->account ?> </a></h4>
                <a class="btn btn-primary" href="solution.php?value=<?= $solution->id ?>">View Solution</a>
                <h1 style="color:red"> $<?= $solution->price?></h1>
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
