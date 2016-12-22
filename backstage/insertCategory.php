<?php
include_once("../config.php");
include_once ('../querybook.php');
if(isset($_POST['categoryName'])) {
    insertCategory($_POST['categoryName']);
}

header('location:' . APP_URL . 'backstage.php?value=4');