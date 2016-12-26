<?php
require_once 'model/Discount.php';


if (isset($_POST['insert_discount'])) {
    //var_dump($_POST);
    $type = $_POST['type'];
    $dependent = $_POST['dependent'];
    $description = $_POST['description'];
    $startTime = $_POST['s_date'].' '.$_POST['s_time'];
    $endTime = $_POST['e_date'].' '.$_POST['e_time'];
    $rate = $_POST['rate'];
    Discount::Insert($description,$startTime,$endTime,$rate,$type,$dependent);
}
else if(isset($_POST['delete_discount'])){
    $id = $_POST['delete_discount'];
    Discount::Delete($id);
}
header('Location: http://127.0.0.1/nonLaravel/backstage.php?value=8');