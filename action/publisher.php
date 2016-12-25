<?php

require_once 'model/Publisher.php';


if (isset($_POST['insert_publisher'])) {
    $name = $_POST['name'];
    $owner = $_POST['owner'];
    $website = $_POST['website'];
    $telephone = $_POST['telephone'];
    $foundDate = $_POST['fdate'];
    $description = $_POST['description'];
    $imgSrc = $_POST['imgSrc'];
    Publisher::Insert($name,$owner,$website,$telephone,$foundDate,$imgSrc,$description);
}

else if (isset($_POST['edit_publisher'])) {
    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $owner = $_POST['owner'];
    $website = $_POST['website'];
    $telephone = $_POST['telephone'];
    $foundDate = $_POST['fdate'];
    $description = $_POST['description'];
    $imgSrc = $_POST['imgSrc'];

    Publisher::Update($pid,$name,$owner,$website,$telephone,$foundDate,$imgSrc,$description);
}

else if (isset($_POST['delete_publisher'])) {
    Publisher::Delete($_POST['delete_publisher']);
}
header('Location: http://127.0.0.1/nonLaravel/backstage.php?value=6');