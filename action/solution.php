<?php
require_once "config.php";
require_once "model/Solution.php";

if(isset($_POST['insert_solution'])){
    $textbook = $_POST['textbook'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $chapter = $_POST['chapter'];
    $description = $_POST['description'];
    Solution::Insert($_POST['memberID'], $title, $price, $textbook, $chapter, $description);
    //insertSolution($_POST['memberID'], $title, $price, $textbook, $chapter, $description);
    header('location: index.php');
}

else if (isset($_POST['block_solution'])) {
    Solution::BlockSoltuion($_POST['block_solution']);
    header("Location:".APP_URL."backstage.php?value=2");
}
else if (isset($_POST['unblock_solution'])){
    Solution::UnblockSolution($_POST['unblock_solution']);
    header("Location:".APP_URL."backstage.php?value=2");
}
else if(isset($_POST['active_solution'])){
    Solution::ActiveSolution($_POST['solutionID']);
    header("Location:".APP_URL."myprofile.php?sidevalue=2");
}
else{
    if(isset($_POST['deactive_solution'])){
    Solution::DeactiveSolution($_POST['solutionID']);
    header("Location:".APP_URL."myprofile.php?sidevalue=2");
    }
}