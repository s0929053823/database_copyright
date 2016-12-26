<?php
require_once 'model/Discount.php';


if (isset($_POST['insert_discount'])) {
    echo var_dump($_POST);
    $description = $_POST['description'];
    $startTime = $_POST['s_date'].$_POST['s_time'];
    $endTime = $_POST['e_date'].' '.$_POST['e_time'];
    $rate = $_POST['rate'];
    Discount::Insert($description,$startTime,$endTime,$rate);
}