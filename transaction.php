<?php
include_once ('querybook.php');
require_once 'model/Solution.php';
require_once 'model/Discount.php';
require_once 'model/Transaction.php';
session_start();

if(isset($_SESSION['user_id'])&&isset($_SESSION['cart_items'])&&isset($_SESSION['AuthToken'])) {
    $user = getMember($_SESSION['user_id']);
    $cartItem = $_SESSION['cart_items'];
    $destination = $user['Email'];

    $total_price=0;
    foreach ($_SESSION['cart_items'] as $item) {
        $solution = Solution::GetByID($item['id']);
        $price  =  floor($solution->discountRate * $solution->price/100);
        $total_price+=$price;
    }
    $remainPoint =  $user['Point'] - $total_price;
    if($remainPoint<0){
        header('location: transactionError.php');
    }
    $receiptID = insertAndGetReceiptID($_SESSION['user_id'],$total_price,$remainPoint,$destination);
    foreach ($_SESSION['cart_items'] as $item) {
        $solution = Solution::GetByID($item['id']);
        $price  =  floor($solution->discountRate * $solution->price/100);
        $description = ($solution->discountID!=null)?Discount::GetByID($solution->discountID)->description:"";

        if($description!=""){
            $rate = $solution->discountRate/10;
            $description = "因打折活動"."-$description"."，所以該物品打".$rate."折";
        }
        Transaction::Insert($item['id'],$price,$receiptID,$description);
    }

    header('location: transactionSuccess.php?receipt='.$receiptID);
    unset($_SESSION['cart_items']);
    unset($_SESSION['AuthToken']);
}
else
{
    header('location: transactionError.php');
}

