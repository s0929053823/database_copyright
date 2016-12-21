<?php include("navigation.php"); ?>
<?php
$categorys = getCategorys();
$solutions = getSolutions();
$solutionNumber = 5;
?>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row carousel-holder">
                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <h2> Latest Solution </h2>
                    <?php
                    if ($solutionNumber > count($solutions))
                        $solutionNumber = count($solutions);
                    for ($i = 0; $i < $solutionNumber; $i++) {
                        $solution = $solutions[$i];
                        ?>
                        <div class="col-sm-4 col-lg-4 col-md-4">
                            <div class="thumbnail">

                                <div class="caption">
                                    <h4 class="pull-right">$<?=$solutions[$i]['Price'] ?></h4>
                                    <h4><a href="solution.php?value=<?= $solution['Solution_ID'] ?>"><?=$solutions[$i]['Title'] ?> </a>
                                    </h4>
                                    <p><?=$solutions[$i]['Description'] ?></p>
                                </div>

                                <div class="ratings">
                                    <?php $commentNumber = count(getComment($solutions[$i]['Solution_ID'])) ?>
                                    <p class="pull-right"><?=$commentNumber ?> comments</p>
                                    <?php
                                    $textbook = getTextbook($solutions[$i]['Textbook_ID']);
                                    $category = getCategory($textbook['Category_ID']);
                                    ?>
                                    <p><?=$category['Category_Name'] ?> </p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php include("footer.php"); ?>