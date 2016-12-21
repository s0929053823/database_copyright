<?php
include_once ('querybook.php');
session_start();

if(isset($_SESSION['user_id'])&&isset($_SESSION['cart_items'])&&isset($_SESSION['AuthToken'])) {
    $user = getMember($_SESSION['user_id']);
    $cartItem = $_SESSION['cart_items'];
    $destination = $user['Email'];

    $total_price=0;
    foreach ($_SESSION['cart_items'] as $id=>$price) {
        $total_price+=$price;
    }
    $remainPoint =  $user['Point'] - $total_price;
    if($remainPoint<0){
        header('location: transactionError.php');
    }
    $receiptID = insertAndGetReceiptID($_SESSION['user_id'],$total_price,$remainPoint,$destination);
    foreach ($_SESSION['cart_items'] as $id=>$price) {
        insertTransaction($id,$price,$receiptID);
    }
    updateMemberPoint($_SESSION['user_id'],$remainPoint);
    header('location: transactionSuccess.php?receipt='.$receiptID);
    unset($_SESSION['cart_items']);
    unset($_SESSION['AuthToken']);
}
else
{
    header('location: transactionError.php');
}

