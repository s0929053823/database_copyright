<?php
if(isset($_POST['insert_textbook'])||isset($_POST['edit_textbook'])||isset($_POST['delete_textbook'])) {
    include_once 'action/textbook.php';
}
if(isset($_POST['insert_category'])||isset($_POST['delete_category'])||isset($_POST['edit_category'])) {
    include_once 'action/category.php';
}