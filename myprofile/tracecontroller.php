<?php
include_once ("../config.php");
include_once ("../querybook.php");
session_start();
if(isset($_POST['cancel']))
{
    deleteTrace($_SESSION['user_id'],$_POST['cancel']);
    header("location:".APP_URL."myprofile.php?sidevalue=4");
}
