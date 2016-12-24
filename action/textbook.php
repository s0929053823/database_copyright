<?php

require_once 'model/Textbook.php';
require_once 'model/WritingRelation.php';

if (isset($_POST['insert_textbook'])) {
    $title = $_POST['title'];
    $authors = $_POST['author'];
    $categoryID = $_POST['category'];
    $isbn10 = $_POST['isbn10'];
    $isbn13 = $_POST['isbn13'];
    $edition = $_POST['edition'];
    $publishYear = $_POST['pyear'];
    $description = $_POST['description'];
    $imgSrc = $_POST['image'];
    $id = Textbook::Insert($categoryID,$isbn10,$isbn13,$title,$edition,null,$publishYear,$description,$imgSrc);
    foreach ($_POST['author'] as $authorID)
    {
        WritingRelation::Insert($id,$authorID);
    }
}

else if (isset($_POST['edit_textbook'])){

    $id = $_POST['bookID'];
    $title = $_POST['title'];
    $categoryID = $_POST['category'];
    $isbn10 = $_POST['isbn10'];
    $isbn13 = $_POST['isbn13'];
    $edition = $_POST['edition'];
    $publishYear = $_POST['pyear'];
    $description = $_POST['description'];
    $imgSrc = $_POST['image'];
    WritingRelation::DeleteByTextbookID($id);
    Textbook::Update($id,$categoryID,$isbn10,$isbn13,$title,$edition,null,$publishYear,$description,$imgSrc);
    foreach ($_POST['author'] as $authorID)
    {
        WritingRelation::Insert($id,$authorID);
    }

}

else if (isset($_POST['delete_textbook'])) {
    Textbook::Delete($_POST['delete_textbook']);
}
header('Location: http://127.0.0.1/nonLaravel/backstage.php?value=3');

