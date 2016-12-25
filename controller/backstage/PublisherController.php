<?php
include_once 'config.php';

if(isset($_POST['insertButton'])){
    header("Location: http://127.0.0.1/nonLaravel/backstage.php?value=6&action=1");
    exit();
}
else {
    header("Location: http://127.0.0.1/nonLaravel/backstage.php?value=6&action=2&pid=".$_POST['editButton']);
    exit();
}

/**
 * Created by PhpStorm.
 * User: WeiLun
 * Date: 12/24/2016
 * Time: 2:28 PM
 */