<?php

include_once ('../config.php');
include_once ('../querybook.php');

if(isset($_POST['deleteButton'])&&!empty($_POST['deleteButton'])){
    deleteTextbook($_POST['deleteButton']);
    header("Location:"."../backstage.php?value=".$_POST['deleteButton']);
}
else {
    header("Location:"."editBook.php?value=".$_POST['editButton']);

}
?>