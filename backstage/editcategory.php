<?php
include_once ("../config.php");
include_once ("../querybook.php");

if(isset($_GET['id'])&&isset($_GET['name']))
{
    UpdateCategory($_GET['id'],$_GET['name']);
    header('location:'.APP_URL.'backstage.php?value=4');
}
