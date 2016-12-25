<?php require_once 'model/Solution.php';

$action = isset($_GET['action'])?$_GET['action']:0
?>

    <?php
    switch ($action) {
        case 0:
            include_once 'myprofile/solutions/showSolution.php';
            break;
        case 1:
            include_once 'myprofile/solutions/editSolution.php';
            break;
    }
    ?>
