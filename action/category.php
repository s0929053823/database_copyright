<?php

require_once 'model/Category.php';


if (isset($_POST['insert_category'])) {
    Category::Insert($_POST['category_name']);
}

else if (isset($_POST['delete_category'])) {
    Category::Delete($_POST['delete_category']);
}

else if (isset($_POST['edit_category'])) {
    Category::Update($_POST['edit_category'],$_POST['category_name']);
}
header('Location: backstage.php?value=4');