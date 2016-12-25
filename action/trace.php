<?php

require_once 'model/Trace.php';

if (isset($_POST['insert_trace_from_sol'])) {

    Trace::Insert($_POST['memberID'],$_POST['solutionID']);
    $solution = $_POST['solutionID'];
    header("location: solution.php?value=$solution");
}
else if(isset($_POST['delete_trace_from_sol'])){
    Trace::Delete($_POST['memberID'],$_POST['solutionID']);
    $solution = $_POST['solutionID'];
    header("location: solution.php?value=$solution");
}
else if (isset($_POST['delete_trace'])) {
    Trace::Delete($_POST['memberID'],$_POST['solutionID']);
    header("Location: myprofile.php?sidevalue=4");
}


