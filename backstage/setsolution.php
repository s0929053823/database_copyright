
<?php
include("../config.php");
include("../querybook.php");

if (isset($_POST['Block'])) {
    blockSolution($_POST['Block']);
}
if (isset($_POST['Unblock'])) {
    unblockSolution($_POST['Unblock']);
}
header("location:../backstage.php?value=2");

?>



