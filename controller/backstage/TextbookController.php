<?php
include_once 'config.php';

if(isset($_POST['insertButton'])){
    header("Location: http://127.0.0.1/nonLaravel/backstage.php?value=3&action=1");
    exit();
}
else {
    header("Location: http://127.0.0.1/nonLaravel/backstage.php?value=3&action=2&bookid=".$_POST['editButton']);
    exit();
}
