<?php

require_once 'model/Trace.php';

if (isset($_POST['insert_trace'])) {

}


else if (isset($_POST['delete_trace'])) {
    Trace::Delete($_POST['memberID'],$_POST['solutionID']);
    header("Location:".APP_URL."myprofile.php?sidevalue=4");
}


