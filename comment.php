<?php
include_once("querybook.php");
if (isset($_POST['comment_submit'])) {
    $postUser = $_POST['user'];
    $postSolution =  $_POST['solution'];
    $comment =  $_POST['comment'];
    insertComment($postUser,$postSolution,$comment);
    header("location: solution.php?value=$postSolution");
}
?>