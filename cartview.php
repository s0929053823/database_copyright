<?php include('navigation.php'); ?>
<?php include("check.php"); ?>
<?php
require_once 'model/Solution.php';
require_once 'model/Discount.php';
if(!isset($_SESSION['cart_items'])){
    $cart_count = 0;
}else{
    $cart_count=count($_SESSION['cart_items']);
    $cartItems = $_SESSION['cart_items'];
}
if($cart_count>0){
    ?>
    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Cart</h1>
            </div>
        </div>
        <div class="col-md-9">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Solution</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th></th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $total_price=0;
                    foreach ($_SESSION['cart_items'] as $item) {
                        $solution = Solution::GetByID($item['id']);
                        $price  =  floor($solution->discountRate * $solution->price/100);
                        $description = ($solution->discountID!=null)?Discount::GetByID($solution->discountID)->description:"";

                        if($description!=""){
                            $rate = $solution->discountRate/10;
                            $description = "因打折活動"."'$description'"."，所以該物品打".$rate."折";
                        }
                        $total_price+=$price;
                        ?>
                        <tr>
                            <td> <a href="<?= $solution->url ?>"><?= $solution->title ?></a></td>
                            <td><?=$price?></td>
                            <td><?=$description?></td>
                            <td>
                                <a href="removeFromCart.php?id=<?=$solution->id?>"class='btn btn-danger'>
                                    <span class='glyphicon glyphicon-remove'></span> Remove from cart
                                </a>
                            </td>

                        </tr>
                        <?php
                    }
                    ?>
                    <tr>
                        <?php $remainPoint =  $user->point - $total_price ?>
                        <td><b>Total: </b></td>
                        <td><b<i><?= $total_price ?></i></b></td>
                        <td> <?php if($remainPoint>0) { ?>
                                <a href='checkoutAuth.php' class='btn btn-success'>
                                    <span class='glyphicon glyphicon-shopping-cart'></span> Checkout
                                </a>
                            <?php } else { ?>
                                <a href='#' class='btn btn-warning disabled'>
                                    <span class='glyphicon glyphicon-shopping-cart'></span> Insufficient
                                </a>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Remain </b></td>
                        <td><b<i><?= $remainPoint ?></i></b></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } else { ?>
    <h1> Nothing in the Cart!!</h1>
<?php } ?>


<?php include('footer.php'); ?>