<?php

if(isset($_POST['insert_textbook'])||isset($_POST['edit_textbook'])||isset($_POST['delete_textbook'])) {
    include_once 'action/textbook.php';
}
else if(isset($_POST['insert_category'])||isset($_POST['delete_category'])||isset($_POST['edit_category'])) {
    include_once 'action/category.php';
}
else if(isset($_POST['block_solution'])||isset($_POST['unblock_solution'])){
    include_once 'action/solution.php';
}
else if(isset($_POST['insert_author'])||isset($_POST['edit_author'])||isset($_POST['delete_author'])){
    include_once 'action/author.php';
}