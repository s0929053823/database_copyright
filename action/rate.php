<?php
require_once 'model/Rate.php';
if (isset($_POST['insert_rate'])) {
    $postUser = $_POST['user'];
    $postSolution =  $_POST['solution'];
    $rate =  $_POST['rate'];
    Rate::Insert($postUser,$postSolution,$rate);
}

if (isset($_POST['edit_rate'])) {
    $postUser = $_POST['user'];
    $postSolution =  $_POST['solution'];
    $rate =  $_POST['rate'];
    Rate::Update($postUser,$postSolution,$rate);
}

if (isset($_POST['delete_rate'])) {
    $postUser = $_POST['user'];
    $postSolution =  $_POST['solution'];
    Rate::Delete($postUser,$postSolution);
}
header("location: solution.php?value=$postSolution");