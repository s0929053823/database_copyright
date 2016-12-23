<?php
include_once("config.php");
include_once ("querybook.php");

if(isset($_GET['action'])&&isset($_GET['value'])) {
    session_start();

    if($_GET['action']=='add'){
        insertTrace($_SESSION['user_id'],$_GET['value']);
    }
    else{
        deleteTrace($_SESSION['user_id'],$_GET['value']);
    }
    header("location:" . APP_URL . "solution.php?value=".$_GET['value']);

}
?>