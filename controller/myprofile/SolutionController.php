<?php
include_once ("../config.php");

if(isset($_POST['editButton'])){
    $url = "http://127.0.0.1/nonLaravel";
    header("Location: $url/myprofile.php?sidevalue=2&action=1&sid=".$_POST['editButton']);
    exit();
}