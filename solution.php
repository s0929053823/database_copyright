<?php
include('navigation.php');

if(!isset($_GET['value']))
{
    return;
}
$solution = getSolution($_GET['value']);
$creator = getMember($solution['Creater_ID']);
$comments = getComment($solution['Solution_ID']);
$textbook = getTextbook($solution['Textbook_ID']);
$avgRate = getAverageRate($_GET['value']);
$comments = getComment($_GET['value']);
$isActive = $solution['isActive'];
$avgValue = ($avgRate['Average']!=null)?number_format(round($avgRate['Average'],2),2) :'N/A';
$price = $solution['Price'];
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="<?= APP_URL ?>/js/star-rating.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?= APP_URL ?>/css/star-rating.css" media="all" type="text/css"/>


<!-- Page Content -->
<div class="container">

    <!-- Portfolio Item Heading -->
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-6">
                <font size="16"><?= $solution['Title'] ?>
                    <small>Create By <a
                                href="profile.php?userid=<?= $creator['Member_ID'] ?>"><?= $creator['Account'] ?> </a>
                    </small>

                </font>
            </div>
            <h1>

                <?php
                $isCartEnable ="disabled";
                $isRateEnable = false;
                $inCommentEnable = false;
                $cartText;
                $rateText;
                $commentText = "You are already comment";
                if(isLogin())
                {
                    if($solution['Creater_ID']==$_SESSION['user_id'])
                    {
                        $commentText = $rateText = $cartText = "You are creator";
                    }
                    else if(!$isActive)
                    {
                        $commentText = $rateText = $cartText =  "This solution in unavailable";
                    }
                    else{
                        if(isAddedToCart($solution['Solution_ID']))
                        {
                            $cartText =  "Already Added";
                        }
                        else if(isAlreadyBought($_SESSION['user_id'],$solution['Solution_ID'])) {
                            $cartText =  "Already Bought";
                        }
                        else{
                            $isCartEnable = "enabled";
                            $cartText =  "Add to Cart";
                        }

                        if(isAlreadyBought($_SESSION['user_id'],$solution['Solution_ID']))
                        {
                            $isRateEnable = true;
                            if(!isAlreadyComment($_SESSION['user_id'],$solution['Solution_ID']))
                            {
                                $inCommentEnable = true;
                            }


                        }
                        else{
                            $rateText =  $commentText = "You haven't bought";

                        }
                    }
                }
                else
                {
                    $commentText = $rateText = $cartText = "You aren't login";
                }

                ?>

                <a href="addToCart.php?value=<?= $_GET['value'] ?>&price=<?= $price ?>" class='btn btn-primary <?=$isCartEnable?>'>
                    <span class='glyphicon glyphicon-shopping-cart'></span> <?=$cartText?>
                </a>
        </div>
    </div>
    <!-- /.row -->

    <!-- Portfolio Item Row -->
    <div class="row">

        <div class="col-md-6">
            <img class="img-responsive" src="http://placehold.it/750x500" alt="">
        </div>
        <div class="col-md-5">

            <h3>Reference</h3>
            <ul>
                <?php if($textbook) {?>
                <a href = "textbook.php?value=<?= $solution['Textbook_ID'] ?>"><h5><?= $textbook ['Title'] ?>(<?= $textbook['Publish_Year'] ?>)</h5></a>
                <?php } else { ?>
                    Textbook is deleted
                <?php } ?>
                <h5>Chapter <?= $solution['Chapter_Number'] ?></h5>
            </ul>

            <h3>Create Date</h3>
            <ul>
                <h5><?= $solution['Create_Date'] ?></h5>
            </ul>
            <h3>Price</h3>
            <ul>
                <h2>$ <?= $solution['Price'] ?></h2>
            </ul>
            <h3>Rate</h3>
            <ul>

                <i><b><font color="blue" size="16"><?= $avgValue ?></font></b></i>
                <font color="black" size="4">(<?= $avgRate['Number'] ?>人評分)</font>
                <p></p>

            </ul>

        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6">

            </div>
            <div class="col-md-6">
                <?php if ($isRateEnable) {
                    $rate = getRateInfo($user['Member_ID'],$solution['Solution_ID']);
                    ?>

                    <div class="col-md-12">
                        <form method="POST" action="rate.php">
                            <input type='hidden' name='solution' value='<?= $solution['Solution_ID'] ?>'/>
                            <input type='hidden' name='user' value='<?= $user['Member_ID'] ?>'/>
                            <?php if(!$rate) { ?>
                                <div class="col-md-7">
                                    <input type="text" class="rating rating-loading" name="rate" value="2" data-size="xs" title="">
                                </div>
                                <div class="col-md-5">
                                    <button type="submit" class="btn btn-primary active"name="rate_sumbit">我要評分</button>
                                </div>
                            <?php }
                            else { ?>
                                <div class="col-md-7">
                                    <input type="text" class="rating rating-loading"  name="rate" value=<?= $rate['Score'] ?> data-size="xs" title="">
                                </div>
                                <div class="col-md-5">
                                    <button type="submit" class="btn btn-primary active"name="edit_rate" >我要修改評分</button>
                                    <button type="submit" class="btn btn-warning active"name="delete_rate" >我要收回評分</button>
                                </div>

                            <?php } ?>
                        </form>
                    </div>
                <?php } else {
                    ?>
                    <button type="submit" class="btn btn-primary disabled"><?= $rateText ?></button>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-12">

            <h3>Description</h3>
            <ul>
                <p><?= $solution['Description'] ?></p>
            </ul>

        </div>
    </div>



    <div class="row">
        <div class="col-md-12">
            <h3>Comments (<?= count($comments) ?>)</h3>
            <?php foreach ($comments as $comment) {
                $commnetUser = getMember($comment['Member_ID'])
                ?>

                <div class="col-sm-1">
                    <div class="thumbnail">
                        <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                    </div><!-- /thumbnail -->
                </div><!-- /col-sm-1 -->

                <div class="col-sm-5">
                    <div class="panel panel-default">
                        <div class="panel-heading">

                            <strong><a href="profile.php?userid=<?= $commnetUser['Member_ID'] ?>"><?= $commnetUser['Account'] ?></a></strong>
                            <span class="text-muted"><?= time_elapsed_string($comment['Comment_Date']) ?></span>
                        </div>
                        <div class="panel-body">
                            <?= $comment['Comment'] ?>

                        </div><!-- /panel-body -->
                        <!--
                        <button type="submit" class="btn btn-info active"name="edit_rate" >修改留言</button>
                        <button type="submit" class="btn btn-info active"name="edit_rate" >刪除留言</button>
                        -->
                    </div><!-- /panel panel-default -->
                </div><!-- /col-sm-5 -->

            <?php } ?>
        </div>
    </div>

</div><!-- /container -->

<div class="row">
    <div class="col-md-12">
        <h3>I Want to Comment </h3>
        <?php if ($inCommentEnable) { ?>
            <form action='comment.php' method="post">
                <div class="col-md-8">
                    <div class="form-group">
                        <input type='hidden' name='solution' value='<?= $solution['Solution_ID'] ?>'/>
                        <input type='hidden' name='user' value='<?= $user['Member_ID'] ?>'/>
                        <textarea class="form-control" name="comment" id="comment" rows="3"
                                  name="comment"></textarea>
                    </div>
                </div>
                <div class="col-md-4" align="justify">
                    <button type="submit" class="btn btn-primary active" name="comment_submit">確定
                    </button>
                </div>
            </form>
            <?php
        }
        else
        {
            echo"<h4 style=color:red>$commentText</h4>";
         }
        ?>
    </div>
</div>



<!-- /.row -->

<!-- Related Projects Row -->
<!--<div class="row">

    <div class="col-lg-12">
        <h3 class="page-header">Related Projects</h3>
    </div>

    <div class="col-sm-3 col-xs-6">
        <a href="#">
            <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
        </a>
    </div>

    <div class="col-sm-3 col-xs-6">
        <a href="#">
            <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
        </a>
    </div>

    <div class="col-sm-3 col-xs-6">
        <a href="#">
            <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
        </a>
    </div>

    <div class="col-sm-3 col-xs-6">
        <a href="#">
            <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
        </a>
    </div>

</div>-->
<!-- /.row -->

<hr>


<?php
include('footer.php');
?>
</div>

