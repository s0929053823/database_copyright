<?php
include_once ("../config.php");
include_once ("../querybook.php");
if(isset($_POST['deleteButton']))
{
    deleteCategory($_POST['deleteButton']);
}

header('location:' . APP_URL . 'backstage.php?value=4');