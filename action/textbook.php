<?php

require_once 'model/Textbook.php';


if (isset($_POST['insert_textbook'])) {
    $title = $_POST['title'];
    $categoryID = $_POST['category'];
    $isbn10 = $_POST['isbn10'];
    $isbn13 = $_POST['isbn13'];
    $edition = $_POST['edition'];
    $publishYear = $_POST['pyear'];
    $description = $_POST['description'];
    $imgSrc = $_POST['image'];
    Textbook::Insert($categoryID,$isbn10,$isbn13,$title,$edition,null,$publishYear,$description,$imgSrc);
}

else if (isset($_POST['edit_textbook'])) {
    $title = $_POST['title'];
    $categoryID = $_POST['category'];
    $isbn10 = $_POST['isbn10'];
    $isbn13 = $_POST['isbn13'];
    $edition = $_POST['edition'];
    $publishYear = $_POST['pyear'];
    $description = $_POST['description'];
    $imgSrc = $_POST['image'];
    Textbook::Update($_POST['edit_textbook'],$categoryID,$isbn10,$isbn13,$title,$edition,null,$publishYear,$description,$imgSrc);
}

else if (isset($_POST['delete_textbook'])) {
    Textbook::Delete($_POST['delete_textbook']);
}
header('Location: http://127.0.0.1/nonLaravel/backstage.php?value=3');