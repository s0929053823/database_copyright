<?php
include_once("querybook.php");
if (isset($_POST['rate_sumbit'])) {
    $postUser = $_POST['user'];
    $postSolution =  $_POST['solution'];
    $rate =  $_POST['rate'];
    insertRate($postUser,$postSolution,$rate);
    header("location: solution.php?value=$postSolution");
}

if (isset($_POST['edit_rate'])) {
    $postUser = $_POST['user'];
    $postSolution =  $_POST['solution'];
    $rate =  $_POST['rate'];
    updateRate($postUser,$postSolution,$rate);
    header("location: solution.php?value=$postSolution");
}

if (isset($_POST['delete_rate'])) {
    $postUser = $_POST['user'];
    $postSolution =  $_POST['solution'];
    deleteRate($postUser,$postSolution);
    header("location: solution.php?value=$postSolution");
}
?>