<?php

require_once 'model/Author.php';


if (isset($_POST['insert_author'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $imgSrc = $_POST['imgSrc'];

    Author::Insert($name,$description,$imgSrc);
}

else if (isset($_POST['edit_author'])) {
    $id = $_POST['authorID'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $imgSrc = $_POST['imgSrc'];
    Author::Update($id,$name,$description,$imgSrc);
}

else if (isset($_POST['delete_author'])) {
    Author::Delete($_POST['delete_author']);
}
header('Location: http://127.0.0.1/nonLaravel/backstage.php?value=5');