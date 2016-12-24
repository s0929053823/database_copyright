<?php
require_once "config.php";
require_once "model/Solution.php";

if (isset($_POST['block_solution'])) {
    Solution::BlockSoltuion($_POST['block_solution']);
}
else if (isset($_POST['unblock_solution'])){
    Solution::UnblockSolution($_POST['unblock_solution']);
}
header('Location: http://127.0.0.1/nonLaravel/backstage.php?value=2');